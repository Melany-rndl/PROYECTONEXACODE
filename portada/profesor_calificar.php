<?php
session_start();
include("conexion.php");

if (!isset($_SESSION['id_cuenta'])) {
    header("Location: Logueo.php");
    exit();
}
$id_profesor = $_SESSION['id_cuenta'];
$rol = "";
$res_rol = $conn->query("SELECT rol FROM cuenta WHERE id_cuenta='$id_profesor'");
if ($res_rol && $row = $res_rol->fetch_assoc()) $rol = $row['rol'];
if ($rol != "profesor") { die("Acceso denegado."); }

$id_entrega = isset($_GET['id_entrega']) ? intval($_GET['id_entrega']) : (isset($_POST['id_entrega']) ? intval($_POST['id_entrega']) : 0);
$volver = isset($_GET['volver']) ? $_GET['volver'] : (isset($_POST['volver']) ? $_POST['volver'] : null);
if ($id_entrega <= 0) { echo "Entrega no especificada."; exit(); }

$sql = "SELECT e.*, t.nota AS nota_maxima, t.titulo, i.nombre, i.apellido
FROM entrega e
JOIN tarea t ON e.tarea_id_tarea = t.id_tarea
JOIN clase c ON t.clase_id_clase = c.id_clase
JOIN informacion i ON e.cuenta_id_cuenta = i.cuenta_id_cuenta
WHERE e.id_entrega = $id_entrega AND c.id_profesor = $id_profesor";
$res = $conn->query($sql);
$entrega = $res->fetch_assoc();
if (!$entrega) { echo "Entrega no válida."; exit(); }

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nota = floatval($_POST['nota'] ?? 0);
    
    $conn->query("UPDATE entrega SET nota=$nota WHERE id_entrega=$id_entrega");
    echo "<div style='max-width:400px;margin:70px auto;background:white;padding:30px;border-radius:12px;box-shadow:0 2px 12px #0002;'>
            <h2 style='color:#3c328f'>Nota guardada correctamente</h2>
            <a href='". ($volver ? htmlspecialchars($volver) : "profesor_ver_entregas.php") ."' style='color:#3c328f;'>Volver</a>
          </div>";
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Asignar nota</title>
  <style>
    body { 
    font-family: Arial; 
        background: #f6f6f6; 
        margin:0;
    }
    .container { 
        max-width: 400px; 
        margin: 70px auto; 
        background: #fff; 
        border-radius: 14px; 
        box-shadow: 0 2px 12px #0002; 
        padding: 35px 30px 28px 30px; 
    }
    label { 
        color:#3c328f; 
        font-weight:bold;
    }
    input[type=number] { 
        width: 100%; 
        font-size: 1.2em; 
        padding: 7px 5px; 
        border-radius: 6px; 
        border:1px solid #bbb; 
        margin-bottom: 15px; 
    }
    button { 
        background: #3c328f; 
        color: #fff; 
        border: none; 
        border-radius: 8px; 
        padding: 10px 26px; 
        font-size: 18px; 
        cursor: pointer;
    }
    button:hover { 
        background: #5743c6; 
    }
    .alumno { 
        margin:8px 0 18px 0; 
        font-size: 1.12em;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Asignar nota</h2>
    <div class="alumno"><b>Alumno:</b> <?= htmlspecialchars($entrega['nombre']) . " " . htmlspecialchars($entrega['apellido']) ?></div>
    <div class="alumno"><b>Tarea:</b> <?= htmlspecialchars($entrega['titulo']) ?></div>
    <form method="post" action="profesor_calificar.php">
      <input type="hidden" name="id_entrega" value="<?= $id_entrega ?>">
      <input type="hidden" name="volver" value="<?= htmlspecialchars($volver) ?>">
      <label for="nota">Nota (máxima <?= htmlspecialchars($entrega['nota_maxima']) ?>):</label>
      <input type="number" name="nota" id="nota" step="0.01" min="0" max="<?= htmlspecialchars($entrega['nota_maxima']) ?>" required value="<?= htmlspecialchars($entrega['nota']) ?>">
      <button type="submit">Guardar nota</button>
    </form>
    <a href="<?= $volver ? htmlspecialchars($volver) : "profesor_ver_entregas.php" ?>" style="color:#3c328f;display:block;margin-top:20px;">&larr; Volver</a>
  </div>
</body>
</html>
