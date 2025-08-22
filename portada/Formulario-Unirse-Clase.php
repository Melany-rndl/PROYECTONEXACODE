<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Unirse a Clase</title>
    <link rel="stylesheet" href="Diseño-Login.css">
</head>
<body>
    <form action="Conexion-Clase.php" method="post">
        <h1>Unirse a una Clase</h1>
        <label for="codigo">Código de la clase:</label>
        <input type="text" name="codigo" required>
        <input type="submit" value="Unirse">
    </form>
</body>
</html>