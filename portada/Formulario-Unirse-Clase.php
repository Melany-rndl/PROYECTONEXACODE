<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Unirse a Clase</title>
    <link rel="stylesheet" href="Diseño-Login.css">
</head>
<div class="animacion-inicial">
<body>
    <form action="Conexion-Clase.php" method="post">
        <h1>Unirse a una Clase</h1>
        <label for="codigo">Código de la clase:</label>
        <input type="text" name="codigo" required>
        <input type="submit" value="Unirse">
    </form>
        <script>
$(document).ready(function() {
    $("#form-login").validate({
        rules: {
            codigo: {
                required: true,
                minlength: 6,
                maxlength: 6
            }
        },
        messages: {
            codigo: {
                required: "Ingresa un codigo de clase",
                minlength: "Debe tener un minimo de 6 caracteres",
                maxlength: "Debe tener un maximo de 6 caracteres"
            }
        }
    });
});
</script>
</body>
</div>
</html>
