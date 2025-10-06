<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Guardando sugerencia</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<body>
<?php
// Recibir datos
$asu = trim($_POST['asuntito']);
$jorge = trim($_POST['come']);

if (!empty($asu) && !empty($jorge)) {
    $archivo = fopen('punto.txt', 'a');
    fwrite($archivo, "ASUNTO: " . $asu . PHP_EOL);
    fwrite($archivo, "COMENTARIO: " . $jorge . PHP_EOL);
    fwrite($archivo, str_repeat("-", 40) . PHP_EOL); // separador
    fclose($archivo);
    echo "<script>
Swal.fire({
  icon: 'success',
  title: '¡Comentario enviado exitosamente!',
  text: 'Tu comentario ha sido enviado correctamente.',
  footer: '<a href=\"archivo3.php\">Ver comentarios </a>'
});
</script>";
} else {
    echo "<script>
        Swal.fire({
  icon: 'error',
  title: Oops...',
  text: 'Hubo un error al guardar la informacion!',
    footer: '<a href=\"footer.php\">Intentar de nuevo </a>'
});</script>";
}
?>
<br>
<a href="archivo3.php">Ver comentarios</a>
</body>
</html>