<?php
session_start();
if (!isset($_SESSION['id_cuenta'])) { header("Location: Logueo.php"); exit(); }
$conexion = mysqli_connect("localhost", "root", "", "p25");
if (!$conexion) die("Error de conexión");
$id_cuenta = $_SESSION['id_cuenta'];
$id_clase = isset($_GET['id']) ? intval($_GET['id']) : 0;
if ($id_clase <= 0) { echo "Clase no encontrada."; exit(); }

$res_rol = mysqli_query($conexion, "SELECT rol FROM cuenta WHERE id_cuenta='$id_cuenta'");
$rol = ($row = mysqli_fetch_assoc($res_rol)) ? $row['rol'] : '';
$materias_menu = [];
$res_materias = mysqli_query($conexion, 
    "SELECT clase.nombre FROM clase 
     JOIN cuenta_has_clase ON clase.id_clase = cuenta_has_clase.clase_id_clase 
     WHERE cuenta_has_clase.cuenta_id_cuenta = '$id_cuenta' ORDER BY clase.nombre ASC");
while ($row = mysqli_fetch_assoc($res_materias)) {
    $materias_menu[strtolower($row['nombre'])] = ucfirst($row['nombre']);
}

$sql = "SELECT clase.*, cuenta.usuario AS profesor, clase.id_profesor 
        FROM clase
        JOIN cuenta ON clase.id_profesor = cuenta.id_cuenta
        JOIN cuenta_has_clase chc ON clase.id_clase = chc.clase_id_clase
        WHERE clase.id_clase = '$id_clase' AND chc.cuenta_id_cuenta = '$id_cuenta'";
$res = mysqli_query($conexion, $sql);
$clase = mysqli_fetch_assoc($res);
if (!$clase) { echo "No tienes acceso a esta clase."; exit(); }
$soy_profesor = ($clase['id_profesor'] == $id_cuenta);

$sql_tareas = "SELECT t.id_tarea, t.titulo, t.descripcion, t.tema, t.nota, t.clase_id_clase
               FROM tarea t
               WHERE t.clase_id_clase = '$id_clase'
               ORDER BY t.id_tarea DESC";
$res_tareas = mysqli_query($conexion, $sql_tareas);
$tareas = [];
while ($row = mysqli_fetch_assoc($res_tareas)) {
    $tareas[] = $row;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Tareas - <?= htmlspecialchars($clase['nombre']); ?> - Nexa Classroom</title>
  <style>
    .contenedor-cuerpo-tareas {
      max-width: 1400px;
      width: 100%;
      margin: 40px auto 0 auto;
      padding: 0 8px 30px 8px;
      min-height: 300px;
    }
    .boton-crear-tarea {
      display: block;
      width: 100%;
      max-width: 500px;
      margin: 0 auto 30px auto;
      padding: 18px 0;
      background: #3c328f;
      color: #fff;
      font-size: 1.4rem;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      transition: background 0.2s;
      box-shadow: 0 2px 8px #0002;
      text-decoration: none;
      text-align: center;
      font-family: inherit;
    }
    .boton-crear-tarea:hover {
      background: #5743c6;
    }
    .tarea-card {
      background: #fff;
      border: 1px solid #ddd;
      border-radius: 8px;
      margin-bottom: 24px;
      padding: 18px 12px;
      box-shadow: 0 2px 8px #0001;
      transition: box-shadow 0.2s;
      text-decoration: none;
      color: #232323;
      display: block;
      position: relative;
      min-height: 80px;
    }
    .tarea-card:hover {
      box-shadow: 0 4px 16px #0002;
      background: #f8f8ff;
    }
    .tarea-titulo {
      font-size: 40px;
      font-weight: bold;
      margin-bottom: 8px;
      color: #3c328f;
    }
    .tarea-info {
      font-size: 20px;
      color: #777;
      margin-bottom: 8px;
    }
    .tarea-preview {
      font-size: 22px;
      color: #444;
      white-space: pre-line;
    }
    .sin-tareas {
      text-align: center;
      color: #888;
      margin-top: 50px;
      font-size: 20px;
    }
    .editar-tarea-btn {
      position: absolute;
      top: 10px;
      right: 10px;
      background: none;
      border: none;
      cursor: pointer;
      font-size: 1.8rem;
      color: #3c328f;
      z-index: 2;
      padding: 0;
    }
    .editar-tarea-btn:hover {
      color: #5743c6;
      background: #e9e9fc;
      border-radius: 50%;
    }
    /* Botón de entrega */
    .entregar-btn {
      display: inline-block;
      margin-top: 10px;
      padding: 11px 20px;
      background: #2196f3;
      color: #fff;
      border: none;
      border-radius: 7px;
      font-size: 1rem;
      cursor: pointer;
      text-decoration: none;
      transition: background 0.2s;
    }
    .entregar-btn:hover {
      background: #1976d2;
      color: #fff;
    }
  </style>
</head>
<body>
<?php include 'cabecera.php'; ?>

<div class="contenedor-cuerpo-tareas">
    <?php if ($soy_profesor): ?>
      <a class="boton-crear-tarea" href="Formulario-Crear-Publicacion.php?id=<?= $id_clase ?>">+ Crear tarea</a>
    <?php endif; ?>

    <?php if (count($tareas) == 0): ?>
      <div class="sin-tareas">No hay tareas aún para esta clase.</div>
    <?php else: ?>
      <?php foreach($tareas as $tarea): ?>
        <div class="tarea-card">
          <?php if ($soy_profesor): ?>
            <a class="editar-tarea-btn" title="Editar tarea" href="Editar-Tareas.php?id_tarea=<?= $tarea['id_tarea'] ?>">✏️</a>
          <?php endif; ?>
          <div class="tarea-titulo"><?= htmlspecialchars($tarea['titulo']) ?></div>
          <?php if (trim($tarea['tema'])): ?>
            <div class="tarea-info">Tema: <?= htmlspecialchars($tarea['tema']) ?></div>
          <?php endif; ?>
          <?php if ($tarea['nota'] !== null): ?>
            <div class="tarea-info">Nota máxima: <?= htmlspecialchars($tarea['nota']) ?></div>
          <?php endif; ?>
          <div class="tarea-preview">
            <?= htmlspecialchars(mb_strimwidth($tarea['descripcion'], 0, 170, (mb_strlen($tarea['descripcion']) > 170 ? '...' : ''))) ?>
          </div>
          <!-- BOTÓN DE ENTREGA (visible solo para alumnos) -->
          <?php if (!$soy_profesor): ?>
            <a class="entregar-btn" href="Subir-Tareas.php?id_tarea=<?= urlencode($tarea['id_tarea']) ?>&id_clase=<?= urlencode($tarea['clase_id_clase']) ?>">
              Subir mi entrega
            </a>
          <?php endif; ?>
        </div>
      <?php endforeach; ?>
    <?php endif; ?>
</div>

<script>
const botonMenuMaterias = document.querySelector('.iconomenu');
const menuMaterias = document.getElementById('menuMaterias');
if (botonMenuMaterias && menuMaterias) {
  botonMenuMaterias.onclick = function() {
    menuMaterias.classList.toggle('visible');
    menuMaterias.classList.toggle('oculto');
  }
}

const botonMenuProfesor = document.getElementById('accion-profesor-btn');
const menuAccionProfesor = document.getElementById('menu-accion-profesor');
if (botonMenuProfesor && menuAccionProfesor) {
  botonMenuProfesor.onclick = function(e) {
    menuAccionProfesor.style.display = (menuAccionProfesor.style.display === 'block') ? 'none' : 'block';
    e.stopPropagation();
  }
  document.onclick = function(e) {
    if (
      menuAccionProfesor.style.display === 'block' &&
      !menuAccionProfesor.contains(e.target) && e.target !== botonMenuProfesor
    ) {
      menuAccionProfesor.style.display = 'none';
    }
  }
}
</script>
</body>
</html>
