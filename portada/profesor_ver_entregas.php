<?php
session_start();
include("conexion.php");

if (!isset($_SESSION['id_cuenta'])) {
    header("Location: Logueo.php");
    exit();
}

$id_profesor = $_SESSION['id_cuenta'];


$sql = "SELECT rol FROM cuenta WHERE id_cuenta='$id_profesor'";
$res = $conn->query($sql);
$rol = $res->fetch_assoc()['rol'];
if ($rol != 'profesor') {
    die("Acceso denegado");
}

$sql = "SELECT e.id_entrega, e.nota, e.fecha_entrega,
               t.titulo, c.nombre AS clase,
               i.nombre, i.apellido
        FROM entrega e
        JOIN tarea t ON e.tarea_id_tarea = t.id_tarea
        JOIN clase c ON t.clase_id_clase = c.id_clase
        JOIN informacion i ON e.cuenta_id_cuenta = i.cuenta_id_cuenta
        WHERE c.id_profesor = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_profesor);
$stmt->execute();
$result = $stmt->get_result();
?>

<h1>Entregas de mis estudiantes</h1>
<table border="1" cellpadding="5">
<tr>
    <th>Clase</th>
    <th>Tarea</th>
    <th>Estudiante</th>
    <th>Nota</th>
    <th>Fecha Entrega</th>
    <th>Calificar</th>
</tr>
<?php while($row = $result->fetch_assoc()): ?>
<tr>
    <td><?= $row['clase'] ?></td>
    <td><?= $row['titulo'] ?></td>
    <td><?= $row['nombre'] . " " . $row['apellido'] ?></td>
    <td><?= $row['nota'] ?? "Sin nota" ?></td>
    <td><?= $row['fecha_entrega'] ?? "No entregada" ?></td>
    <td>
        <form action="profesor_calificar.php" method="post">
            <input type="hidden" name="id_entrega" value="<?= $row['id_entrega'] ?>">
            <input type="number" name="nota" step="0.01" min="0" max="100" required>
            <button type="submit">Guardar</button>
        </form>
    </td>
</tr>
<?php endwhile; ?>
</table>
