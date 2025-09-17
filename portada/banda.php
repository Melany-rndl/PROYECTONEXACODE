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
        <img src="../imagenespro/banda.jpg" alt="Marcha Banda" />
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
