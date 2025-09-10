<?php

$conexion = mysqli_connect("localhost", "root", "", "p25");
if (!$conexion) die("Error de conexión");

$id_usuario = isset($_SESSION['id_cuenta']) ? $_SESSION['id_cuenta'] : null;
$id_tarea = isset($_GET['id_tarea']) ? intval($_GET['id_tarea']) : 0;
$id_clase = isset($_GET['id_clase']) ? intval($_GET['id_clase']) : 0;

if (!$id_usuario || $id_tarea <= 0 || $id_clase <= 0) {
    echo "Parámetros no válidos.";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_tarea = isset($_POST['id_tarea']) ? intval($_POST['id_tarea']) : 0;
    $id_clase = isset($_POST['id_clase']) ? intval($_POST['id_clase']) : 0;
    $descripcion_entrega = trim($_POST['descripcion_entrega'] ?? '');

    $nombre_archivo = "";
    if (!empty($_FILES['archivo']['name'])) {
        if (!is_dir('uploads')) {
            mkdir('uploads', 0755, true);
        }
        $nombre_archivo = time() . "_" . basename($_FILES["archivo"]["name"]);
        $ruta_destino = "uploads/" . $nombre_archivo;
        if (move_uploaded_file($_FILES["archivo"]["tmp_name"], $ruta_destino)) {
            // Archivo subido correctamente
        } else {
            echo "No se pudo subir el archivo.<br>";
            $nombre_archivo = "";
        }
    }

    $sql = "INSERT INTO entrega (cuenta_id_cuenta, tarea_id_tarea, fecha_entrega, nota, archivo, descripcion)
            VALUES ('$id_usuario', '$id_tarea', NOW(), NULL, '$nombre_archivo', '$descripcion_entrega')";
    mysqli_query($conexion, $sql);

    header("Location: Tareas-Formulario.php?id_clase=".$id_clase);
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Subir Entrega de Tarea</title>
</head>
<body>
<h2>Subir Entrega de Tarea</h2>
<form method="post" enctype="multipart/form-data">
    <input type="hidden" name="id_tarea" value="<?= htmlspecialchars($id_tarea) ?>">
    <input type="hidden" name="id_clase" value="<?= htmlspecialchars($id_clase) ?>">

    <label>Descripción de la entrega:</label><br>
    <textarea name="descripcion_entrega"></textarea><br><br>

    <label>Archivo de la entrega:</label><br>
    <input type="file" name="archivo"><br><br>

    <button type="submit">Guardar entrega</button>
</form>

<hr>
<h3>Entregas Anteriores</h3>
<?php
$sql = "SELECT * FROM entrega WHERE cuenta_id_cuenta='$id_usuario' AND tarea_id_tarea='$id_tarea' ORDER BY fecha_entrega DESC";
$res = mysqli_query($conexion, $sql);

while ($row = mysqli_fetch_assoc($res)) {
    echo "<div style='border:1px solid #ccc; margin-bottom:10px; padding:10px'>";
    echo "<b>Fecha de entrega:</b> " . htmlspecialchars($row['fecha_entrega']) . "<br>";
    echo "<b>Descripción:</b> " . htmlspecialchars($row['descripcion']) . "<br>";

    $nombreArchivo = $row['archivo'];
    $directorio = "uploads/";
    $extensiones = ["pdf", "jpg", "jpeg", "png", "gif", "webp", "docx", "xlsx", "txt", "zip"];
    $archivoEncontrado = null;
    if (!empty($nombreArchivo)) {
        foreach ($extensiones as $ext) {
            $ruta = $directorio . $nombreArchivo;
            if (strtolower(pathinfo($ruta, PATHINFO_EXTENSION)) === $ext && file_exists($ruta)) {
                $archivoEncontrado = $ruta;
                break;
            }
        }
    }

    if ($archivoEncontrado) {
        $extension = strtolower(pathinfo($archivoEncontrado, PATHINFO_EXTENSION));
        if (in_array($extension, ["jpg", "jpeg", "png", "gif", "webp"])) {
            echo "<img src='$archivoEncontrado' alt='Archivo' width='250'><br>";
        } elseif ($extension == "pdf") {
            echo "<embed src='$archivoEncontrado' type='application/pdf' width='400' height='250'><br>";
        } else {
            echo "<a href='$archivoEncontrado' download>📁 Descargar archivo</a><br>";
        }
    } else {
        echo "<i>No hay archivo entregado o el archivo no se encuentra.</i><br>";
    }
    echo "</div>";
}
?>
<p><a href="Tareas-Formulario.php?id_clase=<?= htmlspecialchars($id_clase) ?>">⬅ Volver al listado de tareas</a></p>
</body>
</html>
