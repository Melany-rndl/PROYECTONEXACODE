<?php
session_start();
if (!isset($_SESSION['id_cuenta'])) { header("Location: Logueo.php"); exit(); }
$conexion = mysqli_connect("localhost", "root", "", "p25");
if (!$conexion) die("Error de conexión");
date_default_timezone_set('America/La_Paz');
$id_cuenta = $_SESSION['id_cuenta'];
$res_rol = mysqli_query($conexion, "SELECT rol, usuario FROM cuenta WHERE id_cuenta='$id_cuenta'");
$usuario_actual = mysqli_fetch_assoc($res_rol);
$rol = $usuario_actual ? $usuario_actual['rol'] : '';
$nombre_usuario = $usuario_actual ? $usuario_actual['usuario'] : '';
$id_clase = isset($_GET['id']) ? intval($_GET['id']) : 0;
$clase_actual = null; // Siempre definida
$color = '';
$es_profesor_clase = false;
$colores = ['celeste', 'azul', 'morado', 'verde', 'verdeO', 'naranja', 'amarillo', 'rosa'];
function colorClase($nombre, $colores): mixed {
    return $colores[abs(crc32(strtolower($nombre))) % count($colores)];
}
if ($id_clase > 0) {
    $sql_clase = "SELECT clase.*, cuenta.usuario AS profesor 
                  FROM clase
                  JOIN cuenta ON clase.id_profesor = cuenta.id_cuenta
                  WHERE clase.id_clase = '$id_clase'";
    $res_clase = mysqli_query($conexion, $sql_clase);
    $clase_actual = mysqli_fetch_assoc($res_clase);
    if ($clase_actual) {
        $color = colorClase($clase_actual['nombre'], $colores);
        if ($rol === 'profesor' && $clase_actual['id_profesor'] == $id_cuenta) {
            $es_profesor_clase = true;
        }
    }
}
$sql = "SELECT clase.*, cuenta.usuario AS profesor FROM clase JOIN cuenta_has_clase ON clase.id_clase = cuenta_has_clase.clase_id_clase JOIN cuenta ON clase.id_profesor = cuenta.id_cuenta WHERE cuenta_has_clase.cuenta_id_cuenta = '$id_cuenta' ORDER BY clase.nombre ASC";
$res = mysqli_query($conexion, $sql);
$clases_usuario = [];
$materias_menu = [];
while ($clase = mysqli_fetch_assoc($res)) {
    $clases_usuario[] = $clase;
    $materias_menu[strtolower($clase['nombre'])] = ucfirst($clase['nombre']);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['eliminar_publicacion_id']) && $es_profesor_clase) {
    $id_pub_eliminar = intval($_POST['eliminar_publicacion_id']);
    mysqli_query($conexion, "DELETE FROM publicacion WHERE id_publicacion = '$id_pub_eliminar' AND clase_id_clase = '$id_clase'");
    header("Location: Clase-Formulario.php?id=$id_clase");
    exit();
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nuevo-mensaje'])) {
    $mensaje = trim($_POST['nuevo-mensaje']);
    if ($mensaje !== "" && $id_cuenta && $id_clase) {
        $mensaje = mysqli_real_escape_string($conexion, $mensaje);
        $fecha = date('Y-m-d H:i:s');
        mysqli_query($conexion, "INSERT INTO publicacion (asunto, contenido, fecha, cuenta_id_cuenta, clase_id_clase) VALUES ('', '$mensaje', '$fecha', '$id_cuenta', '$id_clase')");
        header("Location: Clase-Formulario.php?id=$id_clase");
        exit();
    }
}

