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
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$direccion = $_POST['direccion'];
$fecha_nac = $_POST['fecha_nac'];
$telefono = $_POST['telefono'];
$ci = $_POST['ci'];

$sql = "UPDATE informacion SET 
            nombre='$nombre', 
            apellido='$apellido', 
            direccion='$direccion',
            fecha_nac='$fecha_nac',
            telefono='$telefono',
            ci='$ci'
        WHERE cuenta_id_cuenta='$id_cuenta'";

if ($conexion->query(query: $sql) === TRUE) {
    header(header: "Location: Cuenta.php");
    exit();
} else {
    echo "Error al actualizar los datos: " . $conexion->error;
}
?>