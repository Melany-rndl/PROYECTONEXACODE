<!DOCTYPE html>
<html>
<head>
    <title>Crear Clase</title>
    <link rel="stylesheet" href="Diseño-Login.css">
</head>
<body>
    <form action="Clave-Crear-Clase.php" method="post">
        <h1>Crear Nueva Clase</h1>
        <label for="nombre_clase">Nombre de la Clase:</label>
        <input type="text" name="nombre_clase" required>
        <label for="grado">Grado:</label>
        <select name="grado" required>
            <option value="">Selecciona el grado</option>
            <option value="Primero">1ro Primaria</option>
            <option value="Segundo">2do Primaria</option>
            <option value="Tercero">3ro Primaria</option>
            <option value="Cuarto">4to Primaria</option>
            <option value="Quinto">5to Primaria</option>
            <option value="Sexto">6to Primaria</option>
            <option value="PrimeroS">1ro Secundaria</option>
            <option value="SegundoS">2do Secundaria</option>
            <option value="TerceroS">3ro Secundaria</option>
            <option value="CuartoS">4to Secundaria</option>
            <option value="QuintoS">5to Secundaria</option>
            <option value="SextoS">6to Secundaria</option>
        </select>
        <input type="submit" value="Crear Clase">
    </form>
    <script>
$(document).ready(function() {
    $("#form-login").validate({
        rules: {
            nombre_clase: {
                required: true,
                minlength: 3,
                maxlength: 20
            },
            grado: {
                required: true,
            }
        },
        messages: {
            usuario: {
                required: "Necesitas poner un nombre a la clase",
                minlength: "Debe tener al menos 3 caracteres",
                maxlength: "No debe superar 20 caracteres"
            },
            contraseña: {
                required: "Selecciona un grando",
            }
        }
    });
});
</script>
</body>
</html>
</html>
