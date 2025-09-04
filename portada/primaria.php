<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cursos - Primaria</title>
    <style>
         :root {
      --azul-institucional: #005487;
      --crema: rgb(247, 244, 240);
      --gris-suave: #e0e0e0;
      --marron: #8b5e3c;
      --negro: #333;
         }
       
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f5f7fa;
            margin: 0;
           
        }


        h1 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 70px;
            font-size:50px;
        }


        .contenedor {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 20px;
            max-width: 1200px;
            margin: auto;
        }


        .card {
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            overflow: hidden;
            transition: transform 0.3s;
        }


        .card:hover {
            transform: translateY(-5px);
        }


        .card img {
            width: 100%;
            height: 180px;
            object-fit: cover;
        }


        .card-content {
            padding: 20px;
        }


        .card-content h2 {
            color: #34495e;
            margin-top: 0;
            font-size: 20px;
        }


        .card-content p {
            color: #555;
            font-size: 15px;
            line-height: 1.5;
        }


        .info {
            margin-top: 10px;
            font-size: 14px;
            color: #666;
        }


        .info strong {
            color: #2c3e50;
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


     #espacio {
      height: 40px;
      background-color: #f5f7fa;
      margin: 2rem 0;
    }
     #espacio {
      height: 40px;
      background-color: #f5f7fa;
      margin: 2rem 0;
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
  <?php include 'h.php';?>


    <h1>Grados de Primaria</h1>


    <div class="contenedor">


        <div class="card">
            <img src="https://images.pexels.com/photos/5905700/pexels-photo-5905700.jpeg" alt="Primero de primaria">
            <div class="card-content">
                <h2>1ro de Primaria</h2>
                <p>Introducción a la lectura, escritura y operaciones matemáticas básicas, fomentando el trabajo en equipo y la curiosidad.</p>
                <div class="info">
                    <p><strong>Horario:</strong> 8:00 am - 12:30 pm</p>
                    <p><strong>Docente:</strong> Prof. Juan Pérez</p>
                </div>
            </div>
        </div>


        <div class="card">
            <img src="https://images.pexels.com/photos/8612924/pexels-photo-8612924.jpeg" alt="Segundo de primaria">
            <div class="card-content">
                <h2>2do de Primaria</h2>
                <p>Refuerzo en lectura comprensiva, suma y resta avanzada, iniciación en ciencias naturales y formación cívica.</p>
                <div class="info">
                    <p><strong>Horario:</strong> 8:00 am - 12:30 pm</p>
                    <p><strong>Docente:</strong> Prof. Laura Fernández</p>
                </div>
            </div>
        </div>


        <div class="card">
            <img src="https://images.pexels.com/photos/5905715/pexels-photo-5905715.jpeg" alt="Tercero de primaria">
            <div class="card-content">
                <h2>3ro de Primaria</h2>
                <p>Multiplicación, división, ciencias, historia y talleres creativos que fortalecen el pensamiento lógico y la expresión oral.</p>
                <div class="info">
                    <p><strong>Horario:</strong> 8:00 am - 12:30 pm</p>
                    <p><strong>Docente:</strong> Prof. Carlos Gutiérrez</p>
                </div>
            </div>
        </div>


        <div class="card">
            <img src="https://images.pexels.com/photos/5212326/pexels-photo-5212326.jpeg" alt="Cuarto de primaria">
            <div class="card-content">
                <h2>4to de Primaria</h2>
                <p>Desarrollo de proyectos de ciencias, lectura avanzada, fracciones y geografía, fortaleciendo el trabajo en equipo.</p>
                <div class="info">
                    <p><strong>Horario:</strong> 8:00 am - 12:30 pm</p>
                    <p><strong>Docente:</strong> Prof. Ana Morales</p>
                </div>
            </div>
        </div>


        <div class="card">
            <img src="https://images.pexels.com/photos/8500306/pexels-photo-8500306.jpeg" alt="Quinto de primaria">
            <div class="card-content">
                <h2>5to de Primaria</h2>
                <p>Énfasis en pensamiento crítico, resolución de problemas matemáticos, ciencias experimentales e historia.</p>
                <div class="info">
                    <p><strong>Horario:</strong> 8:00 am - 12:30 pm</p>
                    <p><strong>Docente:</strong> Prof. María López</p>
                </div>
            </div>
        </div>


        <div class="card">
            <img src= "quinto-sexto-de-primaria-w.jpg" alt="Sexto de primaria">
            <div class="card-content">
                <h2>6to de Primaria</h2>
                <p>Preparación para secundaria, pensamiento analítico, redacción avanzada y proyectos integradores interdisciplinarios.</p>
                <div class="info">
                    <p><strong>Horario:</strong> 8:00 am - 12:30 pm</p>
                    <p><strong>Docente:</strong> Prof. Pedro Sánchez</p>
                </div>
            </div>
        </div>


    </div>
     <div id="espacio"> </div>



<?php include 'footer.php'; ?>





  <script>
    function toggleMenu() {
      const nav = document.getElementById('navMenu');
      nav.classList.toggle('active');
    }
</script>
</body>
</html>


