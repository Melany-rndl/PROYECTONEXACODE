<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Document</title>
</head>
<body>
    <?php
session_start();
$conexion = mysqli_connect(hostname: "localhost", username: "root", password: "", database: "p25");
$codigo = $_POST['codigo'];

if (isset($_SESSION['id_cuenta'])) {
    $id_cuenta = $_SESSION['id_cuenta'];

    $result = mysqli_query(mysql: $conexion, query: "SELECT id_clase FROM clase WHERE codigo='$codigo'");
    if ($row = mysqli_fetch_assoc(result: $result)) {
        $id_clase = $row['id_clase'];
        $existe = mysqli_query(mysql: $conexion, query: "SELECT * FROM cuenta_has_clase WHERE clase_id_clase=$id_clase AND cuenta_id_cuenta=$id_cuenta");
        if (mysqli_num_rows(result: $existe) == 0) {
            mysqli_query(mysql: $conexion, query: "INSERT INTO cuenta_has_clase (clase_id_clase, cuenta_id_cuenta) VALUES ($id_clase, $id_cuenta)");
            echo "<script>
Swal.fire({
  icon: 'success',
  title: '¡Felicidades!',
  text: '¡Te uniste a una clase!',
  footer: '<a href=\"Pagina-Principal.php\">Volver</a>'
});
</script>";
        } else {
            echo "<script>
Swal.fire({
  icon: 'question',
  title: 'De nuevo?',
  text: 'Ya te uniste a esta clase',
  footer: '<a href=\"Pagina-Principal.php\">Volver</a>'
});
</script>";
        }
    } else {
        echo "<script>
Swal.fire({
  icon: 'error',
  title: 'Codigo no valido',
  text: 'El codigo no es valido.',
  footer: '<a href=\"Pagina-Principal.php\">Volver</a>'
});
</script>";
    }
} else {
    echo "No hay usuario en sesión.<br>";
}

echo "<a href='Cuenta.php'>Volver</a>";
?>
</body>
</html>
