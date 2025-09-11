<?php
$servername = "localhost";
$username   = "root";     
$password   = "";        
$database   = "p25";      

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = mysqli_real_escape_string($conn, $_POST["titulo"]);
    $descripcion = mysqli_real_escape_string($conn, $_POST["descripcion"]);
    $tema = mysqli_real_escape_string($conn, $_POST["tema"]);
    $nota = !empty($_POST["nota"]) ? $_POST["nota"] : "NULL";
    $clase_id = $_POST["clase_id_clase"];

    if (!empty($titulo) && !empty($descripcion) && !empty($clase_id)) {
        $sql = "INSERT INTO tarea (titulo, descripcion, tema, nota, clase_id_clase) 
                VALUES ('$titulo', '$descripcion', " . 
                (!empty($tema) ? "'$tema'" : "NULL") . ", " . 
                ($nota !== "NULL" ? "'$nota'" : "NULL") . ", '$clase_id')";

        if (mysqli_query($conn, $sql)) {
            echo "<h2>Tarea guardada con éxito</h2>";
            echo "<a href='Tareas-Formulario.php'>Crear otra tarea</a><br>";
            echo "<a href='Lista-Tareas.php'>Ver lista de tareas</a>";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "Título, descripción y clase son obligatorios.";
    }
}

mysqli_close($conn);
?>
