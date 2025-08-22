<?php
// header.php
?>
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
    }
  </style>
</head>
<body>
  <header>
    <div class="logo">
      <img src="https://scontent.fcbb2-2.fna.fbcdn.net/v/t39.30808-6/473241293_1141432101316623_1106823897021764500_n.jpg?..." alt="Logo" />
      <span>Colegio Bolivar</span>
    </div>
    <button class="menu-toggle" onclick="toggleMenu()">☰</button>
    <nav id="navMenu">
      <a href="inicio.php"><button>Inicio</button></a>

      <div class="submenu">
        <button>Nosotros ▾</button>
        <div class="submenu-content">
          <a href="nosotros.php?">Inicial</a>
          <a href="niveles.php?tipo=primaria">Primaria</a>
          <a href="niveles.php?tipo=secundaria">Secundaria</a>
          <a href="niveles.php?tipo=banda">Banda</a>
          <a href="plantel-docente.php">Plantel docente</a>
        </div>
      </div>

      <a href="admisiones.php"><button>Admisiones</button></a>
      <a href="noticias.php"><button>Noticias</button></a>
      <a href="infraestructura.php"><button>Infraestructura</button></a>
      <a href="Crear-Cuenta.php"><button>Crear cuenta</button></a>
    </nav>
  </header>

  <script>
    function toggleMenu() {
      document.getElementById("navMenu").classList.toggle("active");
    }
  </script>
</body>
</html>