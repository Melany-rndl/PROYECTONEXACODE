<?php
session_start();
include("conexion.php");

if (!isset($_SESSION['id_cuenta'])) {
    header("Location: Logueo.php");
    exit();
}

$id_estudiante = $_SESSION['id_cuenta'];

$sql = "SELECT rol FROM cuenta WHERE id_cuenta='$id_estudiante'";
$res = $conn->query($sql);
$rol = $res->fetch_assoc()['rol'];
if ($rol != 'estudiante') {
    die("Acceso denegado");
}
$id_entrega = isset($_GET['id_entrega']) ? intval($_GET['id_entrega']) : 0;
$id_tarea = isset($_GET['id_tarea']) ? intval($_GET['id_tarea']) : 0;

$datos = null;
$entrega = null;

if ($id_entrega > 0) {
    $sql = " SELECT t.id_tarea, t.titulo, t.descripcion, t.tema, t.nota AS nota_maxima,
            c.nombre AS clase, c.id_clase AS clase_id_clase, e.fecha_entrega, e.nota, e.tarea_id_tarea
        FROM entrega e
        JOIN tarea t ON e.tarea_id_tarea = t.id_tarea
        JOIN clase c ON t.id_clase = c.id_clase
        WHERE e.id_entrega=? AND e.cuenta_id_cuenta=?
    ";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $id_entrega, $id_estudiante);
    $stmt->execute();
    $result = $stmt->get_result();
    $datos = $result->fetch_assoc();
    $entrega = $datos;
} elseif ($id_tarea > 0) {
    $sqlT = "SELECT t.id_tarea, t.titulo, t.descripcion, t.tema, t.nota AS nota_maxima, c.nombre AS clase, c.id_clase AS id_clase
             FROM tarea t
             JOIN clase c ON t.id_clase = c.id_clase
             WHERE t.id_tarea=?";
    $stmt = $conn->prepare($sqlT);
    $stmt->bind_param("i", $id_tarea);
    $stmt->execute();
    $result = $stmt->get_result();
    $datos = $result->fetch_assoc();

    $sqlE = "SELECT id_entrega, fecha_entrega, nota FROM entrega WHERE tarea_id_tarea=? AND cuenta_id_cuenta=?";
    $stmtE = $conn->prepare($sqlE);
    $stmtE->bind_param("ii", $id_tarea, $id_estudiante);
    $stmtE->execute();
    $resultE = $stmtE->get_result();
    $entrega = $resultE->fetch_assoc();
}

$archivoEncontrado = null;
if ($datos) {
    $nombreBase = "Entrega-$id_estudiante-" . $datos['id_tarea'];
    $directorio = "./media/";
    $extensiones = ["pdf", "jpg", "jpeg", "png", "gif", "webp", "docx", "xlsx", "txt", "zip"];
    foreach ($extensiones as $ext) {
        $ruta = $directorio . $nombreBase . "." . $ext;
        if (file_exists($ruta)) {
            $archivoEncontrado = $ruta;
            break;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalle de entrega</title>
    <style>
    body { font-family: Arial; background: #f6f6f6; margin:0; }
    .container { max-width: 600px; margin: 45px auto; background: #fff; border-radius: 14px; box-shadow: 0 2px 12px #0002; padding: 35px 30px 28px 30px; }
    h2 { margin-top:0; color:#3a3a48; }
    .info-box { margin-bottom: 20px; }
    .label { color:#3c328f; font-weight: bold; margin-right: 6px; }
    .nota-box { font-size: 24px; margin: 20px 0; color: #3c328f; }
    </style>
</head>
<body>
<div class="container">
<?php if ($datos): ?>
    <div class="info-box"><span class="label">Clase:</span> <?= htmlspecialchars($datos['clase']) ?></div>
    <div class="info-box"><span class="label">Tema:</span> <?= htmlspecialchars($datos['tema']) ?></div>
    <div class="info-box"><span class="label">Descripción:</span> <?= htmlspecialchars($datos['descripcion']) ?></div>
    <div class="info-box"><span class="label">Nota máxima:</span> <?= htmlspecialchars($datos['nota_maxima']) ?></div>
    <div class="info-box"><span class="label">Fecha de entrega:</span>
        <?= ($entrega && $entrega['fecha_entrega']) ? htmlspecialchars($entrega['fecha_entrega']) : 'No entregada' ?>
    </div>
    <div class="info-box">
        <span class="label">Archivo entregado:</span>
        <?php if ($archivoEncontrado): 
            $extension = strtolower(pathinfo($archivoEncontrado, PATHINFO_EXTENSION));
            if (in_array($extension, ["jpg", "jpeg", "png", "gif", "webp"])) {
                echo "<img src='$archivoEncontrado' alt='Archivo' width='200'>";
            } elseif ($extension == "pdf") {
                echo "<embed src='$archivoEncontrado' type='application/pdf' width='400' height='250'>";
            } else {
                echo "<a href='$archivoEncontrado' download>Descargar archivo</a>";
            }
        else: ?>
            No hay archivo adjunto
        <?php endif; ?>
    </div>
    <div class="nota-box">
        <span class="label">Nota:</span>
        <?= ($entrega && !is_null($entrega['nota'])) ? htmlspecialchars($entrega['nota']) : "" ?>
    </div>
<?php else: ?>
    <div class="info-box" style="color:#b00;">No se encontró información de la tarea.</div>
<?php endif; ?>
    <a href="Pagina-Principal.php?id=<?= urlencode($datos['clase_id_clase'] ?? '') ?>" style="color:#3c328f;">&larr; Volver a mis cursos.</a>
</div>
</body>
</html>
