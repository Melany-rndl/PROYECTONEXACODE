<?php
session_start();
if (!isset($_SESSION['id_cuenta'])) { header(header: "Location: Logueo.php"); exit(); }
$conexion = mysqli_connect(hostname: "localhost", username: "root", password: "", database: "p25");
if (!$conexion) die("Error de conexión");

date_default_timezone_set(timezoneId: 'America/La_Paz');

$id_cuenta = $_SESSION['id_cuenta'];

$id_publicacion = isset($_GET['id']) ? intval(value: $_GET['id']) : 0;

$res_pub = mysqli_query(mysql: $conexion, query: "SELECT * FROM publicacion WHERE id_publicacion='$id_publicacion' LIMIT 1");
$pub = mysqli_fetch_assoc(result: $res_pub);
if (!$pub || $pub['cuenta_id_cuenta'] != $id_cuenta) {
    echo "<p>No tienes permiso para editar esta publicación.</p>";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['contenido'])) {
    $nuevo_contenido = trim(string: $_POST['contenido']);
    if ($nuevo_contenido !== "") {
        $nuevo_contenido = mysqli_real_escape_string(mysql: $conexion, string: $nuevo_contenido);
        $fecha_edicion = date(format: 'Y-m-d H:i:s');
        mysqli_query(mysql: $conexion, query: "UPDATE publicacion SET contenido='$nuevo_contenido', fecha_edicion='$fecha_edicion' WHERE id_publicacion='$id_publicacion'");
        header(header: "Location: Clase-Formulario.php?id=" . intval(value: $pub['clase_id_clase']));
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar publicación</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #e8ecff, #f5f7ff);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        .form-editar-publicacion {
            width: 100%;
            max-width: 600px;
            background: #ffffff;
            padding: 40px 35px;
            border-radius: 16px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: transform 0.3s ease;
        }

        .form-editar-publicacion:hover {
            transform: translateY(-3px);
        }

        .form-editar-publicacion h2 {
            color: #3c328f;
            font-size: 2rem;
            margin-bottom: 25px;
        }

        .form-editar-publicacion textarea {
            width: 100%;
            padding: 15px 18px;
            min-height: 160px;
            border-radius: 12px;
            border: 1px solid #ccc;
            margin-bottom: 25px;
            font-size: 1rem;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            resize: vertical;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        .form-editar-publicacion textarea:focus {
            border-color: #3c328f;
            box-shadow: 0 0 6px rgba(60, 50, 143, 0.3);
            outline: none;
        }

        .form-editar-publicacion button {
            background: #3c328f;
            color: #fff;
            padding: 12px 40px;
            border: none;
            border-radius: 10px;
            font-size: 1.1rem;
            cursor: pointer;
            transition: background 0.3s, transform 0.2s;
        }

        .form-editar-publicacion button:hover {
            background: #5743c6;
            transform: translateY(-2px);
        }

        @media (max-width: 600px) {
            body {
                padding: 10px;
            }

            .form-editar-publicacion {
                padding: 30px 20px;
                border-radius: 12px;
            }

            .form-editar-publicacion h2 {
                font-size: 1.6rem;
            }

            .form-editar-publicacion textarea {
                min-height: 130px;
                font-size: 0.95rem;
            }

            .form-editar-publicacion button {
                width: 100%;
                padding: 12px;
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>
    <form class="form-editar-publicacion" method="post">
        <h2>Editar comentario</h2>
        <textarea name="contenido" required><?= htmlspecialchars(string: $pub['contenido']) ?></textarea>
        <br>
        <button type="submit">Guardar cambios</button>
    </form>
</body>
</html>
