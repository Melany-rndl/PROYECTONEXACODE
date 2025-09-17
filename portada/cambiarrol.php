<?php
include("conexion.php");

$ci = $_GET['ci'];
$rol = $_GET['rol'];

// Evitamos que el admin sea modificado
$sql = "UPDATE cuenta SET rol = '$rol' WHERE id_cuenta = (SELECT id_cuenta FROM informacion WHERE ci='$ci' LIMIT 1 )AND rol != 'admin'";

if (mysqli_query($conn, $sql)) {
    header("Location: admin.php");
} else {
    echo "Error: " . mysqli_error($conn);
}
?>
