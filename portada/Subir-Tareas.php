<?php
session_start();
if (!isset($_SESSION['id_cuenta'])) { header("Location: Logueo.php"); exit(); }
$conexion = mysqli_connect("localhost", "root", "", "p25");
if (!$conexion) die("Error de conexión");

$id_usuario = $_SESSION['id_cuenta'];
$id_tarea = isset($_GET['id_tarea']) ? intval($_GET['id_tarea']) : 0;
$id_clase = isset($_GET['id_clase']) ? intval($_GET['id_clase']) : 0;

$res = mysqli_query($conexion, "SELECT * FROM entrega WHERE tarea_id_tarea='$id_tarea' AND cuenta_id_cuenta='$id_usuario'");
$ya_entrego = mysqli_fetch_assoc($res);

$nombreBase = "Entrega-$id_usuario-$id_tarea";
$target_dir = "./media/";
$extensiones = ["pdf", "jpg", "jpeg", "png", "gif", "webp", "docx", "xlsx", "txt", "zip"];
$archivoEncontrado = null;

foreach ($extensiones as $ext) {
    $ruta = $target_dir . $nombreBase . "." . $ext;
    if (file_exists($ruta)) {
        $archivoEncontrado = $ruta;
        break;
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && !$archivoEncontrado) {
    $fileOk = true;
    $mensaje = "";

    if (isset($_FILES["fileUpload"]) && $_FILES["fileUpload"]["error"] == 0) {
        $imageFileType = strtolower(pathinfo($_FILES["fileUpload"]["name"], PATHINFO_EXTENSION));
        if (!in_array($imageFileType, $extensiones)) {
            $mensaje = "Tipo de archivo no permitido.";
            $fileOk = false;
        }
        if ($_FILES["fileUpload"]["size"] > 5 * 1024 * 1024) {
            $mensaje = "El archivo es demasiado grande (máx. 5MB).";
            $fileOk = false;
        }
        $newFileName = $nombreBase . ".$imageFileType";
        $target_file = $target_dir . $newFileName;
        if (file_exists($target_file)) {
            $mensaje = "Ya existe un archivo con ese nombre.";
            $fileOk = false;
        }
        if ($fileOk) {
            if (!is_dir($target_dir)) mkdir($target_dir, 0755, true);
            if (move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $target_file)) {
                if (!$ya_entrego) {
                    mysqli_query($conexion, "INSERT INTO entrega (tarea_id_tarea, cuenta_id_cuenta, fecha_entrega) VALUES ('$id_tarea', '$id_usuario', NOW())");
                } else {
                    mysqli_query($conexion, "UPDATE entrega SET fecha_entrega=NOW() WHERE id_entrega='{$ya_entrego['id_entrega']}'");
                }
                $res2 = mysqli_query($conexion, "SELECT id_entrega FROM entrega WHERE tarea_id_tarea='$id_tarea' AND cuenta_id_cuenta='$id_usuario'");
                $row2 = mysqli_fetch_assoc($res2);
                $id_entrega = $row2 ? $row2['id_entrega'] : 0;
                header("Location: estudiante_mis_notas.php?id_entrega=$id_entrega");
                exit;
            } else {
                $mensaje = "No se pudo subir el archivo.";
            }
        }
    } else {
        $mensaje = "No seleccionaste archivo o hubo un error.";
    }
    echo "<div style='text-align:center;color:#3c328f;padding:20px;'><b>$mensaje</b></div>";
    echo "<div style='text-align:center;'><a href='tareas-formulario.php?id=$id_clase'>Volver a tareas</a></div>";
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Subir mi entrega</title>
<style>
    * { box-sizing: border-box; margin:0; padding:0; }

    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: linear-gradient(120deg, #f0f4ff, #e6e6ff);
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 20px;
    }

    .container {
        width: 100%;
        max-width: 800px;
        background: #fff;
        border-radius: 16px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        padding: 50px 40px;
        text-align: center;
    }

    h2 {
        font-size: 2.2rem;
        color: #3c328f;
        margin-bottom: 40px;
        font-weight: 600;
    }

    label {
        display: block;
        margin-bottom: 10px;
        font-size: 1.1rem;
        color: #555;
    }

    input[type=file] {
        font-size: 1rem;
        padding: 15px;
        border-radius: 10px;
        border: 1px solid #ccc;
        width: 100%;
        margin-bottom: 30px;
        transition: border 0.2s;
    }

    input[type=file]:focus {
        border-color: #3c328f;
        outline: none;
    }

    button {
        background: #3c328f;
        color: #fff;
        border: none;
        border-radius: 12px;
        padding: 15px 40px;
        font-size: 1.2rem;
        cursor: pointer;
        transition: background 0.3s, transform 0.2s;
    }

    button:hover {
        background: #5743c6;
        transform: translateY(-2px);
    }

    .archivo-msg {
        color: #3c328f;
        margin-bottom: 30px;
        font-size: 1rem;
        line-height: 1.5;
        text-align: center;
    }

    .archivo-msg img, .archivo-msg embed {
        margin-top: 15px;
        border-radius: 12px;
        max-width: 100%;
        height: auto;
        box-shadow: 0 5px 20px rgba(0,0,0,0.15);
    }

    a {
        text-decoration: none;
        color: #3c328f;
        font-weight: 500;
        transition: color 0.2s;
    }

    a:hover {
        color: #5743c6;
        text-decoration: underline;
    }

    @media(max-width: 650px){
        .container {
            padding: 35px 20px;
        }
        h2 { font-size: 1.8rem; }
        button { width: 100%; padding: 15px; }
    }
</style>
</head>
<body>
<div class="container">
    <h2>Subir mi entrega</h2>

    <?php if ($archivoEncontrado): ?>
        <div class="archivo-msg">
            Ya subiste un archivo para esta tarea. No puedes subir otro ni eliminarlo.<br>
            <b>Archivo entregado:</b><br>
            <?php
            $extension = strtolower(pathinfo($archivoEncontrado, PATHINFO_EXTENSION));
            if (in_array($extension, ["jpg", "jpeg", "png", "gif", "webp"])) {
                echo "<img src='$archivoEncontrado' alt='Archivo'>";
            } elseif ($extension == "pdf") {
                echo "<embed src='$archivoEncontrado' type='application/pdf' width='100%' height='400px'>";
            } else {
                echo "<a href='$archivoEncontrado' download>Descargar archivo</a>";
            }
            ?>
        </div>
        <a href="tareas-formulario.php?id=<?= urlencode($id_clase) ?>">&larr; Volver a tareas</a>
    <?php else: ?>
        <form method="post" enctype="multipart/form-data">
            <label for="fileUpload">Selecciona tu archivo (PDF, imagen, docx, etc, máx. 5MB):</label>
            <input type="file" name="fileUpload" id="fileUpload" required>
            <button type="submit">Subir entrega</button>
        </form>
        <br>
        <a href="tareas-formulario.php?id=<?= urlencode($id_clase) ?>">&larr; Volver a tareas</a>
    <?php endif; ?>
</div>
</body>
</html>
