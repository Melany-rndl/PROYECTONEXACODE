<?php
session_start();
$conexion = mysqli_connect(hostname: "localhost", username: "root", password: "", database: "p25");

if (!isset($_SESSION['id_cuenta'])) {
    echo "No hay usuario en sesión.<br>";
    echo "<a href='Cuenta.php'>Volver</a>";
    exit();
}

$id_cuenta = $_SESSION['id_cuenta'];
$res_rol = mysqli_query(mysql: $conexion, query: "SELECT rol FROM cuenta WHERE id_cuenta='$id_cuenta'");
$rol = ($row = mysqli_fetch_assoc(result: $res_rol)) ? $row['rol'] : '';

if ($rol === "profesor") {
    $nombre = $_POST['nombre_clase'];
    $grado = isset($_POST['grado']) ? $_POST['grado'] : '';
    $codigo = substr(string: str_shuffle(string: "ABCDEFGHJKLMNPQRSTUVWXYZ23456789"), offset: 0, length: 6);
    $id_profesor = $id_cuenta;
    mysqli_query(mysql: $conexion, query: "INSERT INTO clase (nombre, codigo, id_profesor, grado) VALUES ('$nombre', '$codigo', $id_profesor, '$grado')");
    $id_clase = mysqli_insert_id(mysql: $conexion);
    mysqli_query(mysql: $conexion, query: "INSERT INTO cuenta_has_clase (clase_id_clase, cuenta_id_cuenta) VALUES ($id_clase, $id_profesor)");
     $mensaje = 'Te uniste exitosamente a una clase, tu codigo es:'.$codigo;

echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
echo"<script>
Swal.fire({
            title: '¡Éxito!',
            text: '$mensaje',
            icon: 'success',
            confirmButtonText: 'Aceptar'
        }).then((result) => {
            // Esto se ejecuta después de que el usuario haga clic en 'Aceptar'
            if (result.isConfirmed) {
                window.location.href = 'Pagina-Principal.php'; // Redirige a otro documento
            }
        });
    </script>";
} else {
    echo "Solo los profesores pueden crear una clase.<br>";
}
echo "<a href='Cuenta.php'>Volver</a>";
?>