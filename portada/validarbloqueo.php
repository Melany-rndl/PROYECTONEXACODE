<?php
session_start();

// Si está bloqueado, lo mandamos a la vista de bloqueo
if ($_SESSION['bloqueado'] == 1){
    header("Location: verBloqueo.php");
    exit;
}
?>
