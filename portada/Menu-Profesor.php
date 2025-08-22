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
        .accion-profesor-container {
            max-width: 400px;
            margin: 80px auto;
            background: #2c2c2c;
            padding: 32px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(118, 199, 240, 0.2);
            text-align: center;
        }
        .accion-profesor-container button {
            width: 80%;
            margin: 18px auto;
            font-size: 18px;
        }
    </style>
</head>
<body>
    <div class="accion-profesor-container">
        <h1>¿Qué deseas hacer?</h1>
        <button onclick="window.location.href='Formulario-Crear-Clase.php'">Crear una nueva clase</button>
        <button onclick="window.location.href='Formulario-Unirse-Clase.php'">Unirse a una clase</button>
        <a href="Pagina-Principal.php" style="display:block;margin-top:30px;font-size:15px;">Volver</a>
    </div>
</body>
</html>