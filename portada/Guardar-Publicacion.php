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
if (!isset($_SESSION['id_cuenta'])) {
    header("Location: Logueo.php");
    exit();
}

$conexion = mysqli_connect("localhost", "root", "", "p25");
if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

$id_cuenta = $_SESSION['id_cuenta'];
$id_clase = isset($_POST['id_clase']) ? intval($_POST['id_clase']) : 0;

$titulo = trim($_POST['titulo'] ?? '');
$descripcion = trim($_POST['descripcion'] ?? '');
$tema = trim($_POST['tema'] ?? '');
$nota = isset($_POST['nota']) && $_POST['nota'] !== '' ? floatval($_POST['nota']) : null;

if ($id_clase <= 0 || strlen($titulo) < 3 || strlen($titulo) > 80 || strlen($descripcion) < 5 || strlen($descripcion) > 1000) {
    echo "Datos no válidos.<br><a href='Formulario-Crear-Publicacion.php?id=$id_clase'>Volver</a>";
    exit();
}

$res = mysqli_query($conexion, "SELECT 1 FROM cuenta_has_clase WHERE cuenta_id_cuenta='$id_cuenta' AND clase_id_clase='$id_clase'");
if (mysqli_num_rows($res) == 0) {
    echo "No tienes permisos en esta clase.<br><a href='Pagina-Principal.php'>Volver</a>";
    exit();
}

$sql = "INSERT INTO tarea (titulo, descripcion, tema, nota, id_clase) 
        VALUES ('$titulo', '$descripcion', '$tema', " . ($nota !== null ? "'$nota'" : "NULL") . ", '$id_clase')";
$mensajevolver= "Tareas-Formulario.php?id=$id_clase";
if (mysqli_query($conexion, $sql)) {
   echo "<script>
Swal.fire({
  icon: 'success',
  title: '¡Tarea creada exitosamente !',
  text: 'Tu tarea fue creada correctamente.',
footer: '<a href=\"$mensajevolver\">Volver a la clase</a>'
});
</script>
";
} else {
    echo "❌ Error al crear la tarea: " . mysqli_error($conexion) . "<br>";
}

echo "<a href='Tareas-Formulario.php?id=$id_clase'>Volver a la clase</a>";
?>

</body>
</html>