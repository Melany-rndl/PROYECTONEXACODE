<?php
session_start();
if (!isset($_SESSION['id_cuenta'])) {
    header(header: "Location: Logueo.php");
    exit();
}
$conexion = mysqli_connect(hostname: "localhost", username: "root", password: "", database: "p25");
if (!$conexion) {
    die("Error al conectar a la base de datos: " . mysqli_connect_error());
}
$id_cuenta = $_SESSION['id_cuenta'];
$sql = "SELECT * FROM informacion WHERE cuenta_id_cuenta='$id_cuenta'";
$resultado = mysqli_query(mysql: $conexion, query: $sql);
if($resultado->num_rows > 0){
    $fila = $resultado->fetch_assoc();
    $nombre = $fila['nombre'];
    $apellido = $fila['apellido'];
    $direccion = $fila['direccion'];
    $fecha_nac = $fila['fecha_nac'];
    $telefono = $fila['telefono'];
    $ci = $fila['ci'];
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
    <link rel="stylesheet" href="Diseño-Login.css">
</head>
<body>
<div class="Inicio-Sesion">
    <form action="Editar.php" method="post">
        <h1>EDITAR</h1>

        <label for="">Nombre</label>
        <input type="text" name="nombre" value="<?=$nombre?>" required><br><br>

        <label for="">Apellido</label>
        <input type="text" name="apellido" value="<?=$apellido?>" required><br><br>

        <label for="">Dirección</label>
        <input type="text" name="direccion" value="<?=$direccion?>" required><br><br>

        <label for="">Fecha de Nacimiento</label>
        <input type="date" name="fecha_nac" value="<?=$fecha_nac?>" required><br><br>

        <label for="">Teléfono</label>
        <input type="text" name="telefono" value="<?=$telefono?>" required><br><br>

        <label for="">Carnet de Identidad (CI)</label>
        <input type="text" name="ci" value="<?=$ci?>" required><br><br>

        <input type="submit" name="editar" value="Guardar cambios">
    </form>
</div>
</body>
</html>