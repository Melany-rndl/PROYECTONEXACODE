<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <title>Crear Tarea - Nexa Classroom</title>
  <link rel="stylesheet" href="Tareas.css">
  <link rel="stylesheet" href="Diseño-Login.css">
</head>
<body>
  <div class="animacion-inicial">
    <form class="form-publicacion" action="Guardar-Publicacion.php" method="post">
      <div class="form-publicacion-header">
        <span class="form-publicacion-icon">📝</span>
        <h1>Crear Nueva Tarea</h1>
      </div>
      <input type="hidden" name="id_clase" value="<?= isset($_GET['id']) ? intval($_GET['id']) : 0 ?>">
      <div class="form-publicacion-group">
        <label for="titulo">Título de la tarea</label>
        <input type="text" id="titulo" name="titulo" maxlength="80" required placeholder="Ejemplo: Tarea de Álgebra">
      </div>
      <div class="form-publicacion-group">
        <label for="descripcion">Descripción</label>
        <textarea id="descripcion" name="descripcion" maxlength="1000" required placeholder="Describe la tarea, instrucciones, recursos..."></textarea>
      </div>
      <div class="form-publicacion-group">
        <label for="tema">Tema</label>
        <input type="text" id="tema" name="tema" maxlength="100" placeholder="Ejemplo: Polinomios">
      </div>
      <div class="form-publicacion-group">
        <label for="nota">Nota máxima (opcional)</label>
        <input type="number" id="nota" name="nota" step="0.01" min="0" max="100" placeholder="Ej: 100">
      </div>
      <div class="form-publicacion-actions">
        <button type="submit" class="form-publicacion-btn">Crear tarea</button>
        <a href="Tareas-Formulario.php?id=<?= isset($_GET['id']) ? intval($_GET['id']) : 0 ?>" class="form-publicacion-cancel">Cancelar</a>
      </div>
    </form>
  </div>
</body>
</html>
