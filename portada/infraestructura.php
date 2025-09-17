 <!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Infraestructura - Colegio Bojanowski</title>
  <link href="https://fonts.googleapis.com/css2?family=Georgia&family=Segoe+UI&display=swap" rel="stylesheet" />
  <style>
    :root {
      --azul-institucional: #005487;
      --crema: rgb(247, 244, 240);
      --gris-suave: #e0e0e0;
      --marron: #8b5e3c;
      --negro: #333;
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Segoe UI', sans-serif;
      background-color: var(--crema);
      color: var(--negro);
    }
    nav {
      display: flex;
      gap: 1.5rem;
    }

    nav a button {
      background: none;
      border: 2px solid white;
      padding: 0.5rem 1rem;
      border-radius: 5px;
      color: white;
      font-weight: bold;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .hero {
      position: relative;
      height: 450px;
      overflow: hidden;
    }

    .section {
      max-width: 1200px;
      margin: 0 auto;
      padding: 5rem 2rem;
    }

    .section h2 {
      font-family: 'Georgia', serif;
      font-size: 2.5rem;
      color: var(--azul-institucional);
      text-align: center;
      margin-bottom: 2rem;
    }

    .infraestructura-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 2rem;
    }

    .infra-box {
      background-color: white;
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .infra-box:hover {
      transform: scale(1.05);
      box-shadow: 0 8px 16px rgba(0,0,0,0.2);
    }

    .infra-box img {
      width: 100%;
      height: 180px;
      object-fit: cover;
    }

    .infra-box .info {
      padding: 1rem;
    }

    .infra-box .info h3 {
      color: var(--marron);
      margin-bottom: 0.5rem;
    }

    .infra-box .info p {
      font-size: 0.95rem;
      line-height: 1.4;
    }

    @media (max-width: 768px) {
      .menu-toggle {
        display: flex;
      }

      nav {
        display: none;
        flex-direction: column;
        position: absolute;
        top: 70px;
        right: 0;
        width: 100%;
        background-color: var(--azul-institucional);
        padding: 1rem;
      }

      nav.active {
        display: flex;
      }

      nav a {
        width: 100%;
        text-align: center;
        margin-bottom: 1rem;
      }

      .infraestructura-grid {
        grid-template-columns: 1fr;
      }
    }
  </style>
</head>
<body>
  
  <?php include 'h.php';?>

  <section class="section">
    <h2>Infraestructura</h2>
    <div class="infraestructura-grid">
      <div class="infra-box">
        <img src="../imagenespro/alumnos.jpg" />
        <div class="info">
          <h3>Aulas Modernas</h3>
          <p>Contamos con aulas amplias, iluminadas y equipadas con recursos tecnológicos para una educación de calidad.</p>
        </div>
      </div>
      <div class="infra-box">
        <img src="../imagenespro/patio5.jpg"/>
        <div class="info">
          <h3>Patio Central</h3>
          <p>Espacio de recreación y actos cívicos, rodeado de áreas verdes y árboles frondosos.</p>
        </div>
      </div>
      <div class="infra-box">
        <img src="../imagenespro/director1.jpg"/>
        <div class="info">
          <h3>Sala de trofeos </h3>
          <p>Zona de trofeos acumulados por la unidad educativa.</p>
        </div>
      </div>
      <div class="infra-box">
        <img src="../imagenespro/patio3.jpg"/>
        <div class="info">
          <h3>Laboratorios</h3>
          <p>Ambientes dedicados a la experimentación científica en física, química y biología.</p>
        </div>
      </div>
      <div class="infra-box">
        <img src="../imagenespro/patio6.jpg"/>
        <div class="info">
          <h3>Cancha Polifuncional</h3>
          <p>Espacio deportivo para practicar fútbol, voleibol, básquet y más.</p>
        </div>
      </div>
      <div class="infra-box">
        <img src="../imagenespro/edufisica.jpg" />
        <div class="info">
          <h3>Salón de educacion fisica</h3>
          <p>Equipado para ensayos de la Banda Bojanowski y clases de instrumentos musicales.</p>
        </div>
      </div>
    </div>
  </section>
<?php include 'footer.php'; ?>


  <script>
    const menuToggle = document.getElementById('menuToggle');
    const navMenu = document.getElementById('navMenu');

    menuToggle.addEventListener('click', () => {
      navMenu.classList.toggle('active');
    });
  </script>
</body>
</html>