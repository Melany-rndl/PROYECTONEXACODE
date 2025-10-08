<?php
session_start();
if (!isset($_SESSION['id_cuenta'])) { header("Location: Logueo.php"); exit(); }
$conexion = mysqli_connect("localhost", "root", "", "p25");
$id_cuenta = $_SESSION['id_cuenta'];
$res_rol = mysqli_query($conexion, "SELECT rol FROM cuenta WHERE id_cuenta='$id_cuenta'");
$rol = ($row = mysqli_fetch_assoc($res_rol)) ? $row['rol'] : '';
if ($rol !== "profesor") {
    header("Location: Pagina-Principal.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Acción Profesor</title>
    <link rel="stylesheet" href="Diseño-Login.css">
    <style>
        [name="accion-profesor-container"] {
            max-width: 400px;
            margin: 80px;
            background: black;
            padding: 32px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(118, 199, 240, 0.2);
            text-align: center;
        }
        [name="accion-profesor-container"] button {
            width: 80%;
            margin: 18px ;
            font-size: 20px;
            background-color: #2c2c2c;
            color:white;
            border-radius: 5px;
            padding: 10px;
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        }
        [name="accion-profesor-container"] a {
            background-color: #76c7f0;
            padding: 15px 60px;
            color: rgb(94, 26, 26);
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            text-align: center;
            margin-top: 20px;
            font-size: 25px;
            border-radius: 8px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="animacion-inicial" name="accion-profesor-container">
        <h1>¿Qué deseas hacer?</h1>
        <button onclick="window.location.href='Formulario-Crear-Clase.php'">Crear una nueva clase</button>
        <button onclick="window.location.href='Formulario-Unirse-Clase.php'">Unirse a una clase</button>
        <a href="Pagina-Principal.php" style="display:block;margin-top:30px;font-size:15px;">Volver</a>
    </div>
</body>
</html>
