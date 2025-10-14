<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="Diseño-Login.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
</head>
<body> 

<div name="Inicio-Sesion" class="animacion-inicial">
    <form id="form-login" action="Usuario.php" method="post">
        <h1>INICIAR SESIÓN</h1>

        <label>Usuario</label>
        <input type="text" name="usuario"><br><br>

        <label>Contraseña</label>
        <input type="password" name="contrasena"><br><br>

        <input type="submit" value="Iniciar Sesión">
        <input type="reset" value="🗑">
    </form>

    <div class="Crear-Cuenta-Enlace">
        <a href="Crear-Cuenta.php">¿No tienes una cuenta?</a>
    </div>
</div>

<script>
$(document).ready(function() {
    $("#form-login").validate({
        rules: {
            usuario: {
                required: true,
                minlength: 3,
                maxlength: 20
            },
            contrasena: {
                required: true,
                minlength: 6
            }
        },
        messages: {
            usuario: {
                required: "El usuario es obligatorio",
                minlength: "Debe tener al menos 3 caracteres",
                maxlength: "No debe superar 20 caracteres"
            },
            contrasena: {
                required: "La contraseña es obligatoria",
                minlength: "Debe tener al menos 6 caracteres"
            }
        }
    });
});
</script>
</body>
</html>










