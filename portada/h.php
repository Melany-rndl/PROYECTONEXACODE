<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Colegio Bojanowski</title>
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
      background-image: url("imagenespro/logo.jpg");
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
      align-items: center;
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
    .refran {
      background-color: var(--azul-institucional);
      color: white;
      text-align: center;
      padding: 5rem 2rem;
      font-size: 2rem;
      font-style: italic;
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
    }
    .bloque-grid img {
      width: 100%;
      border-radius: 10px;
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
      .submenu-content {
        position: static;
        box-shadow: none;
        min-width: 100%;
      }
      .submenu:hover .submenu-content {
        display: flex;
        flex-direction: column;
      }
      .bloque-grid {
        grid-template-columns: 1fr;
      }
    }
  </style>
</head>
<body>
  <header>
    <div class="logo">
      <img src="../imagenespro/logo.jpg" alt="Logo" />

      <span>Colegio Bolivar</span>
    </div>
    <button class="menu-toggle" onclick="toggleMenu()">☰</button>
    <nav id="navMenu">
      <a href="inicio.php"><button>Inicio</button></a>

      <div class="submenu">
        <button>Nosotros ▾</button>
        <div class="submenu-content">
          <a href="inicial.php">Inicial</a>
          <a href="primaria.php">Primaria</a>
          <a href="secundaria.php">Secundaria</a>
          <a href="banda.php">Banda</a>
          <a href="plantel-docente.php">Plantel docente</a>
        </div>
      </div>

      <a href="admisiones.php"><button>Admisiones</button></a>
      <a href="noticias.php"><button>Noticias</button></a>
      <a href="infraestructura.php"><button>Infraestructura</button></a>
      <a href="Crear-Cuenta.php"><button>Crear cuenta</button></a>
    </nav>
  </header>

  <div class="hero">
    <div class="carousel">
      <img src="../imagenespro/imgtinku.jpg" />
      <img src="../imagenespro/banda.jpg" />
      <img src="../imagenespro/estudiantes.jpg" />
    </div>
    <div class="hero-content">
      <h1>Unidad Educativa Bolivar</h1>
    </div>
  </div>

  <div class="refran">
    "El saber nos hace libres, y la educación nos guía hacia la verdad."
  </div>

  <script>
    function toggleMenu() {
      document.getElementById("navMenu").classList.toggle("active");
    }
  </script>
</body>
</html>

