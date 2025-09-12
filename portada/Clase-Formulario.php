<?php
session_start();
if (!isset($_SESSION['id_cuenta'])) { header(header: "Location: Logueo.php"); exit(); }
$conexion = mysqli_connect(hostname: "localhost", username: "root", password: "", database: "p25");
if (!$conexion) die("Error de conexión");
date_default_timezone_set(timezoneId: 'America/La_Paz');
$id_cuenta = $_SESSION['id_cuenta'];
$res_rol = mysqli_query(mysql: $conexion, query: "SELECT rol, usuario FROM cuenta WHERE id_cuenta='$id_cuenta'");
$usuario_actual = mysqli_fetch_assoc(result: $res_rol);
$rol = $usuario_actual ? $usuario_actual['rol'] : '';
$nombre_usuario = $usuario_actual ? $usuario_actual['usuario'] : '';
$id_clase = isset($_GET['id']) ? intval(value: $_GET['id']) : 0;
$clase_actual = null;
$color = '';
$es_profesor_clase = false;
$colores = ['celeste', 'azul', 'morado', 'verde', 'verdeO', 'naranja', 'amarillo', 'rosa'];
function colorClase($nombre, $colores): mixed {
    return $colores[abs(num: crc32(string: strtolower(string: $nombre))) % count(value: $colores)];
}
if ($id_clase > 0) {
    $sql_clase = "SELECT clase.*, cuenta.usuario AS profesor 
                  FROM clase
                  JOIN cuenta ON clase.id_profesor = cuenta.id_cuenta
                  WHERE clase.id_clase = '$id_clase'";
    $res_clase = mysqli_query(mysql: $conexion, query: $sql_clase);
    $clase_actual = mysqli_fetch_assoc(result: $res_clase);
    if ($clase_actual) {
        $color = colorClase(nombre: $clase_actual['nombre'], colores: $colores);
        if ($rol === 'profesor' && $clase_actual['id_profesor'] == $id_cuenta) {
            $es_profesor_clase = true;
        }
    }
}
$sql = "SELECT clase.*, cuenta.usuario AS profesor FROM clase JOIN cuenta_has_clase ON clase.id_clase = cuenta_has_clase.clase_id_clase JOIN cuenta ON clase.id_profesor = cuenta.id_cuenta WHERE cuenta_has_clase.cuenta_id_cuenta = '$id_cuenta' ORDER BY clase.nombre ASC";
$res = mysqli_query(mysql: $conexion, query: $sql);
$clases_usuario = [];
$materias_menu = [];
while ($clase = mysqli_fetch_assoc(result: $res)) {
    $clases_usuario[] = $clase;
    $materias_menu[strtolower(string: $clase['nombre'])] = ucfirst(string: $clase['nombre']);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['eliminar_publicacion_id']) && $es_profesor_clase) {
    $id_pub_eliminar = intval(value: $_POST['eliminar_publicacion_id']);
    mysqli_query(mysql: $conexion, query: "DELETE FROM publicacion WHERE id_publicacion = '$id_pub_eliminar' AND clase_id_clase = '$id_clase'");
    header(header: "Location: Clase-Formulario.php?id=$id_clase");
    exit();
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nuevo-mensaje'])) {
    $mensaje = trim(string: $_POST['nuevo-mensaje']);
    if ($mensaje !== "" && $id_cuenta && $id_clase) {
        $mensaje = mysqli_real_escape_string(mysql: $conexion, string: $mensaje);
        $fecha = date(format: 'Y-m-d H:i:s');
        mysqli_query(mysql: $conexion, query: "INSERT INTO publicacion (asunto, contenido, fecha, cuenta_id_cuenta, clase_id_clase) VALUES ('', '$mensaje', '$fecha', '$id_cuenta', '$id_clase')");
        header(header: "Location: Clase-Formulario.php?id=$id_clase");
        exit();
    }
}

