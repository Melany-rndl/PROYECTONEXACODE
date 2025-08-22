<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Guardando sugerencia</title>
</head>
<body>
<?php
// Recibir datos
$asu = trim($_POST['asuntito']);
$jorge = trim($_POST['come']);

// Validar que no estén vacíos
if (!empty($asu) && !empty($jorge)) {
    $archivo = fopen('punto.txt', 'a');
    fwrite($archivo, "ASUNTO: " . $asu . PHP_EOL);
    fwrite($archivo, "COMENTARIO: " . $jorge . PHP_EOL);
    fwrite($archivo, str_repeat("-", 40) . PHP_EOL); // separador
    fclose($archivo);
    echo "<p>✅ Tu sugerencia se ha enviado correctamente.</p>";
} else {
    echo "<p>⚠️ Debes llenar todos los campos.</p>";
}
?>
<br>
<a href="archivo3.php">Ver comentarios</a>
</body>
</html>