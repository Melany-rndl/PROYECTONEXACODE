<?php
session_start();
if (!isset($_SESSION['id_cuenta'])) { header("Location: Logueo.php"); exit(); }
$conexion = mysqli_connect("localhost","root", "",  "p25");
if (!$conexion) die("Error de conexión");
$id_cuenta = $_SESSION['id_cuenta'];

$obtener_rol = mysqli_query($conexion,  "SELECT rol FROM cuenta WHERE id_cuenta='$id_cuenta'");
$rol = ($row = mysqli_fetch_assoc( $obtener_rol)) ? $row['rol'] : '';
$_SESSION['rol'] = $rol;

$sql = "SELECT clase.*, cuenta.usuario AS profesor FROM clase JOIN cuenta_has_clase ON clase.id_clase = cuenta_has_clase.clase_id_clase JOIN cuenta ON clase.id_profesor = cuenta.id_cuenta WHERE cuenta_has_clase.cuenta_id_cuenta = '$id_cuenta' ORDER BY clase.nombre ASC";
$res = mysqli_query($conexion, $sql);

$colores = ['celeste', 'azul', 'morado', 'verde', 'verdeO', 'naranja', 'amarillo', 'rosa'];
function colorClase($nombre, $colores): mixed {
    return $colores[abs(crc32(strtolower($nombre))) % count($colores)];
}
$clases_usuario = [];
$materias_menu = [];
while ($clase = mysqli_fetch_assoc($res)) {
    $clases_usuario[] = $clase;
    $materias_menu[$clase['id_clase']] = $clase['nombre'];
}
$grid_ids = ["uno", "dos", "tres", "mun", "cuatro", "cinco", "seis", "mdo", "siete", "ocho", "nueve", "mtre"];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nexa Class - Mis Clases</title>
    <style>
    body{
        /* Ajuste importante: solo una columna */
        display: grid;
        grid-template-rows: 95px 200px 50px 400px 60px;
        grid-template-columns: 100%;
        grid-template-areas:
        "pag"
        "cero"
        "espacio"
        "caja";
        gap:10px
    }
    @media(max-width:500px){
        body{
            grid-template-rows: 50px 100px 200px 10px;
            grid-template-columns: 100%;
            grid-template-areas:
            "pag"
            "cero"
            "espacio"
            "caja";
        }
    }
    header{
        border-bottom: 2px solid #666565;
        background: white;
        grid-area: pag;
        font-size: 26px;
        color: #4e4c7f;
        text-shadow: 2px 2px 4px #797878;
        position: relative;
    }
    nav{
        padding: 20px;
        display: flex;
        justify-content: left;
        gap: 20px;
        flex-direction: row reverse;
    }
    #estudiante{
        background:white;
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
    #mas, #accion-profesor-btn{
        background:white ;
        color: #3f3e57;
        border: none;
        font-size: 50px;
        position: absolute;
        margin-left: 1350px;
        cursor: pointer;  
    }
    #let{
        width: 40px;
        height: 40px;
        padding: 10px;
        background:rgb(70, 130, 208) ;
        border: rgb(70, 130, 208);
        color: #f9f9f9;
        border-radius: 50%;
        font-size: 18px;
        position: absolute;
        margin-left: 1250px;
        margin-top: 10px;
        cursor: pointer;
    }
    #espacio{ grid-area: espacio; }
    h2{ color: #42334d; font-family: arial; }
    .botonesuperior{
        background: white;
        border:none;
        font-family: Arial;
        font-size: 18px;
        color: #4e4c7f;
        cursor: pointer;
    }
    #Bienvenida-NexaClass{
        grid-area: cero;
        background: linear-gradient(to right, #3c328f, #3a57a8 , #4c86d1);
        border-radius: 16px;
    }
    h1{ color: white; font-family: arial; margin-top: 25px; margin-left: 15px; font-size: 40px; }
    #mensaje{ color: white; font-family: arial; margin-left: 15px; font-size: 20px; }
    #botonuno{
        color: #0d61d6;
        margin-left: 15px;
        background: white;
        border:none;
        border-radius: 5px;
        font-size: 15px;
        padding: 9px;
        cursor: pointer;
    }
    #botondos{
        color: white;
        background: linear-gradient(to right, #3c328f, #3a57a8);
        border: 2px solid white;
        border-radius: 5px;
        font-size: 15px;
        padding: 9px;
        margin-left: 15px;
        cursor: pointer;
    }
    #caja{
        grid-area: caja;
        display: grid;
        grid-template-rows: 250px 250px 250px ;
        grid-template-columns: 20% 20% 20% 20%;
        grid-template-areas:
        "uno dos tres mun"
        "cuatro cinco seis mdo"
        "siete ocho nueve mtre";
        gap: 70px;
    }
    @media(max-width:350px){
        #caja{
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
    #uno, #dos, #tres, #cuatro, #cinco, #seis, #siete, #ocho, #nueve, #mun, #mdo, #mtre{
        background: white;
        border: 2px solid #949393;
        border-radius: 16px;
    }
    .cajitas{
        padding: 50px;
        margin: 0px;
        border-top-left-radius: 15px;
        border-top-right-radius: 15px;
    }
    .celeste { background: linear-gradient(to bottom,  #6eb8c2,  #5ea1aa , #3e6d72); }
    .azul {  background: linear-gradient(to bottom, #679dcf, #92c0e6 , #2a578f); }
    .morado { background: linear-gradient(to bottom,  #b091d3, #b68fd6 , #633f7e); }
    .verde{ background: linear-gradient(to bottom,  #99b75e, #a1c777 , #435331); }
    .verdeO { background: linear-gradient(to bottom,  #7f9f70, #749a62 , #3d5632);}
    .naranja { background: linear-gradient(to bottom,  #efb36d, #eabc87 , #bc7a2e); }
    .amarillo { background: linear-gradient(to bottom,  #f9df82, #f3db84 ,#eec834); }
    .rosa { background: linear-gradient(to bottom,  #e9a0d7,#f2a9e0, #c967b2); }
    .nomcajita{
        color:white;
        font-family: arial;
        position:absolute;
        margin-top: 20px;
        font-size: 18px;
    }
    .contenidocajsup{
        font-size: 25px;
        color: #4e4c7f;
        font-family: arial;
    }
    .contenidocaja{
        font-size: 15px;
        margin-top: 5px;
        font-family: arial;
        color: #5b5a7b;
    }
    .c{
        border:none;
        background: white;
        cursor: pointer;
        position:relative;
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
<?php include 'cabecera.php'; ?>

<section id="Bienvenida-NexaClass">
    <h1>Bienvenido a NEXA CLASS</h1>
    <p id="mensaje">Tu aula virtual preferida</p>
    <?php if($rol === 'estudiante'): ?>
        <button id="botonuno" onclick="window.location.href='Formulario-Unirse-Clase.php'">Unirse a una Clase</button>
    <?php elseif($rol === 'profesor'): ?>
        <button id="botonuno" onclick="window.location.href='Menu-Profesor.php'">Crear/Unirse a Clase</button>
         <?php elseif($rol === 'admin'): ?>
        <button id="botonuno" onclick="window.location.href='admin.php'">Ver Personas </button>
    <?php endif; ?>
    <button id="botondos" onclick="window.location.href='inicio.php'">Ver página web</button>
</section>
<section id="espacio"><h2>Mis Cursos</h2></section>
<main id="caja">
<?php if(count($clases_usuario) > 0): $i = 0; foreach($clases_usuario as $clase):
    $color = colorClase($clase['nombre'], $colores);
    $grid_id = $grid_ids[$i] ?? '';
    $link = "clase-Formulario.php?id=" . $clase['id_clase'];
    $edit_link = "Editar-Clase.php?id=" . $clase['id_clase'];
?>
    <button class="c" <?= $grid_id ? "style=\"grid-area: $grid_id;\"" : ""; ?> onclick="window.location.href='<?= $link ?>'">
        <section id="<?= htmlspecialchars($grid_id); ?>">
            <?php if ($clase['id_profesor'] == $id_cuenta): ?>
                <a href="<?= $edit_link ?>" class="edit-btn" title="Editar nombre" onclick="event.stopPropagation();">✏️</a>
            <?php endif; ?>
            <nav class="cajitas <?=$color?>">
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
let botonAccionProfesor = document.getElementById('accion-profesor-btn');
if (botonAccionProfesor) {
    botonAccionProfesor.onclick = function(evento) {
        let menuAccionProfesor = document.getElementById('menu-accion-profesor');
        menuAccionProfesor.style.display = (menuAccionProfesor.style.display === 'block') ? 'none' : 'block';
        evento.stopPropagation();
    };

    document.onclick = function(evento) {
        let menuAccionProfesor = document.getElementById('menu-accion-profesor');
        if (menuAccionProfesor && menuAccionProfesor.style.display === 'block' &&
            !menuAccionProfesor.contains(evento.target) && evento.target !== botonAccionProfesor) {
            menuAccionProfesor.style.display = 'none';
        }
    };
}
</script>
</body>
</html>
