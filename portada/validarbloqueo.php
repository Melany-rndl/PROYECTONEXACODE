<?php
session_start();
if ($_SESSION['bloqueado'] == 1){
    header("Location: verBloqueo.php");
    exit;
}
?>
