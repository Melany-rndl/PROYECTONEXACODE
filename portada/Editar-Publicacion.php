<?php
session_start();
if (!isset($_SESSION['id_cuenta'])) { header(header: "Location: Logueo.php"); exit(); }
$conexion = mysqli_connect(hostname: "localhost", username: "root", password: "", database: "p25");
if (!$conexion) die("Error de conexión");

date_default_timezone_set(timezoneId: 'America/La_Paz');

$id_cuenta = $_SESSION['id_cuenta'];

$id_publicacion = isset($_GET['id']) ? intval(value: $_GET['id']) : 0;

$res_pub = mysqli_query(mysql: $conexion, query: "SELECT * FROM publicacion WHERE id_publicacion='$id_publicacion' LIMIT 1");
$pub = mysqli_fetch_assoc(result: $res_pub);
if (!$pub || $pub['cuenta_id_cuenta'] != $id_cuenta) {
    echo "<p>No tienes permiso para editar esta publicación.</p>";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['contenido'])) {
    $nuevo_contenido = trim(string: $_POST['contenido']);
    if ($nuevo_contenido !== "") {
        $nuevo_contenido = mysqli_real_escape_string(mysql: $conexion, string: $nuevo_contenido);
        $fecha_edicion = date(format: 'Y-m-d H:i:s');
        mysqli_query(mysql: $conexion, query: "UPDATE publicacion SET contenido='$nuevo_contenido', fecha_edicion='$fecha_edicion' WHERE id_publicacion='$id_publicacion'");
        header(header: "Location: Clase-Formulario.php?id=" . intval(value: $pub['clase_id_clase']));
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar publicación</title>
    <link rel="stylesheet" href="Tareas.css">
    <style>
    .form-editar-publicacion {
        max-width: 500px;
        margin: 40px auto;
        background: #fff;
        padding: 24px;
        border-radius: 10px;
        box-shadow: 0 2px 10px #ddd;
        font-family: Arial, sans-serif;
    }
    .form-editar-publicacion textarea {
        width: 100%;
        padding: 12px;
        min-height: 120px;
        border-radius: 8px;
        border: 1px solid #bbb;
        margin-bottom: 16px;
        font-size: 16px;
        font-family: Arial;
    }
    .form-editar-publicacion button {
        background: var(--azul);
        color: #fff;
        padding: 10px 24px;
        border: none;
        border-radius: 8px;
        font-size: 16px;
        cursor: pointer;
    }
    </style>
</head>
<body>
    <form class="form-editar-publicacion" method="post">
        <h2>Editar comentario</h2>
        <textarea name="contenido" required><?= htmlspecialchars(string: $pub['contenido']) ?></textarea>
        <br>
        <button type="submit">Guardar cambios</button>
    </form>
</body>
</html>