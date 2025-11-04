<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<body>
 <?php
session_start();
$conexion = mysqli_connect("localhost", "root", "", "p25");
if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}
 
if (empty($_POST['usuario']) || empty($_POST['contrasena'])) {
    echo "Todos los campos son obligatorios. <a href='Logueo.php'>Volver</a>";
    exit();
}

$usuario = $_POST['usuario'];
$clave = $_POST['contrasena'];

$sql = "SELECT * FROM cuenta WHERE usuario = ? AND clave = ?";
$stmt=$conexion ->prepare($sql);
$stmt ->bind_param("ss",$usuario,$clave);
$stmt ->execute();
$resultado = $stmt->get_result();



if ($resultado && mysqli_num_rows($resultado) > 0) {
    $fila = mysqli_fetch_assoc($resultado);

    if (isset($fila['bloqueado']) && $fila['bloqueado'] == 1) {
        header("Location: verbloqueo.php");
        exit();
    }
    else{
        $_SESSION['id_cuenta'] = $fila['id_cuenta'];
        $_SESSION['usuario'] = $fila['usuario'];
        header("Location: Cuenta.php");
    exit();
    }   
}
 else {
    echo "<script>
        Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Ingrese informacion valida',
    footer: '<a href=\"Logueo.php\">Intentar de nuevo </a>'
});</script> ";
}
?>
   
</body>
</html>
