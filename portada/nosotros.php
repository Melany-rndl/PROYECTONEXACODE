<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Nosotros - Colegio Bojanowski</title>
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
      padding: 4rem 2rem;
      max-width: 1100px;
      margin: auto;
      transition: all;
    }
    .section:hover{
        background-color: rgb(157, 223, 245);
    }
    .section h2 {
      font-family: 'Georgia', serif;
      font-size: 2.2rem;
      color: var(--azul-institucional);
      margin-bottom: 1rem;
      text-align: center;
     
    }

    .nivel {
      display: flex;
      flex-wrap: wrap;
      margin-bottom: 3rem;
      align-items: center;
      gap: 2rem;
      background-color: white;
      padding: 2rem;
      border-radius: 10px;
      box-shadow: 0 0 8px rgba(0,0,0,0.1);
    }


    .nivel img {
      flex: 1 1 300px;
      max-width: 350px;
      border-radius: 10px;
      transition: all;
     
    }

    .nivel img:hover{
         transform: scale(1.03);
      box-shadow: 0 8px 16px rgba(0,0,0,0.2);
    }
    .nivel-texto {
      flex: 2;
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


  <div class="hero">
    <div class="carousel">
      <img src="https://assets.puzzlefactory.com/puzzle/304/471/original.jpg" />
      <img src="https://wychowanie.siostry.net/wp-content/uploads/2022/03/bl.edmund-s.m.-agnela-1999-ochronka-otrebusy.jpg" />
      <img src="https://www.parafiaszewna.pl/uploaded/zdj%C4%99cia/ochronki.jpg" />
    </div>
  </div>


  <section class="section">
    <h2>Niveles Académicos</h2>


    <div class="nivel">
      <img src="https://illinoisearlylearning.org/wp-content/uploads/2015/04/milestones.jpg" alt="Inicial">
      <div class="nivel-texto">
        <h3>Inicial</h3>
        <p>En el nivel inicial ofrecemos una educación basada en el juego, la exploración y la estimulación temprana. Nuestro enfoque promueve la autonomía, el lenguaje, la motricidad y el trabajo en equipo. Los niños disfrutan de un entorno seguro y colorido donde descubren el placer de aprender.</p>
      </div>
    </div>


    <div class="nivel">
      <img src="https://www.tribunact.com/crop?src=%2Fuploads%2Fposts%2Fimg_1707843043812922625.jpg&w=1144&h=0&q=85" alt="Primaria">
      <div class="nivel-texto">
        <h3>Primaria</h3>
        <p>Durante la etapa primaria, nuestros estudiantes fortalecen habilidades académicas fundamentales como lectura, escritura, matemáticas y ciencias. A través de proyectos, talleres y experiencias vivenciales, cultivamos valores, pensamiento crítico y espíritu solidario.</p>
      </div>
    </div>


    <div class="nivel">
      <img src="https://media.istockphoto.com/id/1912511508/es/foto/retrato-de-estudiantes-de-secundaria-felices-mirando-a-la-c%C3%A1mara.jpg?s=612x612&w=0&k=20&c=j8jqii-5Kyj5dzKTvamDWGDvZcsXUNvCp8CfXJhs7kA=" alt="Secundaria">
      <div class="nivel-texto">
        <h3>Secundaria</h3>
        <p>La secundaria forma líderes responsables y conscientes de su rol en la sociedad. Ofrecemos una educación integral que incluye formación científica, humanística, tecnológica y ética, orientando a los jóvenes a descubrir sus talentos y prepararse para el mundo universitario y profesional.</p>
      </div>
    </div>


    <div class="nivel">
      <img src="https://www.unodc.org/images/bolivia/180927_Banda1.jpg" alt="Banda escolar">
      <div class="nivel-texto">
        <h3>Banda Escolar</h3>
        <p>Nuestra banda es orgullo institucional, integrada por estudiantes de distintos cursos. A través de la música desarrollan disciplina, trabajo en equipo y sensibilidad artística. Participamos en actos cívicos, desfiles y encuentros regionales, fomentando la identidad y el amor por nuestra cultura.</p>
      </div>
    </div>
  </section>


  <footer>
    <div class="footer-container">
      <div>
        <h3>Colegio Bojanowski</h3>
        <p>Educando con valores para transformar el mundo.</p>
      </div>
      <div>
        <h4>Contacto</h4>
        <p>📍 Calle Ficticia 123, Cochabamba - Bolivia</p>
        <p>✉️ <a href="mailto:contacto@colegiobojanowski.edu.bo">contacto@colegiobojanowski.edu.bo</a></p>
      </div>
      <div>
        <h4>Redes Sociales</h4>
        <p>
          <a href="https://facebook.com" target="_blank">📘 Facebook</a><br>
          <a href="https://instagram.com" target="_blank">📸 Instagram</a><br>
          <a href="mailto:contacto@colegiobojanowski.edu.bo">📩 Correo</a>
        </p>
      </div>
    </div>
    <hr>
    <p style="text-align:center; margin-top:1rem;">&copy; 2025 Colegio Bojanowski. Todos los derechos reservados.</p>
  </footer>


  <script>
    function toggleMenu() {
      const nav = document.getElementById('navMenu');
      nav.classList.toggle('active');
    }
  </script>
</body>
</html>