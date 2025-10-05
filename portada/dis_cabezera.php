<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['id_cuenta'])) {
    header("Location: Logueo.php");
    exit();
}

if (!isset($rol)) {
    if (!isset($conexion)) {
        $conexion = mysqli_connect("localhost", "root", "", "p25");
    }
    $id_cuenta = $_SESSION['id_cuenta'];
    $obtener_rol = mysqli_query($conexion, "SELECT rol FROM cuenta WHERE id_cuenta='$id_cuenta'");
    $rol = ($row = mysqli_fetch_assoc($obtener_rol)) ? $row['rol'] : '';
}

if (!isset($materias_menu)) {
    $materias_menu = [];
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Lateral Funcional</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        /* Botón menú */
        .iconomenu {
            background-color: white;
            border: none;
            font-size: 25px;
            color: #3f3e57;
            cursor: pointer;
            position: relative;
        }

        /* Menú lateral */
        #menuMaterias {
            display: none;
            flex-direction: column;
            background-color: #f4f4f4;
            border-right: 2px solid #ccc;
            padding: 20px;
            position: absolute;
            top: 50px;
            left: 0;
            width: 220px;
            max-height: calc(100vh - 50px);
            overflow-y: auto;
            box-shadow: 2px 0 5px rgba(0,0,0,0.1);
            z-index: 999;
            border-radius: 0 10px 10px 0;
        }

        #menuMaterias div {
            margin-bottom: 15px;
        }

        .mensajemenu{
            font-family: Arial;
            font-size: 16px;
            color: #3f3e57;
            cursor: pointer;
            border-radius: 10px;
            background: #d8daea;
            padding: 8px 12px;
        }

        .mensajemenu:hover {
            background: #c7c9e2;
        }
    </style>
</head>
<body>

    <button class="iconomenu" onclick="toggleMenu()">☰</button>

    <div id="menuMaterias">
        <hr>
        <?php if(is_array($materias_menu) && count($materias_menu) > 0): ?>
            <?php foreach($materias_menu as $materia): ?>
                <div><span class="mensajemenu"><strong><?= htmlspecialchars($materia); ?></strong></span></div>
            <?php endforeach; ?>
        <?php else: ?>
            <div><span class="mensajemenu">No hay materias disponibles</span></div>
        <?php endif; ?>
    </div>

    <script>
        function toggleMenu() {
            const menu = document.getElementById("menuMaterias");
            if(menu.style.display === "flex" || menu.style.display === "block") {
                menu.style.display = "none";
            } else {
                menu.style.display = "flex";
            }
        }
    </script>

</body>
</html>

