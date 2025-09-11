<?php
$direccion="localhost";
$usuario="root";
$contrasena="";
$dbname="p25"; 
$conn = new mysqli($direccion, $usuario, $contrasena, $dbname);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$ci = $_GET['ci'];

$sql = "UPDATE cuenta c
        INNER JOIN informacion i ON c.id_cuenta = i.cuenta_id_cuenta
        SET c.bloqueado = 1
        WHERE i.ci = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $ci);
$stmt->execute();

header("Location: admin.php");
exit;
