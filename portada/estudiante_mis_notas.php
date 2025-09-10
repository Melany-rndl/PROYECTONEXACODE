<?php
session_start();
include("conexion.php");

if (!isset($_SESSION['id_cuenta'])) {
    header("Location: Logueo.php");
    exit();
}

$id_estudiante = $_SESSION['id_cuenta'];

$sql = "SELECT rol FROM cuenta WHERE id_cuenta='$id_estudiante'";
$res = $conn->query($sql);
$rol = $res->fetch_assoc()['rol'];
if ($rol != 'estudiante') {
    die("Acceso denegado");
}

$sql = "SELECT t.titulo, c.nombre AS clase, e.nota, e.fecha_entrega
        FROM entrega e
        JOIN tarea t ON e.tarea_id_tarea = t.id_tarea
        JOIN clase c ON t.clase_id_clase = c.id_clase
        WHERE e.cuenta_id_cuenta=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_estudiante);
$stmt->execute();
$result = $stmt->get_result();
?>

<h1>Mis notas</h1>
<table border="1" cellpadding="5">
<tr>
    <th>Clase</th>
    <th>Tarea</th>
    <th>Nota</th>
    <th>Fecha de Entrega</th>
</tr>
<?php while($row = $result->fetch_assoc()): ?>
<tr>
    <td><?= $row['clase'] ?></td>
    <td><?= $row['titulo'] ?></td>
    <td><?= $row['nota'] ?? "Pendiente" ?></td>
    <td><?= $row['fecha_entrega'] ?? "No entregada" ?></td>
</tr>
<?php endwhile; ?>
</table>
