<?php
session_start();
include("conexion.php");

if (!isset($_SESSION['id_cuenta'])) {
    header("Location: Logueo.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_entrega = $_POST['id_entrega'];
    $nota = $_POST['nota'];

    $sql = "UPDATE entrega SET nota=? WHERE id_entrega=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("di", $nota, $id_entrega);
    if ($stmt->execute()) {
        echo "Nota guardada correctamente. <a href='profesor_ver_entregas.php'>Volver</a>";
    } else {
        echo "Error al guardar.";
    }
}
