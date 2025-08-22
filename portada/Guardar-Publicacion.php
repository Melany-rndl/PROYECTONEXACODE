<?php
session_start();
if (!isset($_SESSION['id_cuenta'])) {
    header(header: "Location: Logueo.php");
    exit();
}

$conexion = mysqli_connect(hostname: "localhost", username: "root", password: "", database: "p25");
if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

$id_cuenta = $_SESSION['id_cuenta'];
$id_clase = isset($_POST['id_clase']) ? intval(value: $_POST['id_clase']) : 0;
$asunto = trim(string: $_POST['asunto'] ?? '');
$contenido = trim(string: $_POST['contenido'] ?? '');
$fecha = $_POST['fecha'] ?? '';

if ($id_clase <= 0 || strlen(string: $asunto) < 3 || strlen(string: $asunto) > 80 || strlen($contenido) < 5 || strlen($contenido) > 1000) {
    echo "Datos no válidos.<br><a href='Formulario-Crear-Publicacion.php?id=$id_clase'>Volver</a>";
    exit();
}

$res = mysqli_query(mysql: $conexion, query: "SELECT 1 FROM cuenta_has_clase WHERE cuenta_id_cuenta='$id_cuenta' AND clase_id_clase='$id_clase'");
if (mysqli_num_rows(result: $res) == 0) {
    echo "No tienes permisos en esta clase.<br><a href='Pagina-Principal.php'>Volver</a>";
    exit();
}

$sql = "INSERT INTO publicacion (asunto, contenido, fecha, cuenta_id_cuenta, clase_id_clase) VALUES ('$asunto', '$contenido', '$fecha', '$id_cuenta', '$id_clase')";
if (mysqli_query(mysql: $conexion, query: $sql)) {
    echo "Publicación creada correctamente.<br>";
} else {
    echo "Error al crear la publicación.<br>";
}
echo "<a href='Tareas-Formulario.php?id=$id_clase'>Volver a la clase</a>";
function darLike($id){
    global $conexion;
    $sql = "UPDATE publicaciones SET likes = likes + 1 WHERE id = $id";
    mysqli_query($conexion, $sql);
}

if(isset($_GET['id'])){
    darLike($_GET['id']);
    header("Location: Pagina-Principal.php");
}
?>
?>