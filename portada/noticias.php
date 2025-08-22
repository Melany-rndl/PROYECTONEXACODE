<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Noticias - Colegio Bojanowski</title>
  <link href="https://fonts.googleapis.com/css2?family=Georgia&family=Segoe+UI&display=swap" rel="stylesheet">
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

    .menu-toggle {
      background: none;
      border: none;
      color: white;
      font-size: 2rem;
      cursor: pointer;
      display: none;
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

    .noticias-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 2rem;
    }

    .noticia {
      background-color: white;
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
      display: flex;
      flex-direction: column;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .noticia:hover {
      transform: scale(1.03);
      box-shadow: 0 8px 16px rgba(0,0,0,0.2);
    }

    .noticia img {
      width: 100%;
      height: 180px;
      object-fit: cover;
    }

    .noticia-content {
      padding: 1rem;
    }

    .noticia-content h3 {
      color: var(--marron);
      margin-bottom: 0.5rem;
    }

    .noticia-content p {
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
      nav {
        display: none;
        flex-direction: column;
        background-color: var(--azul-institucional);
        position: absolute;
        top: 70px;
        right: 0;
        width: 100%;
        padding: 1rem;
      }

      nav.active {
        display: flex;
      }

      .menu-toggle {
        display: block;
      }

      .bloque-grid {
        grid-template-columns: 1fr;
      }
    }
  </style>
</head>
<body>
    <?php include 'h.php';?>


  <section class="section">
    <h2>Últimas Noticias</h2>
    <div class="noticias-grid">
      <div class="noticia"><img src="https://www.infobae.com/resizer/v2/GM56NUAQ3RBQ7FQOHB3CKS53RI.jpg?auth=2f354fbf194997e330c7a351e5bf498b8a844ae5add44541ea9604e74736d83d&smart=true&width=1200&height=1200&quality=85" /><div class="noticia-content"><h3>Feria Científica Escolar 2025</h3><p>Los estudiantes presentaron proyectos innovadores en ciencia, tecnología y medio ambiente.</p></div></div>
      <div class="noticia"><img src="https://www.infobae.com/resizer/v2/GM56NUAQ3RBQ7FQOHB3CKS53RI.jpg?auth=2f354fbf194997e330c7a351e5bf498b8a844ae5add44541ea9604e74736d83d&smart=true&width=1200&height=1200&quality=85" /><div class="noticia-content"><h3>Celebración del Día del Maestro</h3><p>El colegio rindió homenaje a los docentes con actos y reconocimientos especiales.</p></div></div>
      <div class="noticia"><img src="https://www.infobae.com/resizer/v2/GM56NUAQ3RBQ7FQOHB3CKS53RI.jpg?auth=2f354fbf194997e330c7a351e5bf498b8a844ae5add44541ea9604e74736d83d&smart=true&width=1200&height=1200&quality=85" /><div class="noticia-content"><h3>Semana de la Lectura</h3><p>Actividades de fomento a la lectura con participación de escritores locales.</p></div></div>
      <div class="noticia"><img src="https://www.infobae.com/resizer/v2/GM56NUAQ3RBQ7FQOHB3CKS53RI.jpg?auth=2f354fbf194997e330c7a351e5bf498b8a844ae5add44541ea9604e74736d83d&smart=true&width=1200&height=1200&quality=85" /><div class="noticia-content"><h3>Competencia Intercolegial de Matemáticas</h3><p>Estudiantes de secundaria obtuvieron el primer lugar en el torneo regional.</p></div></div>
      <div class="noticia"><img src="https://www.infobae.com/resizer/v2/GM56NUAQ3RBQ7FQOHB3CKS53RI.jpg?auth=2f354fbf194997e330c7a351e5bf498b8a844ae5add44541ea9604e74736d83d&smart=true&width=1200&height=1200&quality=85" /><div class="noticia-content"><h3>Campaña de Reciclaje</h3><p>El colegio recolectó más de 300 kg de residuos reutilizables en una semana.</p></div></div>
      <div class="noticia"><img src="https://www.infobae.com/resizer/v2/GM56NUAQ3RBQ7FQOHB3CKS53RI.jpg?auth=2f354fbf194997e330c7a351e5bf498b8a844ae5add44541ea9604e74736d83d&smart=true&width=1200&height=1200&quality=85" /><div class="noticia-content"><h3>Convivencia Estudiantil</h3><p>Jornada de integración para fortalecer los lazos entre estudiantes y profesores.</p></div></div>
      <div class="noticia"><img src="https://www.infobae.com/resizer/v2/GM56NUAQ3RBQ7FQOHB3CKS53RI.jpg?auth=2f354fbf194997e330c7a351e5bf498b8a844ae5add44541ea9604e74736d83d&smart=true&width=1200&height=1200&quality=85" /><div class="noticia-content"><h3>Festival de Teatro Escolar</h3><p>Los cursos presentaron obras teatrales promoviendo el arte y la expresión cultural.</p></div></div>
      <div class="noticia"><img src="https://www.infobae.com/resizer/v2/GM56NUAQ3RBQ7FQOHB3CKS53RI.jpg?auth=2f354fbf194997e330c7a351e5bf498b8a844ae5add44541ea9604e74736d83d&smart=true&width=1200&height=1200&quality=85" /><div class="noticia-content"><h3>Visita de la Banda Bojanowski</h3><p>La banda del colegio deleitó con una presentación especial para toda la comunidad.</p></div></div>
      <div class="noticia"><img src="https://www.infobae.com/resizer/v2/GM56NUAQ3RBQ7FQOHB3CKS53RI.jpg?auth=2f354fbf194997e330c7a351e5bf498b8a844ae5add44541ea9604e74736d83d&smart=true&width=1200&height=1200&quality=85" /><div class="noticia-content"><h3>Expo Arte y Cultura</h3><p>Los estudiantes expusieron trabajos de arte, música y danza inspirados en la identidad nacional.</p></div></div>
    </div>
  </section>
<?php include 'footer.php'; ?>

  <script>
    function toggleMenu() {
      const nav = document.getElementById('navMenu');
      nav.classList.toggle('active');
    }
  </script>
</body>
</html>