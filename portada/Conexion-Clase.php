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
            echo "¡Te has unido a la clase!<br>";
        } else {
            echo "Ya estás inscrito en esta clase.<br>";
        }
    } else {
        echo "Código no válido.<br>";
    }
} else {
    echo "No hay usuario en sesión.<br>";
}

echo "<a href='Cuenta.php'>Volver</a>";
?>