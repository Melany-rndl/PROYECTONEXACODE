<?php
include("conexion.php");

$ci = $_GET['ci'];

$sql = "UPDATE cuenta SET bloqueado = 1 WHERE id_cuenta = (SELECT cuenta_id_cuenta FROM informacion WHERE ci='$ci' LIMIT 1) AND rol != 'admin'";

if (mysqli_query($conn, $sql)) {
    if (mysqli_affected_rows($conn) > 0) {
        header("Location: admin.php");
    } else {
        echo "No se pudo bloquear al usuario. Verifique que el CI es correcto y que no es un administrador. <a href='admin.php'>Volver</a>";
    }
} else {
    echo "Error al ejecutar la consulta: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
