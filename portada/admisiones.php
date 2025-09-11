<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admisiones - Colegio Bojanowski</title>
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
    .section {
      padding: 4rem 2rem;
      max-width: 1200px;
      margin: auto;
    }
    .section h2 {
      font-family: 'Georgia', serif;
      font-size: 2.5rem;
      color: var(--azul-institucional);
      margin-bottom: 2rem;
      text-align: center;
    }
    .grid-area-admisiones {
      display: grid;
      grid-template-rows: 100px 100px auto auto auto;
      grid-template-columns: 30% 50% 20%;
      grid-template-areas:
        "img1 img1 img1"
        "img2 img2 img2"
        "paso1 paso2 paso3"
        "paso4 paso5 paso6"
        "pie pie pie";
      gap: 1rem;
    }
    .img1 { grid-area: img1; }
    .img2 { grid-area: img2; }
    .paso1 { grid-area: paso1; }
    .paso2 { grid-area: paso2; }
    .paso3 { grid-area: paso3; }
    .paso4 { grid-area: paso4; }
    .paso5 { grid-area: paso5; }
    .paso6 { grid-area: paso6; }
    .pie { grid-area: pie; }
    .paso-box {
      background-color: white;
      padding: 1.5rem;
      border-radius: 10px;
      box-shadow: 0 0 8px rgba(0,0,0,0.1);
      text-align: center;
    }
    .paso-box img {
      height: 60px;
      margin-bottom: 1rem;
    }
    .paso-box h3 {
      color: var(--marron);
      margin-bottom: 0.5rem;
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
  .grid-area-admisiones {
    grid-template-columns: 1fr;
    grid-template-areas:
      "img1"
      "img2"
      "paso1"
      "paso2"
      "paso3"
      "paso4"
      "paso5"
      "paso6"
      "pie";
  }
}
  </style>
</head>
<body>
 
    <?php include 'h.php';?>
  <section class="section">
    <h2>Proceso de Admisión</h2>
    <div class="grid-area-admisiones">
      <div class="img1"></div>
      <div class="img2"></div>

      <div class="paso1 paso-box">
        <img src="https://cdn-icons-png.flaticon.com/512/3178/3178283.png" />
        <h3>1. Solicitud</h3>
        <p>Completa el formulario de admisión online o en secretaría.</p>
      </div>
      <div class="paso2 paso-box">
        <img src="https://cdn-icons-png.flaticon.com/512/3095/3095583.png" />
        <h3>2. Entrevista</h3>
        <p>Reunión con el equipo pedagógico y los tutores.</p>
      </div>
      <div class="paso3 paso-box">
        <img src="https://cdn-icons-png.flaticon.com/512/2910/2910791.png" />
        <h3>3. Evaluación</h3>
        <p>Diagnóstico para conocer fortalezas y necesidades del postulante.</p>
      </div>
      <div class="paso4 paso-box">
        <img src="https://cdn-icons-png.flaticon.com/512/3820/3820330.png" />
        <h3>4. Resultado</h3>
        <p>Entrega del resultado del proceso de selección.</p>
      </div>
      <div class="paso5 paso-box">
        <img src="https://cdn-icons-png.flaticon.com/512/2784/2784454.png" />
        <h3>5. Documentación</h3>
        <p>Entrega de los requisitos legales y médicos.</p>
      </div>
      <div class="paso6 paso-box">
        <img src="https://cdn-icons-png.flaticon.com/512/2285/2285572.png" />
        <h3>6. Inscripción</h3>
        <p>Pago de matrícula e inscripción oficial del estudiante.</p>
      </div>

      <div class="pie"><p style="text-align:center; font-style:italic;">Para más información, contáctanos o visita nuestras oficinas.</p></div>
    </div>
  </section>

 <?php include 'footer.php'; ?>
  <script>
    function toggleMenu() {
      document.getElementById('navMenu').classList.toggle('active');
    }
  </script>
</body>
</html>
