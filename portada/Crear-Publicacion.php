<?php
session_start();
if (!isset($_SESSION['id_cuenta'])) { header(header: "Location: Logueo.php"); exit(); }
$conexion = mysqli_connect(hostname: "localhost", username: "root", password: "", database: "p25");
if (!$conexion) die("Error de conexión.");

$id_cuenta = $_SESSION['id_cuenta'];
$id_clase = isset($_POST['id_clase']) ? intval(value: $_POST['id_clase']) : 0;
$titulo = isset($_POST['titulo']) ? trim(string: $_POST['titulo']) : '';
$contenido = isset($_POST['contenido']) ? trim(string: $_POST['contenido']) : '';

if ($id_clase <= 0) {
  echo "Clase no encontrada.<br><a href='Pagina-Principal.php'>Volver</a>";
  exit();
}

if (strlen(string: $titulo) < 3 || strlen(string: $titulo) > 80 || strlen(string: $contenido) < 5 || strlen(string: $contenido) > 1000) {
  echo "El título o contenido no cumplen los requisitos.<br><a href='Formulario-Crear-Publicacion.php?id=$id_clase'>Volver</a>";
  exit();
}

// Valida que el usuario sea parte de la clase
$res = mysqli_query(mysql: $conexion, query: "SELECT 1 FROM cuenta_has_clase WHERE cuenta_id_cuenta='$id_cuenta' AND clase_id_clase='$id_clase'");
if (mysqli_num_rows(result: $res) == 0) {
  echo "No tienes permisos para publicar en esta clase.<br><a href='Pagina-Principal.php'>Volver</a>";
  exit();
}

// Inserta la publicación
$stmt = mysqli_prepare(mysql: $conexion, query: "INSERT INTO publicacion (titulo, contenido, fecha, cuenta_id_cuenta, clase_id_clase) VALUES (?, ?, NOW(), ?, ?)");
mysqli_stmt_bind_param($stmt, "ssii", $titulo, $contenido, $id_cuenta, $id_clase);

if (mysqli_stmt_execute(statement: $stmt)) {
  echo "Publicación creada correctamente.<br>";
} else {
  echo "Error al crear la publicación.<br>";
}
echo "<a href='Clase-Formulario.php?id=$id_clase'>Volver a la clase</a>";
?>