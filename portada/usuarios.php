<?php
include 'conexion.php';

// Traemos cuentas junto con su información personal
$sql = "SELECT c.id_cuenta, c.usuario, c.rol, c.bloqueado, i.ci, i.nombre, i.apellido
        FROM cuenta c
        LEFT JOIN informacion i ON c.id_cuenta = i.cuenta_id_cuenta";
$resultado = $conexion->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Usuarios</title>
</head>
<body>
    <h2>Usuarios registrados</h2>
    <table border="1">
        <tr>
            <th>CI</th>
            <th>Nombre</th>
            <th>Usuario</th>
            <th>Rol</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
        <?php while ($fila = $resultado->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $fila['ci']; ?></td>
            <td><?php echo $fila['nombre'] . " " . $fila['apellido']; ?></td>
            <td><?php echo $fila['usuario']; ?></td>
            <td><?php echo $fila['rol']; ?></td>
            <td><?php echo $fila['bloqueado'] ? "Bloqueado" : "Activo"; ?></td>
            <td>
                <?php if ($fila['bloqueado']) { ?>
                    <a href="desbloquear.php?id=<?php echo $fila['id_cuenta']; ?>">Desbloquear</a>
                <?php } else { ?>
                    <a href="bloquear.php?id=<?php echo $fila['id_cuenta']; ?>">Bloquear</a>
                <?php } ?>
                |
                <a href="cambiarRol.php?id=<?php echo $fila['id_cuenta']; ?>&rol=<?php echo $fila['rol']; ?>">
                    Cambiar Rol
                </a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
