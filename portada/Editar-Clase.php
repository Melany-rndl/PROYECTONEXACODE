<?php
session_start();
if (!isset($_SESSION['id_cuenta'])) { header(header: "Location: Logueo.php"); exit(); }
$conexion = mysqli_connect(hostname: "localhost", username: "root", password: "", database: "p25");
$id_cuenta = $_SESSION['id_cuenta'];

$id_clase = isset($_GET['id']) ? intval(value: $_GET['id']) : 0;
if ($id_clase <= 0) { echo "Clase no encontrada."; exit(); }


$sql = "SELECT * FROM clase WHERE id_clase='$id_clase' AND id_profesor='$id_cuenta'";
$res = mysqli_query(mysql: $conexion, query: $sql);
$clase = mysqli_fetch_assoc(result: $res);
if (!$clase) { echo "No tienes permisos para editar esta clase."; exit(); }


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['nuevo_nombre'])) {
    $nuevo_nombre = trim(string: $_POST['nuevo_nombre']);
    if ($nuevo_nombre !== "") {
        $nuevo_nombre_db = mysqli_real_escape_string(mysql: $conexion, string: $nuevo_nombre);
        mysqli_query(mysql: $conexion, query: "UPDATE clase SET nombre='$nuevo_nombre_db' WHERE id_clase='$id_clase'");
        header(header: "Location: Pagina-Principal.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Clase</title>
    <style>
        body { font-family: Arial; background:#f6f6f6; }
        .edit-container {
            max-width: 380px;
            margin: 60px auto;
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 2px 12px #0001;
            padding: 35px 30px 28px 30px;
        }
        h2 { margin-top:0; color:#3a3a48; }
        label { color:#333; font-size:16px; }
        input[type="text"] {
            width: 100%;
            font-size: 18px;
            border: 1px solid #bbb;
            border-radius: 7px;
            padding: 8px 11px;
            margin-top: 6px;
            margin-bottom: 18px;
            background: #fafbff;
        }
        .actions { display: flex; gap: 14px; justify-content: flex-end; }
        button, .btn-cancel {
            border-radius: 7px;
            border: none;
            font-size: 16px;
            cursor: pointer;
            padding: 8px 18px;
        }
        button { background: #4267d6; color: #fff; }
        .btn-cancel { background: #f3f3f3; color: #36415b; text-decoration:none; }
    </style>
</head>
<body>
    <div class="edit-container">
        <h2>Editar nombre de la clase</h2>
        <form method="POST">
            <label for="nuevo_nombre">Nuevo nombre:</label>
            <input type="text" name="nuevo_nombre" id="nuevo_nombre" maxlength="50" required value="<?= htmlspecialchars($clase['nombre']) ?>">
            <div class="actions">
                <button type="submit">Guardar</button>
                <a href="Pagina-Principal.php" class="btn-cancel">Cancelar</a>
            </div>
        </form>
    </div>
</body>
</html>