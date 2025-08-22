<?php
session_start();
$conexion = mysqli_connect("localhost", "root", "", "p25");
if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

if (empty($_POST['usuario']) || empty($_POST['contraseña'])) {
    echo "Todos los campos son obligatorios. <a href='Logueo.php'>Volver</a>";
    exit();
}

$usuario = $_POST['usuario'];
$clave = $_POST['contraseña'];

$sql = "SELECT * FROM cuenta WHERE usuario = '$usuario' AND clave = '$clave'";
$resultado = mysqli_query($conexion, $sql);

if ($resultado && mysqli_num_rows($resultado) > 0) {
    $fila = mysqli_fetch_assoc($resultado);

    $_SESSION['id_cuenta'] = $fila['id_cuenta'];
    $_SESSION['usuario'] = $fila['usuario'];

    header("Location: Cuenta.php");
    exit();
} else {
    echo "Datos incorrectos. <a href='Logueo.php'>Intentar nuevamente</a>";
}
?>





