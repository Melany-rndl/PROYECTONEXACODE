<?php
session_start();
if (!isset($_SESSION['id_cuenta'])) { header("Location: Logueo.php"); exit(); }
$conexion = mysqli_connect("localhost", "root", "", "p25");
if (!$conexion) die("Error de conexión");

// OBTENER el parámetro id_clase de la URL
$id_clase = isset($_GET['id_clase']) ? intval($_GET['id_clase']) : 0;
if ($id_clase <= 0) { 
    echo "Clase no encontrada. (No se recibió el parámetro id_clase o es inválido)";
    exit(); 
}

// Chequea que exista la clase
$existe = mysqli_query($conexion, "SELECT id_clase FROM clase WHERE id_clase='$id_clase'");
if (mysqli_num_rows($existe) == 0) {
    echo "Clase no encontrada. (id_clase no existe en la base de datos)";
    exit();
}
// Obtener profesores
$sql_profesores = "SELECT c.usuario, c.rol
                   FROM cuenta c
                   JOIN clase cl ON cl.id_profesor = c.id_cuenta
                   WHERE cl.id_clase = '$id_clase'
                   UNION
                   SELECT c.usuario, c.rol
                   FROM cuenta c
                   JOIN cuenta_has_clase chc ON c.id_cuenta = chc.cuenta_id_cuenta
                   WHERE chc.clase_id_clase = '$id_clase' AND c.rol = 'profesor' AND c.id_cuenta != (SELECT id_profesor FROM clase WHERE id_clase = '$id_clase')";
$res_profesores = mysqli_query($conexion, $sql_profesores);
$profesores = [];
while ($row = mysqli_fetch_assoc($res_profesores)) $profesores[] = $row;

// Obtener estudiantes
$sql_estudiantes = "SELECT c.usuario
                    FROM cuenta c
                    JOIN cuenta_has_clase chc ON c.id_cuenta = chc.cuenta_id_cuenta
                    WHERE chc.clase_id_clase = '$id_clase' AND c.rol = 'estudiante'";
$res_estudiantes = mysqli_query($conexion, $sql_estudiantes);
$estudiantes = [];
while ($row = mysqli_fetch_assoc($res_estudiantes)) $estudiantes[] = $row;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Personas de la clase</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
         body {
            display: grid;
            grid-template-rows: 100px 300px  650px ;
            grid-template-columns:10% 90% ;
            grid-template-areas:
            "iz pag"
            "iz alumnos "
            "iz profesores";
        }
        header{
            border-bottom: 2px solid #666565;
            background-color: white;
            grid-area: pag;
            font-size: 26px;
            color: #4e4c7f;
            text-shadow: 2px 2px 4px #797878;
        }
        nav{
            padding: 20px;
            display: flex;
            flex-direction: row;
            justify-content: left;
            gap: 20px;
        }
        .botonesuperior{
            background-color: white;
            border:none;
            font-family: Arial;
            font-size: 18px;
            color: #4e4c7f;
            cursor: pointer;
        }
        #iz{
            grid-area: iz;
        }
        .iconomenu{
            background-color: white;
            border: none;
            font-size: 25px;
            color: #3f3e57;
            cursor: pointer;
        }
        #menuLateral {
            display: none;
            flex-direction: column;
            background-color: #f4f4f4;
            border-right: 2px solid #ccc;
            padding: 20px;
            position: absolute;
            top: 80px;
            left: 0;
            width: 200px;
            height: calc(100vh - 80px);
            z-index: 1000;
            box-shadow: 2px 0 5px rgba(0,0,0,0.1);
        }
        #menuLateral a {
            text-decoration: none;
            color: #3d3d3d;
            font-family: Arial, sans-serif;
            padding: 10px 0;
            font-size: 18px;
            border-bottom: 1px solid #ccc;
        }
        #menuLateral a:hover {
            color: #385da8;
        }
        #profesores ul, #alumnos ul {
            display: flex;
            flex-direction: column;
            gap: 8px;
            padding: 0;
            list-style: none;
        }
        #profesores li, #alumnos li {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #f0f0f0;
            padding: 8px 12px;
            border-radius: 6px;
        }
        #alumnos li { background: #f9f9f9; }
        #profesores a, #profesores button {
            margin-top: 15px;
            display: inline-block;
            text-decoration: none;
        }
        button {
            background: #4285f4;
            border: none;
            color: white;
            padding: 10px 16px;
            border-radius: 6px;
            cursor: pointer;
        }
        h2{
            color: #42334d;
            font-family: arial;
        }
        #alumnos li a {
            color: #4285f4;
            text-decoration: none;
            font-size: 0.9em;
        }
        #alumnos li a:hover {
            text-decoration: underline;
        }
        #alumnos #cant {
            margin-bottom: 10px;
            margin-left: 2px;
        }
    </style>
</head>
<body>
    <?php include "cabecera.php"; ?>
    <section id="iz">
        <button class="iconomenu" onclick="toggleMenu()">☰</button>
        <div id="menuLateral">
            <a href="#">Matemáticas</a>
            <a href="#">Química</a>
            <a href="#">Geografía</a>
            <a href="#">Literatura</a>
            <a href="#">Informática</a>
        </div>
    </section>

    <!-- Sección Profesores -->
    <section id="profesores">
        <h2>Profesores</h2>
        <ul>
            <?php foreach($profesores as $p): ?>
                <li>
                    <span><?= htmlspecialchars($p['usuario']) ?></span>
                    <?php if($p['rol'] !== 'profesor'): ?>
                        <em>(Invitado)</em>
                    <?php endif; ?>
                </li>
            <?php endforeach; ?>
        </ul>
        <!-- Puedes agregar botones extra aquí si quieres -->
        <!-- <a href="#">Ver todo</a><br>
        <button>Habilitar el acceso para padres, madres o tutores</button> -->
    </section>

    <!-- Sección Alumnos -->
    <section id="alumnos">
        <h2>Alumnos</h2>
        <p id="cant"><?= count($estudiantes) ?> alumnos</p>
        <ul>
            <?php foreach($estudiantes as $e): ?>
                <li>
                    <span><?= htmlspecialchars($e['usuario']) ?></span>
                    <a href="#">Invitar a padres</a>
                </li>
            <?php endforeach; ?>
        </ul>
    </section>
    <script>
         function toggleMenu() {
            const menu = document.getElementById("menuLateral");
            menu.style.display = (menu.style.display === "flex") ? "none" : "flex";
        }
    </script>
</body>
</html>
