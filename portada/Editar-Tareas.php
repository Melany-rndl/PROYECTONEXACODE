<?php
session_start();
if (!isset($_SESSION['id_cuenta'])) { header("Location: Logueo.php"); exit(); }
$conexion = mysqli_connect("localhost", "root", "", "p25");
if (!$conexion) die("Error de conexión");

$id_usuario = $_SESSION['id_cuenta'];
$id_tarea = isset($_GET['id_tarea']) ? intval($_GET['id_tarea']) : 0;

$consulta_tarea = "SELECT tarea.*, clase.id_profesor 
        FROM tarea
        JOIN clase ON tarea.clase_id_clase = clase.id_clase
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
    .formulario-editar-tarea-container { 
        max-width: 520px; 
        margin: 40px auto; 
        background: #fff; 
        border-radius: 8px; 
        box-shadow: 0 2px 10px #0002; 
        padding: 32px 20px;
    }
    .formulario-editar-tarea-header { 
        display: flex; 
        align-items: center; 
        gap: 7px;
        margin-bottom: 40px;
    }
    .formulario-editar-tarea-header .icono-editar { 
        font-size: 2.1rem; 
    }
    .formulario-editar-tarea-grupo { 
        margin-bottom: 18px; 
    }
    .formulario-editar-tarea-grupo label { 
        display: block; 
        margin-bottom: 4px; 
        color: #3c328f; 
        font-weight: 500;
    }
    .formulario-editar-tarea-grupo input, .formulario-editar-tarea-grupo textarea { 
        width: 100%; 
        padding: 10px; 
        border: 1px solid #ccc; 
        border-radius: 5px;
    }
    .formulario-editar-tarea-grupo textarea { 
        min-height: 80px;
    }
    .formulario-editar-tarea-acciones { 
        display: flex; 
        gap: 10px; 
    }
    .formulario-editar-tarea-btn { 
        background: #3c328f; 
        color: #fff; 
        border: none; 
        border-radius: 6px; 
        padding: 12px 25px; 
        font-size: 1.1rem; 
        cursor: pointer;
    }
    .formulario-editar-tarea-btn:hover { 
        background: #5743c6;
    }
    .formulario-editar-tarea-cancelar { 
        color: #666; 
        text-decoration: none; 
        padding: 12px 18px;
    }
    .mensaje-resultado { 
        margin-bottom: 10px; 
        color: #229422; 
    }
    .mensaje-error { 
        margin-bottom: 10px; 
        color: #c00; 
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
        <a href="Tareas-Formulario.php?id=<?= intval($datos_tarea['clase_id_clase']) ?>" class="formulario-editar-tarea-cancelar">Cancelar</a>
      </div>
    </form>
</div>
</body>
</html>
