<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Comentarios Recibidos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            padding: 1rem;
        }
        .comentario {
            background: white;
            border-radius: 5px;
            padding: 1rem;
            margin-bottom: 1rem;
            box-shadow: 0 0 5px rgba(0,0,0,0.2);
        }
        h3 {
            margin: 0;
            color: #005487;
        }
        p {
            margin: 0.3rem 0 0;
        }
    </style>
</head>
<body>
<h2>💬 Comentarios recibidos</h2>
<a href="inicio.php" class="volver-link">⬅️ Volver al Inicio</a>
<?php
$archivo = fopen("punto.txt", "r");
$contenido = "";
$comentario = [];

while (!feof($archivo)) {
    $linea = trim(fgets($archivo));
    if (strpos($linea, 'ASUNTO:') === 0) {
        $comentario['asunto'] = substr($linea, 8);
    } elseif (strpos($linea, 'COMENTARIO:') === 0) {
        $comentario['comentario'] = substr($linea, 11);
    } elseif (trim($linea) === str_repeat("-", 40)) {
        // Mostrar comentario formateado
        if (!empty($comentario)) {
            echo "<div class='comentario'>";
            echo "<h3>📌 " . htmlspecialchars($comentario['asunto']) . "</h3>";
            echo "<p>" . nl2br(htmlspecialchars($comentario['comentario'])) . "</p>";
            echo "</div>";
            $comentario = [];
        }
    }
}
fclose($archivo);

?>
</body>
</html>
