<?php
// Datos de conexión a la base de datos
$direccion="localhost";
$usuario="root";
$contrasena="";
$dbname="p25"; 

// Crear conexión
$conn = new mysqli($direccion, $usuario, $contrasena, $dbname);

// Verificar si hubo error de conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Recibir el id de cuenta y el rol que queremos asignar desde la URL (GET)
$id_cuenta = $_GET['id']; // id del usuario al que se le va a cambiar el rol
$rol = $_GET['rol']; // rol nuevo que se le va a asignar (profesor o estudiante)

// Crear la consulta SQL para actualizar el rol
$sql = "UPDATE cuenta SET rol='$rol' WHERE id_cuenta='$id_cuenta'";

// Ejecutar la consulta
if ($conn->query($sql)) {
    // Si la actualización fue exitosa, volvemos al panel de admin
    header("Location: admin.php");
} else {
    // Si hubo error, lo mostramos en pantalla
    echo "Error: " . $conn->error;
}
