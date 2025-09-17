<?php 
session_start();

// Si el usuario es estudiante, lo mandamos a la página principal
if ($_SESSION['rol'] == "estudiante") { 
    header("Location: Pagina-Principal.php");
    exit;
}
?>
