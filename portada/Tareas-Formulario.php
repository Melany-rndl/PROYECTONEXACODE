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
$res_materias = mysqli_query($conexion, "SELECT clase.nombre FROM clase 
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

// CORREGIDO: usar t.clase_id_clase
$sql_tarea = "SELECT t.id_tarea, t.titulo, t.descripcion, t.tema, t.nota, t.clase_id_clase
               FROM tarea t
               WHERE t.clase_id_clase = '$id_clase'
               ORDER BY t.id_tarea DESC";
$res_tarea = mysqli_query($conexion, $sql_tarea);
$tarea = [];
while ($row = mysqli_fetch_assoc($res_tarea)) {
    $tarea[] = $row;
}
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
]
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
    .tarea-btn {
      background: none;
      border: none;
      width: 100%;
      text-align: left;
      padding: 0;
      margin-bottom: 24px;
      display: block;
    }
    .tarea-card {
      background: #fff;
      border: 1px solid #ddd;
      border-radius: 8px;
      padding: 18px 12px;
      box-shadow: 0 2px 8px #0001;
      transition: box-shadow 0.2s;
      color: #232323;
      min-height: 80px;
      position: relative;
      width: 100%;
      box-sizing: border-box;
      cursor: pointer;
      display: block;
    }
    .tarea-card:hover {
      box-shadow: 0 4px 16px #0002;
      background: #f8f8ff;
    }
    .tarea-titulo {
      font-size: 32px;
      font-weight: bold;
      margin-bottom: 8px;
      color: #3c328f;
    }
    .tarea-info {
      font-size: 17px;
      color: #777;
      margin-bottom: 8px;
    }
    .tarea-preview {
      font-size: 19px;
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

    <?php if (count($tarea) == 0): ?>
      <div class="sin-tareas">No hay tareas aún para esta clase.</div>
    <?php else: ?>
      <?php foreach($tarea as $tarea): ?>
        <?php
        // ENLACE DEPENDIENDO DEL ROL
        if ($soy_profesor) {
            $form_action = "profesor_ver_entregas.php";
            $field_name = "id_tarea";
            $field_value = $tarea['id_tarea'];
        } else {
            $form_action = "estudiante_mis_notas.php";
            $field_name = "id_tarea";
            $field_value = $tarea['id_tarea'];
        }
        ?>
        <form method="get" action="<?= $form_action ?>" class="tarea-btn" style="margin:0;padding:0;">
          <input type="hidden" name="<?= $field_name ?>" value="<?= $field_value ?>">
          <button type="submit" style="all:unset;width:100%;display:block;cursor:pointer;">
            <div class="tarea-card">
              <?php if ($soy_profesor): ?>
                <a class="editar-tarea-btn" title="Editar tarea" href="Editar-Tareas.php?id_tarea=<?= $tarea['id_tarea'] ?>" onclick="event.stopPropagation();">✏️</a>
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
              <?php if (!$soy_profesor): ?>
                <?php
                $id_usuario = $_SESSION['id_cuenta'];
                $id_tarea_alumno = $tarea['id_tarea'];
                $resEnt = mysqli_query($conexion, "SELECT 1 FROM entrega WHERE tarea_id_tarea='$id_tarea_alumno' AND cuenta_id_cuenta='$id_usuario'");
                $yaEntrego = mysqli_fetch_assoc($resEnt);
                $nombreBase = "E-$id_usuario-$id_tarea_alumno";
                $dir = "./media/";
                $exts = ["pdf", "jpg", "jpeg", "png", "gif", "webp", "docx", "xlsx", "txt", "zip"];
                $archivoSubido = false;
                foreach($exts as $e) {
                  if (file_exists($dir . $nombreBase . "." . $e)) { $archivoSubido = true; break; }
                }
                ?>
                <?php if (!$archivoSubido): ?>
                  <a class="entregar-btn" href="Subir-Tareas.php?id_tarea=<?= urlencode($tarea['id_tarea']) ?>&id_clase=<?= urlencode($tarea['clase_id_clase']) ?>" onclick="event.stopPropagation();">
                    Subir mi entrega
                  </a>
                <?php else: ?>
                  <span style="display:inline-block;margin-top:12px;color:#3c328f;font-weight:bold;">Entrega subida</span>
                <?php endif; ?>
              <?php endif; ?>
            </div>
          </button>
        </form>
      <?php endforeach; ?>
    <?php endif; ?>
</div>
</body>
</html>
