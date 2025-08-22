<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <title>Crear Publicación - Nexa Classroom</title>
  <link rel="stylesheet" href="Tareas.css">
</head>
<body>
  <div class="form-publicacion-container">
    <form class="form-publicacion" action="Guardar-Publicacion.php" method="post">
      <div class="form-publicacion-header">
        <span class="form-publicacion-icon">📝</span>
        <h1>Crear Nueva Publicación</h1>
      </div>
      <input type="hidden" name="id_clase" value="<?= isset($_GET['id']) ? intval($_GET['id']) : 0 ?>">
      <div class="form-publicacion-group">
        <label for="asunto">Título de la publicación</label>
        <input type="text" id="asunto" name="asunto" maxlength="80" required placeholder="Ejemplo: Tarea de Álgebra">
      </div>
      <div class="form-publicacion-group">
        <label for="contenido">Contenido</label>
        <textarea id="contenido" name="contenido" maxlength="1000" required placeholder="Describe la tarea, instrucciones, recursos..."></textarea>
      </div>
      <div class="form-publicacion-group">
        <label for="fecha">Fecha de entrega</label>
        <input type="date" id="fecha" name="fecha" required>
      </div>
      <div class="form-publicacion-actions">
        <button type="submit" class="form-publicacion-btn">Publicar</button>
        <a href="Tareas-Formulario.php?id=<?= isset($_GET['id']) ? intval($_GET['id']) : 0 ?>" class="form-publicacion-cancel">Cancelar</a>
      </div>
    </form>
  </div>
</body>
</html>