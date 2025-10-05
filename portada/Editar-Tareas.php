<?php
session_start();
if (!isset($_SESSION['id_cuenta'])) { header("Location: Logueo.php"); exit(); }
$conexion = mysqli_connect("localhost", "root", "", "p25");
if (!$conexion) die("Error de conexión");

$id_usuario = $_SESSION['id_cuenta'];
$id_tarea = isset($_GET['id_tarea']) ? intval($_GET['id_tarea']) : 0;

$consulta_tarea = "SELECT tarea.*, clase.id_profesor 
        FROM tarea
        JOIN clase ON tarea.id_clase = clase.id_clase
        WHERE tarea.id_tarea = $id_tarea";
$resultado_tarea = mysqli_query($conexion, $consulta_tarea);
$datos_tarea = mysqli_fetch_assoc($resultado_tarea);

if (!$datos_tarea) {
    echo "No se encontró la tarea.";
    exit();
}

if ($datos_tarea['id_profesor'] != $id_usuario) {
    echo "No tienes permisos para editar esta tarea.";
    exit();
}

$mensaje_actualizacion = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombre_tarea = trim($_POST['nombre_tarea'] ?? '');
    $descripcion_tarea = trim($_POST['descripcion_tarea'] ?? '');
    $tema_tarea = trim($_POST['tema_tarea'] ?? '');
    $nota_tarea = isset($_POST['nota_tarea']) && $_POST['nota_tarea'] !== "" ? floatval($_POST['nota_tarea']) : null;

    if (strlen($nombre_tarea) < 3 || strlen($nombre_tarea) > 80 || strlen($descripcion_tarea) < 5 || strlen($descripcion_tarea) > 1000) {
        $mensaje_actualizacion = "Datos no válidos.";
    } else {
        $sentencia_actualizar = mysqli_prepare($conexion, "UPDATE tarea SET titulo=?, descripcion=?, tema=?, nota=? WHERE id_tarea=?");
        mysqli_stmt_bind_param($sentencia_actualizar, "sssdi", $nombre_tarea, $descripcion_tarea, $tema_tarea, $nota_tarea, $id_tarea);
        if (mysqli_stmt_execute($sentencia_actualizar)) {
            $mensaje_actualizacion = "Tarea actualizada correctamente.";
            $datos_tarea['titulo'] = $nombre_tarea;
            $datos_tarea['descripcion'] = $descripcion_tarea;
            $datos_tarea['tema'] = $tema_tarea;
            $datos_tarea['nota'] = $nota_tarea;
        } else {
            $mensaje_actualizacion = "Error al actualizar la tarea.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <title>Editar Tarea - Nexa Classroom</title>
  <link rel="stylesheet" href="Tareas.css">
<style>
/* Contenedor del formulario */
.formulario-editar-tarea-container { 
    max-width: 650px;        /* Más ancho que antes */
    margin: 50px auto;       /* Más espacio arriba */
    background: #fff; 
    border-radius: 12px; 
    box-shadow: 0 4px 20px rgba(0,0,0,0.15); 
    padding: 40px 30px;      /* Padding más generoso */
}

/* Header del formulario */
.formulario-editar-tarea-header { 
    display: flex; 
    align-items: center; 
    gap: 10px;
    margin-bottom: 40px;
}
.formulario-editar-tarea-header .icono-editar { 
    font-size: 2.4rem; 
}

/* Grupos de campos */
.formulario-editar-tarea-grupo { 
    margin-bottom: 22px; 
}
.formulario-editar-tarea-grupo label { 
    display: block; 
    margin-bottom: 6px; 
    color: #3c328f; 
    font-weight: 600;
    font-size: 1.05rem;
}
.formulario-editar-tarea-grupo input, 
.formulario-editar-tarea-grupo textarea { 
    width: 100%; 
    padding: 14px 12px; 
    border: 1px solid #ccc; 
    border-radius: 8px;
    font-size: 1rem;
    transition: border-color 0.2s;
}
.formulario-editar-tarea-grupo input:focus,
.formulario-editar-tarea-grupo textarea:focus {
    border-color: #3c328f;
    outline: none;
}
.formulario-editar-tarea-grupo textarea { 
    min-height: 120px;   /* Más alto */
}

/* Acciones */
.formulario-editar-tarea-acciones { 
    display: flex; 
    gap: 15px; 
    margin-top: 10px;
}
.formulario-editar-tarea-btn { 
    background: #3c328f; 
    color: #fff; 
    border: none; 
    border-radius: 8px; 
    padding: 14px 28px; 
    font-size: 1.1rem; 
    cursor: pointer;
    transition: background 0.3s;
}
.formulario-editar-tarea-btn:hover { 
    background: #5743c6;
}

/* Mensajes */
.mensaje-resultado { 
    margin-bottom: 12px; 
    color: #229422; 
}
.mensaje-error { 
    margin-bottom: 12px; 
    color: #c00; 
}

/* Media Queries */
@media(max-width: 900px){
    .formulario-editar-tarea-container {
        max-width: 90%;
        padding: 35px 20px;
    }
}

@media(max-width: 600px){
    .formulario-editar-tarea-container {
        padding: 25px 15px;
        margin: 30px auto;
    }
    .formulario-editar-tarea-header {
        flex-direction: column;
        align-items: flex-start;
        gap: 8px;
    }
    .formulario-editar-tarea-btn {
        width: 100%;
        text-align: center;
    }
    .formulario-editar-tarea-acciones {
        flex-direction: column;
        gap: 12px;
    }
}
</style>

</head>
<body>
<?php include 'cabecera.php'; ?>

<div class="formulario-editar-tarea-container">
    <form class="formulario-editar-tarea" method="post">
      <div class="formulario-editar-tarea-header">
        <span class="icono-editar">✏️</span>
        <h2>Editar Tarea</h2>
      </div>
      <?php if ($mensaje_actualizacion): ?>
        <div class="<?= strpos($mensaje_actualizacion, "correctamente") !== false ? 'mensaje-resultado' : 'mensaje-error' ?>">
          <?= htmlspecialchars($mensaje_actualizacion) ?>
        </div>
      <?php endif; ?>
      <div class="formulario-editar-tarea-grupo">
        <label for="nombre_tarea">Título de la tarea</label>
        <input type="text" id="nombre_tarea" name="nombre_tarea" maxlength="80" required value="<?= htmlspecialchars($datos_tarea['titulo']) ?>">
      </div>
      <div class="formulario-editar-tarea-grupo">
        <label for="descripcion_tarea">Descripción</label>
        <textarea id="descripcion_tarea" name="descripcion_tarea" maxlength="1000" required><?= htmlspecialchars($datos_tarea['descripcion']) ?></textarea>
      </div>
      <div class="formulario-editar-tarea-grupo">
        <label for="tema_tarea">Tema</label>
        <input type="text" id="tema_tarea" name="tema_tarea" maxlength="100" value="<?= htmlspecialchars($datos_tarea['tema']) ?>">
      </div>
      <div class="formulario-editar-tarea-grupo">
        <label for="nota_tarea">Nota máxima (opcional)</label>
        <input type="number" id="nota_tarea" name="nota_tarea" step="0.01" min="0" max="100" value="<?= htmlspecialchars($datos_tarea['nota']) ?>">
      </div>
      <div class="formulario-editar-tarea-acciones">
        <button type="submit" class="formulario-editar-tarea-btn">Guardar cambios</button>
      </div>
    </form>
</div>
</body>
</html>
