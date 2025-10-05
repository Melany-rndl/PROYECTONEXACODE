<?php
session_start();
if (!isset($_SESSION['id_cuenta'])) { header("Location: Logueo.php"); exit(); }
$conexion = mysqli_connect("localhost","root", "",  "p25");
if (!$conexion) die("Error de conexión");
$id_cuenta = $_SESSION['id_cuenta'];

$obtener_rol = mysqli_query($conexion,  "SELECT rol FROM cuenta WHERE id_cuenta='$id_cuenta'");
$rol = ($row = mysqli_fetch_assoc( $obtener_rol)) ? $row['rol'] : '';
$_SESSION['rol'] = $rol;

$sql = "SELECT clase.*,cuenta.usuario AS profesor FROM clase JOIN cuenta_has_clase ON clase.id_clase = cuenta_has_clase.clase_id_clase JOIN cuenta ON clase.id_profesor = cuenta.id_cuenta WHERE cuenta_has_clase.cuenta_id_cuenta = '$id_cuenta' ORDER BY clase.nombre ASC";
$res = mysqli_query($conexion, $sql);

$colores = ['celeste', 'azul', 'morado', 'verde', 'verdeO', 'naranja', 'amarillo', 'rosa'];
function colorClase($nombre, $colores): mixed {
    return $colores[abs(num: crc32(string: strtolower(string: $nombre))) % count(value: $colores)];
}

$clases_usuario = [];
$materias_menu = [];
while ($clase = mysqli_fetch_assoc($res)) {
    $clases_usuario[] = $clase;
    $materias_menu[strtolower(string: $clase['nombre'])] = ucfirst(string: $clase['nombre']);
}
$grid_ids = ["uno", "dos", "tres", "mun", "cuatro", "cinco", "seis", "mdo", "siete", "ocho", "nueve", "mtre"];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nexa Class - Mis Clases</title>
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
<?php if(count(value: $clases_usuario) > 0): $i = 0; foreach($clases_usuario as $clase):
    $color = colorClase(nombre: $clase['nombre'], colores: $colores);
    $grid_id = $grid_ids[$i] ?? '';
    $link = "clase-Formulario.php?id=" . $clase['id_clase'];
    $edit_link = "Editar-Clase.php?id=" . $clase['id_clase'];
?>
    <button class="c" <?= $grid_id ? "style=\"grid-area: $grid_id;\"" : ""; ?> onclick="window.location.href='<?= $link ?>'">
        <section id="<?= htmlspecialchars(string: $grid_id); ?>">
            <?php if ($clase['id_profesor'] == $id_cuenta): ?>
                <a href="<?= $edit_link ?>" class="edit-btn" title="Editar nombre" onclick="event.stopPropagation();">✏️</a>
            <?php endif; ?>
            <nav class="cajitas <?=$color?>">
                <span class="nomcajita"><?= htmlspecialchars(string: ucfirst(string: $clase['nombre'])); ?></span>
            </nav>
            <p class="contenidocajsup"><strong><?= htmlspecialchars(string: $clase['nombre']); ?></strong></p>
            <p class="contenidocaja">Profesor: <?= htmlspecialchars(string: $clase['profesor']); ?></p>
            <p class="contenidocaja">Código: <?= htmlspecialchars(string: $clase['codigo']); ?></p>
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
document.querySelector('.iconomenu').onclick = function() {
    let menuMaterias = document.getElementById('menuMaterias');
    menuMaterias.classList.toggle('visible');
    menuMaterias.classList.toggle('oculto');
};

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
