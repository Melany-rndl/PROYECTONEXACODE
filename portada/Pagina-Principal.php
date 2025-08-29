<?php
session_start();
if (!isset($_SESSION['id_cuenta'])) { header("Location: Logueo.php"); exit(); }
$conexion = mysqli_connect("localhost", "root", "", "p25");
if (!$conexion) die("Error de conexión");
$id_cuenta = $_SESSION['id_cuenta'];

$obtener_rol = mysqli_query(mysql: $conexion,query: "SELECT rol FROM cuenta WHERE id_cuenta='$id_cuenta'");
$rol = ($row = mysqli_fetch_assoc(resul: $obtener_rol)) ? $row['rol'] : '';

$sql = "SELECT clase.*, cuenta.usuario AS profesor FROM clase JOIN cuenta_has_clase ON clase.id_clase = cuenta_has_clase.clase_id_clase JOIN cuenta ON clase.id_profesor = cuenta.id_cuenta WHERE cuenta_has_clase.cuenta_id_cuenta = '$id_cuenta' ORDER BY clase.nombre ASC";
$res = mysqli_query(mysql: $conexion, query: $sql);

$colores = ['celeste', 'azul', 'morado', 'verde', 'verdeO', 'naranja', 'amarillo', 'rosa'];
function colorClase($nombre, $colores): mixed {
    return $colores[abs(num: crc32(string: strtolower(string: $nombre))) % count(value: $colores)];
}

