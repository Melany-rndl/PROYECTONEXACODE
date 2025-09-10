<?php
session_start();

if (!isset($_SESSION['id_cuenta']) || $_SESSION['rol'] !== 'admin') {
    header("Location: ../Logueo.php");
    exit();
}

$conexion = new mysqli("localhost", "root", "", "p25");
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}
$sql = "SELECT c.id_cuenta, c.usuario, c.rol, c.estado,
               i.nombre, i.apellido, i.direccion, i.fecha_nac, i.telefono, i.ci
        FROM cuenta c
        LEFT JOIN informacion i ON c.id_cuenta = i.cuenta_id_cuenta
        ORDER BY c.id_cuenta ASC";
$resultado = $conexion->query($sql);
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Panel de Administración</title>
  <style>
    body {
      margin:0;
      font-family: Verdana, sans-serif;
      display:grid;
      grid-template-columns: 18% 82%;
      grid-template-rows: 70px auto;
      grid-template-areas:
        "header header"
        "sidebar main";
      height:100vh;
    }
    header {
      grid-area: header;
      background:#333;
      color:#fff;
      display:flex;
      align-items:center;
      justify-content:space-between;
      padding:0 20px;
    }
    nav {
      grid-area: sidebar;
      background:#444;
      color:#fff;
      padding:20px;
    }
    nav a {
      display:block;
      color:#fff;
      text-decoration:none;
      margin:10px 0;
      padding:8px;
      background:#666;
      border-radius:5px;
      text-align:center;
    }
    nav a:hover { background:#888; }
    main {
      grid-area: main;
      padding:20px;
      background:#f8f8f8;
      overflow:auto;
    }
    table {
      width:100%;
      border-collapse:collapse;
      background:#fff;
    }
    th, td {
      border:1px solid #ccc;
      padding:8px;
      text-align:center;
    }
    th { background:#eee; }
    .btn {
      padding:4px 8px;
      margin:2px;
      border-radius:4px;
      text-decoration:none;
      color:#fff;
    }
    .editar { background:#4CAF50; }
    .rol { background:#2196F3; }
    .bloquear { background:#f44336; }
    .desbloquear { background:#FF9800; }
  </style>
</head>
<body>
  <header>
    <h2>Panel del Administrador</h2>
    <div>Usuario: <?= $_SESSION['usuario'] ?> | <a href="../CerrarSesion.php" style="color:#fff;">Cerrar Sesión</a></div>
  </header>

  <nav>
    <a href="index.php">Usuarios</a>
    <a href="#">Reportes</a>
    <a href="#">Configuración</a>
  </nav>

  <main>
    <h3>Listado de Usuarios Registrados</h3>
    <table>
      <tr>
        <th>ID</th>
        <th>Usuario</th>
        <th>Rol</th>
        <th>Estado</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Dirección</th>
        <th>Fecha Nac.</th>
        <th>Teléfono</th>
        <th>CI</th>
        <th>Acciones</th>
      </tr>
      <?php while ($fila = $resultado->fetch_assoc()) { ?>
      <tr>
        <td><?= $fila['id_cuenta'] ?></td>
        <td><?= $fila['usuario'] ?></td>
        <td><?= $fila['rol'] ?></td>
        <td><?= $fila['estado'] ?></td>
        <td><?= $fila['nombre'] ?></td>
        <td><?= $fila['apellido'] ?></td>
        <td><?= $fila['direccion'] ?></td>
        <td><?= $fila['fecha_nac'] ?></td>
        <td><?= $fila['telefono'] ?></td>
        <td><?= $fila['ci'] ?></td>
        <td>
          <a class="btn editar" href="editar_usuario.php?id=<?= $fila['id_cuenta'] ?>">Editar</a>
          <a class="btn rol" href="hacerprofesor.php?id=<?= $fila['id_cuenta'] ?>">Cambiar Rol</a>
          <?php if ($fila['estado'] === 'activo') { ?>
            <a class="btn bloquear" href="toggle_estado.php?id=<?= $fila['id_cuenta'] ?>">Bloquear</a>
          <?php } else { ?>
            <a class="btn desbloquear" href="toggle_estado.php?id=<?= $fila['id_cuenta'] ?>">Desbloquear</a>
          <?php } ?>
        </td>
      </tr>
      <?php } ?>
    </table>
  </main>
</body>
</html>
