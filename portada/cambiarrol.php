<?php
include 'conexion.php';

if (isset($_GET['id']) && isset($_GET['rol'])) {
    $id = intval($_GET['id']);
    $rol = $_GET['rol'];

    $nuevoRol = ($rol == "profesor") ? "estudiante" : "profesor";

    $sql = "UPDATE cuenta SET rol = ? WHERE id_cuenta = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("si", $nuevoRol, $id);

    if ($stmt->execute()) {
        header("Location: usuarios.php");
        exit();
    } else {
        echo "Error al cambiar rol: " . $conexion->error;
    }
}
?>

