<?php
include("conexion.php");

$ci = $_GET['ci'];

$sql = "UPDATE cuenta 
        SET bloqueado = 0 
        WHERE id_cuenta = (
            SELECT id_cuenta FROM informacion WHERE ci='$ci' LIMIT 1
        )
        AND rol != 'admin'";

if (mysqli_query($conn, $sql)) {
    header("Location: admin.php");
} else {
    echo "Error: " . mysqli_error($conn);
}
?>
