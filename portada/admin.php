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

// Verificar que el usuario sea administrador
if (!isset($_SESSION['rol']) || $_SESSION['rol'] != 'admin') {
    header("Location: Logueo.php"); 
    exit;
}

// Traer todos los usuarios con su información
$sql = "SELECT c.id_cuenta, c.usuario, c.rol, c.bloqueado,
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
        body { 
            font-family: Arial, sans-serif; 
            background: #f4f4f9; 
        }
        h1 {
             text-align: center; 
             color: #333;
        }
        table { 
            width: 95%; 
            margin: 20px auto; 
            border-collapse: collapse; 
            background: #fff; 
        }
        th, td { 
            padding: 10px; 
            border: 1px solid #ddd; 
            text-align: center; 
        }
        th { 
            background: #333; 
            color: #fff;
        }
        a.btn {
             padding: 6px 10px; 
             border-radius: 4px; 
             text-decoration: none; 
             color: #fff; 
        }
        a.profesor { 
            background: #007bff; 
        }
        a.estudiante { 
            background: #28a745; 
        }
        a.bloquear { 
            background: #dc3545; 
        }
        a.desbloquear { 
            background: #67b2f3ff; 
        }
        /* Estilo para el botón de Página Principal */
        a.pagina-principal {
            display: inline-block;
            padding: 10px 20px;
            background-color: #555;
            color: white;
            border-radius: 5px;
            text-decoration: none;
            margin: 20px auto;
        }
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
            <th>Bloqueado</th>
            <th>Acciones</th>
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
                    <td><?= $row['bloqueado'] ? "Sí" : "No" ?></td>
                    <td>
                        <?php if ($row['rol'] != 'admin'): ?>
                            <?php if ($row['rol'] == 'estudiante'): ?>
                                <a class="btn profesor" href="cambiarrol.php?ci=<?= urlencode($row['ci']) ?>&rol=profesor">Hacer Profesor</a>
                            <?php elseif ($row['rol'] == 'profesor'): ?>
                                <a class="btn estudiante" href="cambiarrol.php?ci=<?= urlencode($row['ci']) ?>&rol=estudiante">Hacer Estudiante</a>
                            <?php endif; ?>
                            <?php if ($row['bloqueado'] == 0): ?>
                                <a class="btn bloquear" href="bloquear.php?ci=<?= urlencode($row['ci']) ?>">Bloquear</a>
                            <?php else: ?>
                                <a class="btn desbloquear" href="desbloquear.php?ci=<?= urlencode($row['ci']) ?>">Desbloquear</a>
                            <?php endif; ?>
                        <?php else: ?>
                            <em>Protegido</em>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr><td colspan="10">No hay usuarios registrados</td></tr>
        <?php endif; ?>
    </table>

    <!-- Botón simple para ir a Página Principal -->
    <div style="text-align: center;">
        <a class="pagina-principal" href="Pagina-Principal.php">Volver a Página Principal</a>
    </div>
</body>
</html>


