<?php
$direccion="localhost";
$usuario="root";
$contrasena="";
$dbname="p25"; 
$conn = new mysqli($direccion, $usuario, $contrasena, $dbname);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$id_cuenta = $_GET['id'];
$rol = $_GET['rol'];

// Actualizar rol
$sql = "UPDATE cuenta SET rol='$rol' WHERE id_cuenta='$id_cuenta'";
if ($conn->query($sql)) {
    header("Location: admin.php");
} else {
    echo "Error: " . $conn->error;
}
