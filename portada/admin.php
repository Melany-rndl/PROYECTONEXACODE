<?php
session_start();
$direccion="localhost";
$usuario="root";
$contrasena="";
$dbname="p25"; 

$conn = new mysqli($direccion, $usuario, $contrasena, $dbname);
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
if (!isset($_SESSION['rol']) || $_SESSION['rol'] != 'admin') {
    header("Location: login.php"); 
    exit;
}
// Traer todos los usuarios con su información
$sql = "SELECT c.id_cuenta, c.usuario, c.rol,
               i.nombre, i.apellido, i.direccion, i.fecha_nac, i.telefono, i.ci
        FROM cuenta c
        LEFT JOIN informacion i ON c.id_cuenta = i.cuenta_id_cuenta";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de Administrador</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f4f9; }
        h1 { text-align: center; color: #333; }
        table { width: 95%; margin: 20px auto; border-collapse: collapse; background: #fff; }
        th, td { padding: 10px; border: 1px solid #ddd; text-align: center; }
        th { background: #333; color: #fff; }
        a.btn { padding: 6px 10px; border-radius: 4px; text-decoration: none; color: #fff; }
        a.profesor { background: #007bff; }
        a.estudiante { background: #28a745; }
    </style>
</head>
<body>
    <h1>Panel de Administrador</h1>
    <table>
        <tr>
            <th>Usuario</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Dirección</th>
            <th>Fecha Nac.</th>
            <th>Teléfono</th>
            <th>CI</th>
            <th>Rol</th>
            <th>Acción</th>
        </tr>
        <?php if ($result->num_rows > 0): ?>
            <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= htmlspecialchars($row['usuario']) ?></td>
                    <td><?= htmlspecialchars($row['nombre']) ?></td>
                    <td><?= htmlspecialchars($row['apellido']) ?></td>
                    <td><?= htmlspecialchars($row['direccion']) ?></td>
                    <td><?= htmlspecialchars($row['fecha_nac']) ?></td>
                    <td><?= htmlspecialchars($row['telefono']) ?></td>
                    <td><?= htmlspecialchars($row['ci']) ?></td>
                    <td><?= htmlspecialchars($row['rol']) ?></td>
                    <td>
                        <?php if ($row['rol'] == 'estudiante'): ?>
                            <a class="btn profesor" href="cambiarRol.php?id=<?= $row['id_cuenta'] ?>&rol=profesor">Hacer Profesor</a>
                        <?php elseif ($row['rol'] == 'profesor'): ?>
                            <a class="btn estudiante" href="cambiarRol.php?id=<?= $row['id_cuenta'] ?>&rol=estudiante">Hacer Estudiante</a>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr><td colspan="9">No hay usuarios registrados</td></tr>
        <?php endif; ?>
    </table>
</body>
</html>
