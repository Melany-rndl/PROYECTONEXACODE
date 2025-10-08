<?php
session_start();
if (!isset($_SESSION['id_cuenta'])) { header("Location: Logueo.php"); exit(); }
$conexion = mysqli_connect("localhost", "root", "", "p25");
if (!$conexion) die("Error de conexión");

$id_clase = isset($_GET['id_clase']) ? intval($_GET['id_clase']) : 0;
if ($id_clase <= 0) { 
    echo "Clase no encontrada. (No se recibió el parámetro id_clase o es inválido)";
    exit(); 
}

$existe = mysqli_query($conexion, "SELECT id_clase FROM clase WHERE id_clase='$id_clase'");
if (mysqli_num_rows($existe) == 0) {
    echo "Clase no encontrada. (id_clase no existe en la base de datos)";
    exit();
}

$sql_profesores = "SELECT usuario, rol
                   FROM cuenta c
                   JOIN clase cl ON id_profesor = id_cuenta
                   WHERE id_clase = '$id_clase'
                   UNION
                   SELECT usuario, rol
                   FROM cuenta c
                   JOIN cuenta_has_clase chc ON id_cuenta = chc.cuenta_id_cuenta
                   WHERE clase_id_clase = '$id_clase' AND rol = 'profesor' AND id_cuenta != (SELECT id_profesor FROM clase WHERE id_clase = '$id_clase')";
$res_profesores = mysqli_query($conexion, $sql_profesores);
$profesores = [];
while ($row = mysqli_fetch_assoc($res_profesores)) $profesores[] = $row;

$sql_estudiantes = "SELECT c.usuario
                    FROM cuenta c
                    JOIN cuenta_has_clase chc ON c.id_cuenta = chc.cuenta_id_cuenta
                    WHERE chc.clase_id_clase = '$id_clase' AND c.rol = 'estudiante'";
$res_estudiantes = mysqli_query($conexion, $sql_estudiantes);
$estudiantes = [];
while ($row = mysqli_fetch_assoc($res_estudiantes)) $estudiantes[] = $row;
$enlaces_cabecera = [
    [
        'texto' => 'Inicio',
        'url' => 'Pagina-Principal.php'
    ],
    [
        'texto' => 'Mis cursos',
        'url' => 'Pagina-Principal.php'
    ],
    [
        'texto' => 'Tareas',
        'url' => 'Tareas-Formulario.php?id=' . $id_clase
    ],
    [
        'texto' => 'Personas',
        'url' => 'Mostrar-Personas-Clase.php?id_clase=' . $id_clase
    ]
]
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Personas de la clase</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body{
            display: grid;
            grid-template-rows: 95px;
            grid-template-columns: 100%;
            grid-template-areas:
            "pag"
            "contenido";
            gap: 10px;
        }
        header{
            grid-area: pag;
        }
        .contenedor-personas {
            grid-area: contenido;
            width: 100vw;
            max-width: 100vw;
            min-width: 0;
            margin: 0;
            padding: 38px 4vw 38px 4vw;
            background: #fff;
            border-radius: 0;
            box-shadow: none;
            box-sizing: border-box;
        }
        .bloque-lista {
            margin-bottom: 44px;
        }
        h2{
            color: #42334d;
            font-family: arial;
            margin-bottom: 14px;
            margin-top: 20px;
            font-size: 2.1rem;
        }
        ul.lista-personas {
            display: flex;
            flex-direction: column;
            gap: 10px;
            padding: 0;
            list-style: none;
            margin-top: 8px;
        }
        ul.lista-personas li {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #f8f8fa;
            padding: 13px 26px;
            border-radius: 7px;
            font-size: 1.13rem;
        }
        ul.lista-personas li span {
            font-weight: 500;
            color: #3c328f;
        }
        ul.lista-personas li em {
            color: #b37c3c;
            font-size: 0.97em;
            font-style: normal;
        }
        ul.lista-personas li a {
            color: #4285f4;
            text-decoration: none;
            font-size: 0.98em;
            font-weight: 500;
        }
        ul.lista-personas li a:hover {
            text-decoration: underline;
        }
        .contador-alumnos {
            margin-bottom: 10px;
            margin-left: 2px;
            color: #3a3a48;
            font-size: 1.08rem;
        }
        @media (max-width: 1000px) {
            .contenedor-personas { padding: 28px 1vw 28px 1vw; }
        }
        @media (max-width: 600px) {
            body {
                grid-template-rows: 50px auto;
            }
            .contenedor-personas { padding: 10px 0 15px 0; }
            h2 { font-size: 1.25rem; }
            ul.lista-personas li { font-size: 1em; padding: 9px 7px; }
        }
    </style>
</head>
<body>
    <?php include "cabecera.php"; ?>
    <div class="contenedor-personas">
        <div class="bloque-lista" id="profesores">
            <h2>Profesores</h2>
            <ul class="lista-personas">
                <?php foreach($profesores as $p): ?>
                    <li>
                        <span><?= htmlspecialchars($p['usuario']) ?></span>
                        <?php if($p['rol'] !== 'profesor'): ?>
                            <em>(Invitado)</em>
                        <?php endif; ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>

        <div class="bloque-lista" id="alumnos">
            <h2>Alumnos</h2>
            <div class="contador-alumnos"><?= count($estudiantes) ?> alumnos</div>
            <ul class="lista-personas">
                <?php foreach($estudiantes as $e): ?>
                    <li>
                        <span><?= htmlspecialchars($e['usuario']) ?></span>
                        <a href="#">Invitar a padres</a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</body>
</html>
