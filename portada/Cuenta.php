<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cuenta</title>
    <link rel="stylesheet" href="Diseño-Login.css">
</head>
<body>
<?php
session_start();

if (!isset($_SESSION['id_cuenta'])) {
    header("Location: Logueo.php");
    exit();
}

$conexion = mysqli_connect("localhost", "root", "", "p25");
if (!$conexion) {
    die("Error al conectar a la base de datos: " . mysqli_connect_error());
}
$id_cuenta = $_SESSION['id_cuenta'];
$sql = "SELECT * FROM informacion WHERE cuenta_id_cuenta='$id_cuenta'";
$resultado = mysqli_query($conexion, $sql);
if($resultado->num_rows > 0){
    $fila = $resultado->fetch_assoc();
    $nombre = $fila['nombre'];
    $apellido = $fila['apellido'];
    $direccion = $fila['direccion'];
    $fecha_nac = $fila['fecha_nac'];
    $telefono = $fila['telefono'];
    $ci = $fila['ci'];
} else {
    $nombre = $apellido = $direccion = $fecha_nac = $telefono = $ci = '';
}

echo "<div class='Contenedor-Cuenta'>";
echo "<div class='Bienvenida'>";
echo "<h1>Bienvenido, " . $nombre . " " . $apellido . "</h1>";
echo "<div class='Datos'>";
echo "<p>Dirección: " . $direccion . "</p>";
echo "<p>Fecha de Nacimiento: " . $fecha_nac . "</p>";
echo "<p>Teléfono: " . $telefono . "</p>";
echo "<p>CI: " . $ci . "</p>";
echo "</div>";
echo "<div class='Cerrar-Sesion-Link'>";
echo "<a href='Cerrar-Sesion.php'>Cerrar Sesión</a>";
echo "<a href='Editar-Formulario.php'>Editar</a>";
echo "</div>";
echo "</div>";
echo "<div class='Empezar'>";
echo "<a href='Pagina-Principal.php'>¡EMPEZAR!</a>";
echo "</div>";  
echo "</div>";
?>
</body>
</html>