$publicaciones = [];
if ($id_clase > 0) {
    $res_publicaciones = mysqli_query($conexion, "SELECT p.id_publicacion, p.asunto, p.contenido, p.fecha, p.fecha_edicion, c.usuario, c.id_cuenta FROM publicacion p JOIN cuenta c ON p.cuenta_id_cuenta=c.id_cuenta WHERE p.clase_id_clase = '$id_clase' ORDER BY p.id_publicacion DESC");
    while ($row = mysqli_fetch_assoc($res_publicaciones)) {
        $publicaciones[] = $row;
    }
}

if ($clase_actual) {
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
];
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nexa Class - Mis Clases</title>
    <link rel="stylesheet" href="Tareas.css">
    <style>
        body{
            display: grid;
            grid-template-rows: 95px;
            grid-template-columns: 100%;
            grid-template-areas:
              "pag"
              "contenido";
            min-height: 100vh;
            margin: 0;
            padding: 0;
            background: #fff;
            font-family: Arial, sans-serif;
        }
        main#contenido-principal{
            grid-area: contenido;
            margin: 0;
            padding: 0;
        }
        .seccion-hero-clase {
            margin-top: 0;
        }
    </style>
</head>
<body>
<?php include 'cabecera.php'; ?>
<main id="contenido-principal">
    <div class="seccion-hero-clase <?= $color ?>">  
        <?php if ($clase_actual): ?>
            <span class="color-clase-circulo <?= $color ?>"></span>
            <div>
                <span class="titulo-nombre-clase-hero"><?= htmlspecialchars($clase_actual['nombre']) ?></span>
                <p class="profesor-nombre-hero"><?= htmlspecialchars($clase_actual['profesor']) ?></p>
            </div>
        <?php else: ?>
            <span class="clase-no-encontrada">Clase no encontrada</span>
        <?php endif; ?>
    </div>
    <?php if ($clase_actual): ?>
    <section id="seccion-contenido-clase">
        <div class="contenedor-clase">
            <div class="info-clase">
                <h3>Información de la clase</h3>
                <p><strong>Código:</strong> <?= htmlspecialchars($clase_actual['codigo']) ?></p>
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
                        if(trim($pub['asunto']) == "") {
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
                                    <span style="font-weight:bold; color:var(--azul);"><?= htmlspecialchars($pub['usuario']) ?></span>
                                    <span style="color:#888;">se publicó el <?= date('d/m/Y H:i', strtotime($pub['fecha'])) ?></span>
                                    <?php if(!empty($pub['fecha_edicion'])): ?>
                                        <span class="fecha-edicion-comentario">(se editó el <?= date('d/m/Y H:i', strtotime($pub['fecha_edicion'])) ?>)</span>
                                    <?php endif; ?>
                                </div>
                                <?= nl2br(htmlspecialchars($pub['contenido'])) ?>
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
                    if(trim($pub['asunto']) != "") {
                        $hay_tareas = true;
                        ?>
                        <div class="tarea-item">
                            <div style="font-weight:bold; color:var(--azul);"><?= htmlspecialchars($pub['asunto']) ?></div>
                            <?= nl2br(htmlspecialchars($pub['contenido'])) ?>
                        </div>
                        <?php
                    }
                }
                if(!$hay_tareas){
                    echo '<div class="tarea-item">No hay tareas asignadas.</div>';
                }
                ?>
            </div>
        </div>
    </section>
    <section id="seccion-lateral-menu">
        <div id="menu-materias-lateral" class="menu-materias-lateral oculto">
            <hr>
            <?php foreach($materias_menu as $materia): ?>
                <div><span class="mensaje-menu-lateral"><strong><?= htmlspecialchars($materia); ?></strong></span></div>
            <?php endforeach; ?>
        </div>
    </section>
    <?php endif; ?>
</main>
<script>
  var botonMenu = document.querySelector('.boton-icono-menu');
  if(botonMenu){
    botonMenu.addEventListener('click', function() {
      document.getElementById('menu-materias-lateral').classList.toggle('visible');
      document.getElementById('menu-materias-lateral').classList.toggle('oculto');
    });
  }
</script>
</body>
</html>
