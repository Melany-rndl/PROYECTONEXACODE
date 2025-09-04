<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cursos - Secundaria</title>
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
            margin-bottom: 40px;
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

    <h1>Grados de Secundaria</h1>


    <div class="contenedor">


        <div class="card">
            <img src="https://images.pexels.com/photos/3184663/pexels-photo-3184663.jpeg" alt="1ro de secundaria">
            <div class="card-content">
                <h2>1ro de Secundaria</h2>
                <p>Fortalecimiento de bases académicas en matemáticas, lenguaje y ciencias, con introducción a proyectos interdisciplinarios.</p>
                <div class="info">
                    <p><strong>Horario:</strong> 7:30 am - 12:30 pm</p>
                    <p><strong>Docente:</strong> Prof. Luis Ramírez</p>
                </div>
            </div>
        </div>


        <div class="card">
            <img src="https://images.pexels.com/photos/3184344/pexels-photo-3184344.jpeg" alt="2do de secundaria">
            <div class="card-content">
                <h2>2do de Secundaria</h2>
                <p>Desarrollo de pensamiento crítico, ciencias experimentales, historia nacional y participación en debates académicos.</p>
                <div class="info">
                    <p><strong>Horario:</strong> 7:30 am - 12:30 pm</p>
                    <p><strong>Docente:</strong> Prof. Carmen Morales</p>
                </div>
            </div>
        </div>


        <div class="card">
            <img src="https://images.pexels.com/photos/4145153/pexels-photo-4145153.jpeg" alt="3ro de secundaria">
            <div class="card-content">
                <h2>3ro de Secundaria</h2>
                <p>Enfoque en álgebra, química básica, literatura y participación en ferias científicas y artísticas.</p>
                <div class="info">
                    <p><strong>Horario:</strong> 7:30 am - 12:30 pm</p>
                    <p><strong>Docente:</strong> Prof. Javier Torres</p>
                </div>
            </div>
        </div>


        <div class="card">
            <img src="https://images.pexels.com/photos/4145351/pexels-photo-4145351.jpeg" alt="4to de secundaria">
            <div class="card-content">
                <h2>4to de Secundaria</h2>
                <p>Preparación académica avanzada con física, biología, redacción técnica y manejo de herramientas digitales.</p>
                <div class="info">
                    <p><strong>Horario:</strong> 7:30 am - 12:30 pm</p>
                    <p><strong>Docente:</strong> Prof. Andrea Medina</p>
                </div>
            </div>
        </div>


        <div class="card">
            <img src="https://images.pexels.com/photos/5212320/pexels-photo-5212320.jpeg" alt="5to de secundaria">
            <div class="card-content">
                <h2>5to de Secundaria</h2>
                <p>Énfasis en análisis científico, proyectos sociales, investigación y preparación para el ingreso a educación superior.</p>
                <div class="info">
                    <p><strong>Horario:</strong> 7:30 am - 12:30 pm</p>
                    <p><strong>Docente:</strong> Prof. Fernando Rojas</p>
                </div>
            </div>
        </div>


        <div class="card">
            <img src="https://images.pexels.com/photos/3184306/pexels-photo-3184306.jpeg" alt="6to de secundaria">
            <div class="card-content">
                <h2>6to de Secundaria</h2>
                <p>Consolidación de conocimientos, proyectos de grado, orientación vocacional y preparación para el bachillerato.</p>
                <div class="info">
                    <p><strong>Horario:</strong> 7:30 am - 12:30 pm</p>
                    <p><strong>Docente:</strong> Prof. Sofía Herrera</p>
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



