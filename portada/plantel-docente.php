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

    .refran {
      background-color: white;
      color:#005487;
      text-align: center;
      padding: 5rem 2rem;
      font-size: 2rem;
      font-style: italic;
    }

   
     .separador {
      height: 40px;
      background-color: white;
      margin: 2rem 0;
    }

.directores-section {
    background: white;
    padding: 3rem 2rem;
    text-align: center;
  }
  .directores-section h2 {
    font-family: 'Georgia', serif;
    font-size: 2rem;
    margin-bottom: 2rem;
    color: var(--azul-institucional);
  }
  .directores-grid {
    display: flex;
    flex-wrap: wrap;
    gap: 2rem;
    justify-content: center;
  }
  .director-card {
    background: #fff;
    border-radius: 10px;
    padding: 1rem;
    width: 220px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    transition: transform 0.3s ease;
  }
  .director-card:hover {
    transform: translateY(-5px);
  }
  .director-img {
    width: 160px;
    height: 160px;
    object-fit: cover;
    border-radius: 50%;
    margin-bottom: 1rem;
    border: 4px solid var(--azul-institucional);
  }
  .director-card h3 {
    font-size: 1.1rem;
    font-weight: bold;
    margin-bottom: 0.5rem;
  }
  .director-card p {
    font-size: 0.9rem;
    color: var(--negro);
    font-weight: bold;
  }

  </style>
</head>
<body>
  <?php include 'h.php';?>

  <div class="refran">
    PLANTEL DOCENTE
  </div>

<div class="directores-section">
  <h2>NUESTRO PLANTEL DOCENTE ESTA CONFORMADO POR </h2>
  <div class="directores-grid">
    <div class="director-card">
      <img class="director-img" src="https://educacion.editorialaces.com/wp-content/uploads/2020/08/El-director-de-la-escuela-ENTRADA.jpg" alt="Padre Juan Aparicio">
      <h3>Nombre de la persona</h3>
      <p>DIRECTOR GENERAL<br>U.E. Bolivar</p>
    </div>
    <div class="director-card">
      <img class="director-img" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTBqtLrRfI5z7_O_tjEz_D2mjxbJTKTWNGtxw&s" alt="Gonzalo Osinaga">
      <h3>Nombre de la persona</h3>
      <p>DIRECTOR SECUNDARIA<br>TURNO MAÑANA</p>
    </div>
    <div class="director-card">
      <img class="director-img" src="https://uneg.edu.mx/wp-content/uploads/2023/06/P4-min.jpg" alt="German Sucre">
      <h3>Nombre de la persona</h3>
      <p>DIRECTOR PRIMARIA<br>TURNO MAÑANA</p>
    </div>
    <div class="director-card">
      <img class="director-img" src="../imagenespro/director1.jpg" alt="Humberto Guarachi">
      <h3>Nombre de la persona</h3>
      <p>DIRECTOR U.E.<br>Bolivar</p>
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






