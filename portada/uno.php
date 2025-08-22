<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nexa Class - Aula Virtual</title>
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background: #ffffff;
      color: #333;
    }

    header {
      text-align: center;
      padding: 30px 20px 10px;
      background-color: #ffffff;
    }
    P{
      text-align: left;
      font-size:12PX ;
      padding-left: 5%;
      padding-right: 5%;
    }

    h1 {
      font-size: 2.8rem;
      letter-spacing: 2px;
      color: #4a4a77;
    }

    .buttons {
      margin: 10px 0 20px;
      display: flex;
      text-align: center;
      margin-left:780px;
      
    }

    .buttons button {
      padding: 10px 20px;
      margin: 0 10px;
      font-weight: bold;
      border: none;
      background-color: #4a4a77;
      color: #fff;
      border-radius: 5px;
      cursor: pointer;
    }

    .container {
      display: flex;
      justify-content: space-between;
      align-items: flex-start;
      padding: 40px;
      flex-wrap: wrap;
    }

    .text-section {
      flex: 1;
      min-width: 300px;
      max-width: 50%;
    }

    .text-section h2 {
      font-size: 18PX;
      margin-bottom: 10px;
     margin-left: 5%;


    }

    .text-section ul {
      list-style: none;
      font-size: 12PX;
      padding-right: 5%;
    }

    .text-section li {
      margin-bottom: 10px;
      line-height: 1.6;
    }

    .icon-bar {
      background-color: #e1e4ec;
      border-radius: 25px;
      padding: 20px;
      margin-top: 20px;
      width: 100px;
      text-align: center;
    }

    .icon-bar img {
      display: block;
      margin: 10px auto;
    }

    .image-section {
      flex: 1;
      min-width: 300px;
      text-align: center;
    }

    .image-section img {
      max-width: 100%;
      
      object-fit: cover;
      height: auto;
    }

    @media (max-width: 768px) {
      .container {
        flex-direction: column;
        align-items: center;
      }

      .text-section, .image-section {
        max-width: 100%;
      }
    }
  </style>
</head>
<body>

  <header>
    <h1>NEXA CLASS</h1>
    <div class="buttons">
        <form action="Crear-Cuenta.php" method="get">
      <button>REGISTRARSE</button>
      </form>
      <form action="Logueo.php" method="get">
      <button>INICIAR SESIÓN</button>
      </form>
    </div>
    <p>
      El Aula Virtual de Nexa Class es una plataforma educativa desarrollada especialmente para funcionar sin necesidad de conexión a Internet. Está diseñada para brindar a docentes y estudiantes un espacio digital de aprendizaje, colaboración y gestión académica a través de una red local (LAN), disponible únicamente dentro del colegio.<br> Este sistema nace con el propósito de facilitar el acceso a herramientas tecnológicas incluso en entornos donde no hay conectividad externa, permitiendo el uso de recursos digitales, tareas, foros y calificaciones dentro del mismo edificio o campus.A través de esta plataforma, los estudiantes pueden acceder a sus materias, descargar materiales de estudio, realizar tareas, participar en actividades, y comunicarse con sus docentes. Por su parte, los profesores pueden gestionar contenidos, evaluar trabajos, y mantener comunicación con sus cursos de forma organizada y eficiente.
    </p>
  </header>

  <div class="container">
    <div class="text-section">
      <h2>¿Cómo se utiliza el Aula Virtual?</h2>
      <ul>
        <li>🔌 Conéctate a la red local (LAN) del aula virtual desde cualquier computadora del colegio.</li>
        <li>🔑 Ingresa al sistema con tu usuario y contraseña.</li>
        <li>📋 Accede a tu panel personal con materias, notificaciones y más.</li>
        <li>⬇️ Descarga recursos educativos subidos por los docentes.</li>
        <li>📤 Entrega tus actividades directamente desde la plataforma.</li>
        <li>💬 Participa en foros, consultas y debates.</li>
        <li>📊 Consulta tus calificaciones y observaciones.</li>
      </ul>

      <div class="icon-bar">
        <p><strong>Inicio</strong></p>
        <img src="icon-user.png" alt="icono usuario" width="30">
        <img src="icon-courses.png" alt="icono cursos" width="30">
        <img src="icon-settings.png" alt="icono configuración" width="30">
        <img src="icon-docs.png" alt="icono documentos" width="30">
      </div>
    </div>

    <div class="image-section">
      <img src="aula_virtual_foto.png" >
    </div>
  </div>

</body>
</html>