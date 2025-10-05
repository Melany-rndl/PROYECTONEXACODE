<!DOCTYPE html> 
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Colegio Bojanowski - Tradicional</title>
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
      scroll-behavior: smooth;
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

    nav button {
      background: none;
      border: 2px solid white;
      padding: 0.5rem 1rem;
      border-radius: 5px;
      color: white;
      font-weight: bold;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    nav button:hover {
      background-color: white;
      color: var(--azul-institucional);
    }

    .menu-toggle {
      display: none;
      background: none;
      border: none;
      color: white;
      font-size: 1.8rem;
      cursor: pointer;
    }

    /* Submenú */
    .submenu {
      position: relative;
      display: inline-block;
    }
    .submenu-content {
      display: none;
      position: absolute;
      background-color: var(--azul-institucional);
      min-width: 220px;
      box-shadow: 0px 4px 8px rgba(0,0,0,0.2);
      z-index: 1;
      border-radius: 5px;
      overflow: hidden;
    }
    .submenu-content a {
      color: white;
      padding: 0.7rem 1rem;
      display: block;
      text-decoration: none;
      font-weight: bold;
    }
    .submenu-content a:hover {
      background-color: white;
      color: var(--azul-institucional);
    }
    .submenu:hover .submenu-content {
      display: block;
    }

    .hero {
      position: relative;
      height: 500px;
      overflow: hidden;
    }

    .hero-content {
      height: 100%;
      display: flex;
      align-items: center;
      justify-content: center;
      text-align: center;
      background-color: rgba(0, 0, 0, 0.4);
      color: white;
    }

    .hero-content h1 {
      font-size: 3rem;
      font-family: 'Georgia', serif;
      padding: 1rem 2rem;
      background-color: rgba(255, 255, 255, 0.2);
      border-radius: 10px;
    }

    .bloque-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 2rem;
      align-items: center;
      max-width: 1100px;
      margin: 3rem auto;
      padding: 2rem;
      background-color: white;
      border-radius: 10px;
      box-shadow: 0 0 6px rgba(0, 0, 0, 0.1);
      transition: all 0.3s ease;
    }
    .bloque-grid :hover {
      color:#005487;
      font-size: 20px;
    }

    .bloque-grid img {
      width: 100%;
      border-radius: 10px;
      transition: all 0.3s ease;
    }
    .bloque-grid img:hover {
      transform: scale(1.03);
      box-shadow: 0 8px 16px rgba(0,0,0,0.2);
    }

    .separador {
      height: 40px;
      background-color: var(--gris-suave);
      margin: 2rem 0;
    }

    h2 {
      text-align: center;
      font-family: 'Georgia', serif;
      font-size: 2.2rem;
      margin-bottom: 1.5rem;
      color: var(--azul-institucional);
    }

    iframe {
      width: 100%;
      height: 400px;
      border: none;
      border-radius: 10px;
    }

    .container {
      max-width: 1100px;
      margin: 0 auto;
      padding: 2rem;
    }
    .bloque-historia {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 2rem;
      align-items: center;
      max-width: 1100px;
      margin: 3rem auto 1rem auto;
      padding: 2rem;
      background-color: white;
      border-radius: 10px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.15);
      animation: fadeInUp 0.7s ease forwards;
    }
    .bloque-historia img {
      width: 100%;
      border-radius: 10px;
      box-shadow: 0 6px 18px rgba(0,0,0,0.2);
      transition: transform 0.3s ease;
    }
    .bloque-historia img:hover {
      transform: scale(1.05);
    }
    .bloque-historia p {
      font-size: 1.1rem;
      line-height: 1.6;
      color: var(--negro);
    }

    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
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

      /* Responsivo historia */
      .bloque-historia {
        grid-template-columns: 1fr;
      }
    }
  </style>
</head>
<body>
  <?php include 'h.php';?>

  <div class="bloque-grid">
    <div>
      <h2>Misión</h2>
      <p>Optimizar la calidad educativa articulando las áreas de conocimientos (contenidos,estrategias,técnicas, métodos, objetivos) y la práctica de valores (inclusión, respetó, responsabilidad,puntualidad,honestidad y solidaridad) para lograr los perfiles de salida y asegurar una educación integral,competitiva, dinámica, democrática, técnica, científica, tecnológica, pacífica fundamentada en el buen trato ,en la cultura de la paz libre de toda forma de violencia en la comunidad educativa Bolívar.
</p>
    </div>
    <img src="../imagenespro/bolivar.jpg" alt="mision" />
  </div>

  <div class="separador"></div>

  <div class="bloque-grid">
    <img src="../imagenespro/logo.jpg" alt="vision" />
    <div>
      <h2>Visión</h2>
      <p>Ser una institución educativa líder y referente a nivel regional y nacional, destacada por su excelencia pedagógica, innovación educativa y compromiso con la formación integral de sus estudiantes. Aspiramos a ser reconocidos por promover valores éticos, sociales y culturales.</p>
    </div>
  </div>

  <div class="separador"></div>

  <div class="bloque-grid">
    <img src="../imagenespro/alumnos3.jpg" alt="comunidad" />
    <div>
      <h2>Nuestra Comunidad</h2>
      <p>La Unidad Educativa Bolivar está compuesta por estudiantes, docentes y familias comprometidas con una formación integral. Somos una comunidad viva, unida por los valores del respeto, la solidaridad y el amor al aprendizaje.</p>
    </div>
  </div>

  <div class="separador"></div>

  <div class="bloque-historia">
    <img src="../imagenespro/colegiobolivar.jpg" alt="Historia del Colegio" />
    <div>
      <h2>Historia del Colegio</h2>
      <p>
        La Unidad  Educativa “BOLIVAR”, fue fundado el 21 de Enero del año 1913, durante la presidencia del Dr. ELEODORO VILLAZON,  en la gestión del Dr. JUAN MISAEL SARACHO, como Ministro de Instrucción y del Dr. RAFAEL CAÑEDO, como Rector de la Universidad Mayor de San Simón, quienes posesionaron al primer Director Profesor  Víctor Rojas.
      </p>
    </div>
  </div>

  <div class="separador"></div>

  <section class="container">
    <h2>Ubicación</h2>
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3807.3876287077046!2d-66.15613852391586!3d-17.393175564353474!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x93e373f77dbd64c1%3A0xc21f43e4049f90dd!2sNal.%20Bolivar!5e0!3m2!1ses!2sbo!4v1759679300548!5m2!1ses!2sbo" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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
