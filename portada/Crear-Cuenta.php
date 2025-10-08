
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Cuenta</title>
    <link rel="stylesheet" href="Diseño-Login.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
    <style>
        label.error {
            color: red;
            font-size: 12px;
            font-weight: normal;
            margin-top: 4px;
            display: block;
        }
    </style>
</head>
<body>
<div class="animacion-inicial">
    <form id="form-crear" action="Registrar.php" method="post" autocomplete="off">
        <h1>CREAR CUENTA</h1>

        <label for="usuario">Usuario</label>
        <input type="text" name="usuario" id="usuario"><br><br>

        <label for="contrasena">Contraseña</label>
        <input type="password" name="contrasena" id="contrasena"><br><br>

        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre"><br><br>

        <label for="apellido">Apellido</label>
        <input type="text" name="apellido" id="apellido"><br><br>

        <label for="direccion">Dirección</label>
        <input type="text" name="direccion" id="direccion"><br><br>

        <label for="fecha_nac">Fecha de Nacimiento</label>
        <input type="date" name="fecha_nac" id="fecha_nac"><br><br>

        <label for="telefono">Teléfono</label>
        <input type="text" name="telefono" id="telefono"><br><br>

        <label for="ci">Carnet de Identidad</label>
        <input type="text" name="ci" id="ci"><br><br>

        <input type="submit" value="Crear Cuenta">
        <input type="reset" value="🗑">
    </form>
</div>

<script>
$(document).ready(function() {
    $("#form-crear").validate({
        rules: {
            usuario: {
                required: true,
                minlength: 3,
                maxlength: 20
            },
            contrasena: {
                required: true,
                minlength: 6
            },
            nombre: {
                required: true,
                minlength: 3,
                maxlength: 20
            },
            apellido: {
                required: true,
                minlength: 3,
                maxlength: 20
            },
            direccion: {
                required: true,
                minlength: 3,
                maxlength: 30
            },
            fecha_nac: {
                required: true
            },
            telefono: {
                required: true,
                digits: true,
                minlength: 8,
                maxlength: 8
            },
            ci: {
                required: true,
                digits: true
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
            },
            
            nombre: {
                required: "El nombre es obligatorio",
                minlength: "Debe tener al menos 3 letras",
                maxlength: "No debe superar 20 letras"
            },
            apellido: {
                required: "El apellido es obligatorio",
                minlength: "Debe tener al menos 3 letras",
                maxlength: "No debe superar 20 letras"
            },
            direccion: {
                required: "La dirección es obligatoria",
                minlength: "Debe tener al menos 3 letras",
                maxlength: "No debe superar 30 letras"
            },
            fecha_nac: {
                required: "La fecha de nacimiento es obligatoria"
            },
            telefono: {
                required: "El teléfono es obligatorio",
                digits: "Solo se permiten números",
                minlength: "Debe tener 8 dígitos",
                maxlength: "Debe tener 8 dígitos"
            },
            ci: {
                required: "El carnet es obligatorio",
                digits: "Solo se permiten números"
            }
        }
    });
});
</script>
</body>
</html>
