<?php
$conexion = mysqli_connect("localhost", "root", "", "p25");
if (!$conexion) {
    die("Error de conexión a la base de datos.");
}

if (
    isset($_POST['usuario']) && trim($_POST['usuario']) !== "" &&
    isset($_POST['contrasena']) && trim($_POST['contrasena']) !== "" &&
    isset($_POST['rol']) && trim($_POST['rol']) !== "" &&
    isset($_POST['nombre']) && trim($_POST['nombre']) !== "" &&
    isset($_POST['apellido']) && trim($_POST['apellido']) !== "" &&
    isset($_POST['direccion']) && trim($_POST['direccion']) !== "" &&
    isset($_POST['fecha_nac']) && trim($_POST['fecha_nac']) !== "" &&
    isset($_POST['telefono']) && trim($_POST['telefono']) !== "" &&
    isset($_POST['ci']) && trim($_POST['ci']) !== ""
) {
    $usuario    = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];
    $rol        = $_POST['rol'];
    $nombre     = $_POST['nombre'];
    $apellido   = $_POST['apellido'];
    $direccion  = $_POST['direccion'];
    $fecha_nac  = $_POST['fecha_nac'];
    $telefono   = $_POST['telefono'];
    $ci         = $_POST['ci'];

    // Registrar en la tabla cuenta (solo usuario, clave, rol)
    $sql_cuenta = "INSERT INTO cuenta (usuario, clave, rol)
                   VALUES ('$usuario', '$contrasena', '$rol')";
    if (mysqli_query($conexion, $sql_cuenta)) {
        $id_cuenta = mysqli_insert_id($conexion);

        // Registrar en la tabla informacion (datos personales)
        $sql_info = "INSERT INTO informacion (nombre, apellido, direccion, fecha_nac, telefono, ci, cuenta_id_cuenta)
                     VALUES ('$nombre', '$apellido', '$direccion', '$fecha_nac', '$telefono', '$ci', $id_cuenta)";

        if (mysqli_query($conexion, $sql_info)) {
            echo "Cuenta creada exitosamente.<br>";
            echo "<a href='Logueo.php'>Iniciar sesión</a>";
        } else {
            // Si falla la información personal, elimina la cuenta para no dejar registros huérfanos
            mysqli_query($conexion, "DELETE FROM cuenta WHERE id_cuenta = $id_cuenta");
            echo "Error al guardar la información personal: " . mysqli_error($conexion) . "<br>";
            echo "<a href='Crear-Cuenta.php'>Volver</a>";
        }
    } else {
        echo "Error al crear la cuenta: " . mysqli_error($conexion) . "<br>";
        echo "<a href='Crear-Cuenta.php'>Volver</a>";
    }
} else {
    echo "Todos los campos son obligatorios.<br>";
    echo "<a href='Crear-Cuenta.php'>Volver</a>";
}
?>