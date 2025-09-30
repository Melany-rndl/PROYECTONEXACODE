<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Cuenta bloqueada</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #e6f2f8, #f9f9f9);
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .mensaje {
            background: #ffffff;
            border: 2px solid #d1e3eb;
            border-radius: 12px;
            padding: 40px;
            text-align: center;
            box-shadow: 0px 8px 20px rgba(0,0,0,0.1);
            max-width: 500px;
        }

        .mensaje h2 {
            color: #2c3e50;
            font-size: 26px;
            margin-bottom: 20px;
        }

        .mensaje p {
            color: #555;
            font-size: 18px;
        }

        .alerta {
            background: #d9edf7;
            color: #31708f;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
            border: 1px solid #bce8f1;
        }
    </style>
</head>
<body>
    <div class="mensaje">
        <div class="alerta">
            🚫 Acceso restringido
        </div>
        <h2>Lo sentimos mucho</h2>
        <p>Tu cuenta se encuentra <strong>bloqueada</strong> por motivos de seguridad.</p>
    </div>
</body>
</html>

