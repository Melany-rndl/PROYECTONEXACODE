<?php
include 'conexion.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $sql = "UPDATE cuenta SET bloqueado = 1 WHERE id_cuenta = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: usuarios.php");
        exit();
    } else {
        echo "Error al bloquear: " . $conexion->error;
    }
}
?>
