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

    header {
      background-color: rgba(0, 84, 135, 0.8);
      backdrop-filter: blur(4px);
      color: white;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 1rem 2rem;
      position: absolute;
      width: 100%;
      z-index: 1000;
    }

    .logo {
      display: flex;
      align-items: center;
      gap: 1rem;
    }

    .logo img {
      height: 60px;
    }

    .logo span {
      font-family: 'Georgia', serif;
      font-size: 1.8rem;
      font-weight: bold;
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

    nav a button:hover {
      background-color: white;
      color: var(--azul-institucional);
    }

    .menu-toggle {
      display: none;
      flex-direction: column;
      justify-content: center;
      gap: 5px;
      cursor: pointer;
    }

    .menu-toggle div {
      width: 25px;
      height: 3px;
      background-color: white;
    }

    .hero {
      position: relative;
      height: 450px;
      overflow: hidden;
    }

    .carousel {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      z-index: -1;
    }

    .carousel img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      position: absolute;
      opacity: 0;
      animation: carouselFade 24s infinite;
    }

    .carousel img:nth-child(1) { animation-delay: 0s; }
    .carousel img:nth-child(2) { animation-delay: 8s; }
    .carousel img:nth-child(3) { animation-delay: 16s; }

     @keyframes carouselFade {
      0% { opacity: 0; }
      10% { opacity: 1; }
      30% { opacity: 1; }
      40% { opacity: 0; }
      100% { opacity: 0; }
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
      transform: scale(1.03);
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

    footer {
      background-color: var(--azul-institucional);
      color: white;
      padding: 3rem 2rem;
    }

    .footer-container {
      display: flex;
      justify-content: space-between;
      flex-wrap: wrap;
      max-width: 1100px;
      margin: 0 auto;
      gap: 2rem;
    }

    .footer-container h3,
    .footer-container h4 {
      font-family: 'Georgia', serif;
      margin-bottom: 0.8rem;
    }

    .footer-container a {
      color: white;
      text-decoration: none;
      font-weight: bold;
    }

    .footer-container a:hover {
      text-decoration: underline;
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
        <img src="../imagenespro/colegiobolivar.jpg" />
        <div class="info">
          <h3>Aulas Modernas</h3>
          <p>Contamos con aulas amplias, iluminadas y equipadas con recursos tecnológicos para una educación de calidad.</p>
        </div>
      </div>
      <div class="infra-box">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS5nLLhaqwL_CtK2qE7C5-9icn4zSCIAvZLKW7J_YabUxCh177VfZOD8b2wWVM4xFsZJi4&usqp=CAU" />
        <div class="info">
          <h3>Patio Central</h3>
          <p>Espacio de recreación y actos cívicos, rodeado de áreas verdes y árboles frondosos.</p>
        </div>
      </div>
      <div class="infra-box">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT3yA-ahfj8_Eaeai4rJlB1jhK65Jbquao2Jg&s" />
        <div class="info">
          <h3>Biblioteca Escolar</h3>
          <p>Zona tranquila con una gran variedad de libros, revistas y materiales de estudio para todas las edades.</p>
        </div>
      </div>
      <div class="infra-box">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS5nLLhaqwL_CtK2qE7C5-9icn4zSCIAvZLKW7J_YabUxCh177VfZOD8b2wWVM4xFsZJi4&usqp=CAU" />
        <div class="info">
          <h3>Laboratorios</h3>
          <p>Ambientes dedicados a la experimentación científica en física, química y biología.</p>
        </div>
      </div>
      <div class="infra-box">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSSdW_R1XosXoa1ZiE6gfhw5E7-cv6KkJLbwJiIexc_jQt5UPQIagu_i32LwpW2DKEpGr8&usqp=CAU" />
        <div class="info">
          <h3>Cancha Polifuncional</h3>
          <p>Espacio deportivo para practicar fútbol, voleibol, básquet y más.</p>
        </div>
      </div>
      <div class="infra-box">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSgPB7qqzhCN7q6-3qnUC31SACXdQR5FoeCtGwbRubkKymXXfxCTr7V31WHiwLZG3z2hlA&usqp=CAU" />
        <div class="info">
          <h3>Salón de Música</h3>
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