$clases_usuario = [];
$materias_menu = [];
while ($clase = mysqli_fetch_assoc($res)) {
    $clases_usuario[] = $clase;
    $materias_menu[strtolower($clase['nombre'])] = ucfirst($clase['nombre']);
}
$grid_ids = ["uno", "dos", "tres", "mun", "cuatro", "cinco", "seis", "mdo", "siete", "ocho", "nueve", "mtre"];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Nexa Class - Mis Clases</title>
    <style>
        body {
            display: grid;
            grid-template-rows: 80px 200px 50px 400px 60px;
            grid-template-columns: 4% 94%;
            grid-template-areas:
                "iz pag"
                "iz cero"
                "iz espacio"
                "iz caja";
            gap: 10px;
        }

        @media(max-width: 730px) {
            body {
                display: grid;
                grid-template-rows: 100px 80px 250px 10px;
                grid-template-columns: 100%;
                grid-template-areas:
                    "pag"
                    "iz"
                    "cero"
                    "espacio"
                    "caja";
            }
        }

        header {
            border-bottom: 2px solid #666565;
            background: white;
            grid-area: pag;
            font-size: 26px;
            color: #4e4c7f;
            text-shadow: 2px 2px 4px #797878;
            position: relative;
        }
        nav {
            padding: 20px;
            display: flex;
            justify-content: left;
            gap: 20px;
            flex-direction: row-reverse;
        }
        #estudiante {
            background: white;
            border: 2px solid rgb(107, 46, 134);
            border-radius: 5px;
            padding: 8px;
            font-size: 17px;
            position: absolute;
            margin-left: 1100px;
            margin-top: 10px;
            cursor: pointer;
            color: rgb(107, 46, 134);
        }
        #mas, #accion-profesor-btn {
            background: white;
            color: #3f3e57;
            border: none;
            font-size: 50px;
            position: absolute;
            margin-left: 1350px;
            cursor: pointer;
        }
        #let {
            width: 40px;
            height: 40px;
            padding: 10px;
            background: rgb(70, 130, 208);
            border: rgb(70, 130, 208);
            color: #f9f9f9;
            border-radius: 50%;
            font-size: 18px;
            position: absolute;
            margin-left: 1400px;
            margin-top: 10px;
            cursor: pointer;
        }
        #espacio { grid-area: espacio; }
        h2 { color: #42334d; font-family: arial; }
        .botonesuperior {
            background: white;
            border: none;
            font-family: Arial;
            font-size: 18px;
            color: #4e4c7f;
            cursor: pointer;
        }
        #iz { grid-area: iz; }

        .iconomenu {
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
            position: fixed;
            top: 80px;
            left: 0;
            width: 220px;
            height: calc(100vh - 80px);
            z-index: 1000;
            box-shadow: 2px 0 8px rgba(0,0,0,0.1);
            overflow-y: auto;
            transition: transform 0.3s ease;
            transform: translateX(-100%);
        }
        #menuLateral.visible {
            display: flex;
            transform: translateX(0);
        }
        #menuLateral a {
            text-decoration: none;
            color: #3d3d3d;
            font-family: Arial, sans-serif;
            padding: 12px 0;
            font-size: 18px;
            border-bottom: 1px solid #ccc;
            transition: color 0.3s ease;
        }
        #menuLateral a:hover {
            color: #385da8;
        }

        @media (max-width: 730px) {
            #menuLateral {
                width: 70vw;
                height: calc(100vh - 80px);
                box-shadow: 2px 0 10px rgba(0,0,0,0.3);
                background-color: #fff;
                border-right: none;
                padding: 15px;
                transform: translateX(-100%);
            }
            #menuLateral.visible {
                transform: translateX(0);
            }
        }

        .menu-materias {
            margin-top: 10px;
            display: flex;
            flex-direction: column;
            gap: 32px;
            font-family: Arial;
            font-size: 16px;
            color: #3f3e57;
        }
        .oculto { display: none; }
        .visible { display: flex; }
        .mensajemenu {
            font-family: arial;
            font-size: 18px;
            color: #3a3a48;
            cursor: pointer;
            border-radius: 10px;
            background: #d8daea;
            padding: 10px;
        }
        #Bienvenida-NexaClass {
            grid-area: cero;
            background: linear-gradient(to right, #3c328f, #3a57a8 , #4c86d1);
            border-radius: 16px;
        }
        h1 {
            color: white;
            font-family: arial;
            margin-top: 25px;
            margin-left: 15px;
            font-size: 40px;
        }
        #mensaje {
            color: white;
            font-family: arial;
            margin-left: 15px;
            font-size: 20px;
        }
        #botonuno {
            color: #0d61d6;
            margin-left: 15px;
            background: white;
            border: none;
            border-radius: 5px;
            font-size: 15px;
            padding: 9px;
            cursor: pointer;
        }
        #botondos {
            color: white;
            background: linear-gradient(to right, #3c328f, #3a57a8);
            border: 2px solid white;
            border-radius: 5px;
            font-size: 15px;
            padding: 9px;
            margin-left: 15px;
            cursor: pointer;
        }
        #caja {
            grid-area: caja;
            display: grid;
            grid-template-rows: 250px 250px 250px;
            grid-template-columns: 20% 20% 20% 20%;
            grid-template-areas:
                "uno dos tres mun"
                "cuatro cinco seis mdo"
                "siete ocho nueve mtre";
            gap: 70px;
        }
        @media(max-width: 800px) {
            #caja {
                display: grid;
                grid-template-rows: repeat(12, 80px);
                grid-template-columns: 100%;
                grid-template-areas:
                    "uno"
                    "dos"
                    "tres"
                    "mun"
                    "cuatro"
                    "cinco"
                    "seis"
                    "mdo"
                    "siete"
                    "ocho"
                    "nueve"
                    "mtre";
                gap: 200px;
            }
        }
        #uno, #dos, #tres, #cuatro, #cinco, #seis, #siete, #ocho, #nueve, #mun, #mdo, #mtre {
            background: white;
            border: 2px solid #949393;
            border-radius: 16px;
        }
        .cajitas {
            padding: 50px;
            margin: 0px;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
        }
        .celeste { background: linear-gradient(to bottom,  #6eb8c2,  #5ea1aa , #3e6d72); }
        .azul { background: linear-gradient(to bottom, #679dcf, #92c0e6 , #2a578f); }
        .morado { background: linear-gradient(to bottom,  #b091d3, #b68fd6 , #633f7e); }
        .verde { background: linear-gradient(to bottom,  #99b75e, #a1c777 , #435331); }
        .verdeO { background: linear-gradient(to bottom,  #7f9f70, #749a62 , #3d5632); }
        .naranja { background: linear-gradient(to bottom,  #efb36d, #eabc87 , #bc7a2e); }
        .amarillo { background: linear-gradient(to bottom,  #f9df82, #f3db84 ,#eec834); }
        .rosa { background: linear-gradient(to bottom,  #e9a0d7,#f2a9e0, #c967b2); }
        .nomcajita {
            color: white;
            font-family: arial;
            position: absolute;
            margin-top: 20px;
            font-size: 18px;
        }
        .contenidocajsup {
            font-size: 25px;
            color: #4e4c7f;
            font-family: arial;
        }
        .contenidocaja {
            font-size: 15px;
            margin-top: 5px;
            font-family: arial;
            color: #5b5a7b;
        }
        .c {
            border: none;
            background: white;
            cursor: pointer;
            position: relative;
        }
        .edit-btn {
            position: absolute;
            top: 10px;
            right: 12px;
            background: #f5f5f5;
            border: 1px solid #bbb;
            border-radius: 50%;
            width: 32px;
            height: 32px;
            font-size: 18px;
            color: #4e4c7f;
            cursor: pointer;
            z-index: 2;
            transition: background 0.2s;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
        }
        .edit-btn:hover { background: #e1e4f2; }
    </style>
</head>
<body>
<header id="pag">
    <strong>NEXA CLASS</strong>
    <a href="Cuenta.php" id="estudiante">👤<span id="es"><?= htmlspecialchars(strtoupper($rol)); ?></span></a>
    <button id="let" onclick="window.location.href='Cerrar-Sesion.php';">E</button>
    <?php if ($rol === 'profesor'): ?>
        <div style="display:inline-block; position:absolute; margin-left:1350px; top:0;">
            <button id="accion-profesor-btn" style="font-size:50px;">+</button>
            <div id="menu-accion-profesor" style="position:absolute;right:-10px;top:35px;z-index:9;display:none; background:#fff; border:1px solid #ccc; border-radius:7px;">
                <a href="Seleccionar-Accion-Profesor.php" style="display:block;padding:10px 18px;color:#444;text-decoration:none;">Crear/Unirse a clase</a>
            </div>
        </div>
    <?php else: ?>
        <a href="Formulario-Unirse-Clase.php" id="mas" title="Unirse a clase" style="font-size:50px;">+</a>
    <?php endif; ?>
    <nav>
        <button class="botonesuperior" onclick="window.location.href='Pagina-Principal.php'">Inicio</button>
        <button class="botonesuperior" onclick="window.location.href='Pagina-Principal.php'">Mis cursos</button>
    </nav>
</header>
<section id="Bienvenida-NexaClass">
    <h1>Bienvenido a NEXA CLASS</h1>
    <p id="mensaje">Tu aula virtual preferida</p>
    <?php if ($rol === 'estudiante'): ?>
        <button id="botonuno" onclick="window.location.href='Formulario-Unirse-Clase.php'">Unirse a una Clase</button>
    <?php elseif ($rol === 'profesor'): ?>
        <button id="botonuno" onclick="window.location.href='Menu-Profesor.php'">Crear/Unirse a Clase</button>
    <?php endif; ?>
    <button id="botondos" onclick="window.location.href='uno.php'">Ver página web</button>
</section>
<section id="espacio"><h2>Mis Cursos</h2></section>
<section id="iz">
    <button class="iconomenu" onclick="toggleMenu()">☰</button>
    <div id="menuLateral" aria-label="Menú lateral de materias">
        <a href="#">Matemáticas</a>
        <a href="#">Química</a>
        <a href="#">Geografía</a>
        <a href="#">Literatura</a>
        <a href="#">Informática</a>
    </div>

    <hr>
    <?php foreach ($materias_menu as $materia): ?>
        <div><span class="mensajemenu"><strong><?= htmlspecialchars($materia); ?></strong></span></div>
    <?php endforeach; ?>
</section>
<main id="caja">
<?php if (count($clases_usuario) > 0): $i = 0; foreach ($clases_usuario as $clase):
    $color = colorClase($clase['nombre'], $colores);
    $grid_id = $grid_ids[$i] ?? '';
    $link = "clase-Formulario.php?id=" . $clase['id_clase'];
    $edit_link = "Editar-Clase.php?id=" . $clase['id_clase'];
?>
    <button class="c" <?= $grid_id ? "style=\"grid-area: $grid_id;\"" : ""; ?> onclick="window.location.href='<?= $link ?>'">
        <section id="<?= htmlspecialchars($grid_id); ?>">
            <?php if ($clase['id_profesor'] == $id_cuenta): ?>
                <a href="<?= $edit_link ?>" class="edit-btn" title="Editar nombre" onclick="event.stopPropagation();">✏</a>
            <?php endif; ?>
            <nav class="cajitas <?= $color ?>">
                <span class="nomcajita"><?= htmlspecialchars(ucfirst($clase['nombre'])); ?></span>
            </nav>
            <p class="contenidocajsup"><strong><?= htmlspecialchars($clase['nombre']); ?></strong></p>
            <p class="contenidocaja">Profesor: <?= htmlspecialchars($clase['profesor']); ?></p>
            <p class="contenidocaja">Código: <?= htmlspecialchars($clase['codigo']); ?></p>
        </section>
    </button>
<?php $i++; endforeach;
else: ?>
    <section id="uno" style="grid-area: uno;">
        <nav class="cajitas mate"><span class="nomcajita">Sin clases</span></nav>
        <p class="contenidocajsup"><strong>Sin clases</strong></p>
        <p class="contenidocaja">No te has unido a ninguna clase aún.</p>
    </section>
<?php endif; ?>
</main>
<script>
function toggleMenu() {
    const menu = document.getElementById("menuLateral");
    menu.classList.toggle("visible");
}

document.addEventListener('click', function(e) {
    var menu = document.getElementById('menu-accion-profesor');
    var btn = document.getElementById('accion-profesor-btn');
    if (menu && !menu.contains(e.target) && e.target !== btn) {
        menu.style.display = 'none';
    }
});
if (document.getElementById('accion-profesor-btn')) {
    document.getElementById('accion-profesor-btn').addEventListener('click', function(e) {
        var menu = document.getElementById('menu-accion-profesor');
        if (menu.style.display === 'block') {
            menu.style.display = 'none';
        } else {
            menu.style.display = 'block';
        }
        e.stopPropagation();
    });
}
</script>
</body>
</html>