$publicaciones = [];
if ($id_clase > 0) {
    $res_publicaciones = mysqli_query(mysql: $conexion, query: "SELECT p.id_publicacion, p.asunto, p.contenido, p.fecha, p.fecha_edicion, c.usuario, c.id_cuenta FROM publicacion p JOIN cuenta c ON p.cuenta_id_cuenta=c.id_cuenta WHERE p.clase_id_clase = '$id_clase' ORDER BY p.id_publicacion DESC");
    while ($row = mysqli_fetch_assoc(result: $res_publicaciones)) {
        $publicaciones[] = $row;
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nexa Class - Mis Clases</title>
    <link rel="stylesheet" href="Tareas.css">
</head>
<body>
<header id="encabezado-principal">
    <strong>NEXA CLASS</strong>
    <a href="Cuenta.php" id="boton-cuenta-usuario">👤<span id="rol-usuario"><?= htmlspecialchars(strtoupper($rol));?></span></a>
    <button id="boton-cerrar-sesion" onclick="window.location.href='Cerrar-Sesion.php';">E</button>
    <a href="Formulario-Crear-Clase.php" id="boton-crear-clase" title="Agregar Clase">+</a>
    <nav>
        <button class="boton-superior-menu" onclick="window.location.href='Pagina-Principal.php'">Inicio</button>
        <button class="boton-superior-menu" onclick="window.location.href='Pagina-Principal.php'">Mis cursos</button>
        <button class="boton-superior-menu" onclick="window.location.href='Tareas-Formulario.php?id=<?= $id_clase ?>'">Tareas</button>
        <button class="boton-superior-menu" onclick="window.location.href='Mostrar-Personas-Clase.php?id_clase=<?= $id_clase ?>'">Personas</button>
        
    </nav>
</header>
<div class="seccion-hero-clase <?= $color ?>">  
    <?php if ($clase_actual): ?>
        <span class="color-clase-circulo <?= $color ?>"></span>
        <div>
            <span class="titulo-nombre-clase-hero"><?= htmlspecialchars(string: $clase_actual['nombre']) ?></span>
            <p class="profesor-nombre-hero"><?= htmlspecialchars(string: $clase_actual['profesor']) ?></p>
        </div>
    <?php else: ?>
        <span class="clase-no-encontrada">Clase no encontrada</span>
    <?php endif; ?>
</div>
<section id="seccion-contenido-clase">
    <div class="contenedor-clase">
        <div class="info-clase">
            <h3>Información de la clase</h3>
            <p><strong>Código:</strong> <?= isset($clase_actual) ? htmlspecialchars($clase_actual['codigo']) : '' ?></p>
            <div class="menu-materias-lateral"></div>
        </div>

        <div class="mensajes-publicaciones">
            <h3>Mensajes de la clase</h3>
            <form class="caja-comentario-mensajes" method="post" action="">
                <textarea id="comentario-mensajes" name="nuevo-mensaje" placeholder="Escribe un comentario..." required></textarea>
                <button type="submit">Publicar</button>
            </form>
            <div class="lista-comentarios-mensajes">
                <?php
                $hay_mensajes = false;
                foreach($publicaciones as $pub){
                    if(trim(string: $pub['asunto']) == "") {
                        $hay_mensajes = true;
                        ?>
                        <div class="tarea-item contenedor-tarea-item">
                            <?php if($pub['id_cuenta'] == $id_cuenta): ?>
                                <a class="editar-btn-publicacion" title="Editar comentario" href="Editar-Publicacion.php?id=<?= $pub['id_publicacion'] ?>">✎</a>
                            <?php endif; ?>
                            <?php if($es_profesor_clase): ?>
                                <form method="post" style="display:inline;">
                                    <input type="hidden" name="eliminar_publicacion_id" value="<?= $pub['id_publicacion'] ?>">
                                    <button class="eliminar-btn-publicacion" title="Eliminar comentario" type="submit" onclick="return confirm('¿Seguro que desea eliminar este comentario?')">🗑</button>
                                </form>
                            <?php endif; ?>
                            <div class="cabecera-publicacion-comentario">
                                <span style="font-weight:bold; color:var(--azul);"><?= htmlspecialchars(string: $pub['usuario']) ?></span>
                                <span style="color:#888;">se publicó el <?= date(format: 'd/m/Y H:i', timestamp: strtotime(datetime: $pub['fecha'])) ?></span>
                                <?php if(!empty($pub['fecha_edicion'])): ?>
                                    <span class="fecha-edicion-comentario">(se editó el <?= date(format: 'd/m/Y H:i', timestamp: strtotime(datetime: $pub['fecha_edicion'])) ?>)</span>
                                <?php endif; ?>
                            </div>
                            <?= nl2br(string: htmlspecialchars(string: $pub['contenido'])) ?>
                        </div>
                        <?php
                    }
                }
                if(!$hay_mensajes){
                    echo '<div class="tarea-item">No hay mensajes aún.</div>';
                }
                ?>
            </div>
        </div>

        <div class="tareas-asignadas">
            <h3>Tareas asignadas</h3>
            <?php
            $hay_tareas = false;
            foreach($publicaciones as $pub){
                if(trim(string: $pub['asunto']) != "") {
                    $hay_tareas = true;
                    ?>
                    <div class="tarea-item">
                        <div style="font-weight:bold; color:var(--azul);"><?= htmlspecialchars($pub['asunto']) ?></div>
                        <?= nl2br(string: htmlspecialchars(string: $pub['contenido'])) ?>
                    </div>
                    <?php
                }
            }
            if(!$hay_tareas){
                echo '<div class="tarea-item">No hay tareas asignadas.</div>';
            }
            ?>
        </div>

        <div class="materiales-clase">
            <h3>Materiales</h3>
            <div class="material-item-clase">📄 Apuntes de la clase 1</div>
            <div class="material-item-clase">📄 Apuntes de la clase 2</div>
        </div>
    </div>
</section>
<section id="seccion-lateral-menu">
    <button class="boton-icono-menu">☰</button>
    <div id="menu-materias-lateral" class="menu-materias-lateral oculto">
        <hr>
        <?php foreach($materias_menu as $materia): ?>
            <div><span class="mensaje-menu-lateral"><strong><?= htmlspecialchars($materia); ?></strong></span></div>
        <?php endforeach; ?>
    </div>
</section>
<script>
  document.querySelector('.boton-icono-menu').addEventListener('click', function() {
    document.getElementById('menu-materias-lateral').classList.toggle('visible');
    document.getElementById('menu-materias-lateral').classList.toggle('oculto');
  });
</script>
</body>
</html>
