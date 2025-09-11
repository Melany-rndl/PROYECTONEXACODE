<?php
session_start(); // Inicia la sesión para poder usar las variables de sesión

// Datos de conexión a la base de datos
$direccion="localhost";
$usuario="root";
$contrasena="";
$dbname="p25"; 

// Crear conexión con MySQL
$conn = new mysqli($direccion, $usuario, $contrasena, $dbname);

// Verificar si hubo error al conectar
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
// Verificar que el usuario sea administrador antes de entrar aquí
if (!isset($_SESSION['rol']) || $_SESSION['rol'] != 'admin') {
    header("Location: login.php"); // Si no es admin, lo mandamos al login
    exit;
}
// Consulta SQL para traer todos los usuarios y su información personal (si existe)
$sql = "SELECT c.id_cuenta, c.usuario, c.rol,
               i.nombre, i.apellido, i.direccion, i.fecha_nac, i.telefono, i.ci
        FROM cuenta c
        LEFT JOIN informacion i ON c.id_cuenta = i.cuenta_id_cuenta";
// LEFT JOIN: se trae la info aunque no tenga datos en "informacion"
$result = $conn->query($sql); // Ejecutar la consulta y guardar el resultado
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de Administrador</title>
    <style>
        /* Estilos básicos de la página y la tabla */
        body { font-family: Arial, sans-serif; background: #f4f4f9; }
        h1 { text-align: center; color: #333; }
        table { width: 95%; margin: 20px auto; border-collapse: collapse; background: #fff; }
        th, td { padding: 10px; border: 1px solid #ddd; text-align: center; }
        th { background: #333; color: #fff; }
        a.btn { padding: 6px 10px; border-radius: 4px; text-decoration: none; color: #fff; }
        a.profesor { background: #007bff; }  /* Botón azul */
        a.estudiante { background: #28a745; } /* Botón verde */
    </style>
</head>
<body>
    <h1>Panel de Administrador</h1>
    <table>
        <tr>
            <!-- Encabezados de la tabla -->
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
            <!-- Si hay resultados en la consulta -->
            <?php while($row = $result->fetch_assoc()): ?> 
                <!-- Recorremos cada fila -->
                <tr>
                    <!-- Mostramos los datos del usuario -->
                    <td><?= htmlspecialchars($row['usuario']) ?></td>
                    <td><?= htmlspecialchars($row['nombre']) ?></td>
                    <td><?= htmlspecialchars($row['apellido']) ?></td>
                    <td><?= htmlspecialchars($row['direccion']) ?></td>
                    <td><?= htmlspecialchars($row['fecha_nac']) ?></td>
                    <td><?= htmlspecialchars($row['telefono']) ?></td>
                    <td><?= htmlspecialchars($row['ci']) ?></td>
                    <td><?= htmlspecialchars($row['rol']) ?></td>
                    <td>
                        <!-- Si es estudiante, mostramos botón para hacerlo profesor -->
                        <?php if ($row['rol'] == 'estudiante'): ?>
                            <a class="btn profesor" href="cambiarRol.php?id=<?= $row['id_cuenta'] ?>&rol=profesor">Hacer Profesor</a>
                        <!-- Si es profesor, mostramos botón para hacerlo estudiante -->
                        <?php elseif ($row['rol'] == 'profesor'): ?>
                            <a class="btn estudiante" href="cambiarRol.php?id=<?= $row['id_cuenta'] ?>&rol=estudiante">Hacer Estudiante</a>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <!-- Si no hay usuarios registrados -->
            <tr><td colspan="9">No hay usuarios registrados</td></tr>
        <?php endif; ?>
    </table>
</body>
</html>
