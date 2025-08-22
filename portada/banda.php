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


    /* Sección Banda Estudiantil */
    .banda-section {
      background: white;
      padding: 3rem 1rem;
      text-align: center;
      color:rgba(0, 84, 135, 0.8);
    }


    .banda-section h2 {
      font-size: 2rem;
      font-weight: bold;
      color: rgba(0, 84, 135, 0.8);
      margin-bottom: 1rem;
    }


    .banda-section p {
      font-size: 1rem;
      max-width: 800px;
      margin: 0 auto 2rem;
      line-height: 1.6;
    }


    .banda-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
      gap: 1rem;
    }


    .banda-item {
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
      transition: all;
    }
 .banda-item:hover{
     transform: scale(1.03);
      box-shadow: 0 8px 16px rgba(0,0,0,0.2);
 }




    .banda-item img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      display: block;
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
  </style>
</head>
<body>
    <?php include 'h.php';?>

  <div class="banda-section">
    <h2>BANDA ESTUDIANTIL</h2>
    <p>
      Con el apoyo del Consejo de Administración, el esfuerzo y sacrificio de los padres y sobre todo de los estudiantes se ha relanzado nuestra Banda Estudiantil, potenciada con la incorporación de más integrantes y la dotación de nuevos instrumentos.
    </p>
    <div class="banda-grid">
      <div class="banda-item">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRSV9Jq2ZePn-HauYDvusn5FzO8N8KgIDLuWw&s" alt="Banda de Guerra" />
      </div>
      <div class="banda-item">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcROTF2B9EzYxOGtmbT7zj1XnlkBLdHskOfRSA&s" alt="Innovación Banda" />
      </div>
      <div class="banda-item">
        <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEgXOH3oAYcmwidGC_N75WJtYmPvGQt6WISpEER0uEGljR-OMr3QlcakHNhbI0qUU-vElKk3V7WZFX5GUgEuPn8MP-rEYlvsNcs338kwqLQ4llXGQGytrPaFswTRJ9IIa4lrEfKAXiNEB9w/s1600/bolivar.jpg" alt="Desfile" />
      </div>
      <div class="banda-item">
        <img src="https://www.areacucuta.com/wp-content/uploads/2013/02/bolivar1.jpg" alt="Marcha Banda" />
      </div>
    </div>
  </div>

<?php include 'footer.php'; ?>

  <script>
    function toggleMenu() {
      const nav = document.getElementById('navMenu');
      nav.classList.toggle('active');
    }
  </script>
</body>
</html>
