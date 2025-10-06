<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admisiones - Colegio Bojanowski</title>
  <style>
    :root {
      --azul-institucional: #005487;
      --crema: rgb(247, 244, 240);
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
      grid-template-rows: auto auto auto;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 1.5rem;
    }
    .paso-box {
      background-color: white;
      padding: 1.5rem;
      border-radius: 10px;
      box-shadow: 0 3px 10px rgba(0,0,0,0.1);
      text-align: center;
      opacity: 0;
      transform: translateY(30px);
      animation: fadeInUp 0.8s forwards;
      transition: all 0.3s ease;
    }
    .paso-box img {
      height: 70px;
      margin-bottom: 1rem;
      transition: transform 0.3s ease;
    }
    .paso-box h3 {
      color: var(--marron);
      margin-bottom: 0.5rem;
    }
    /* Efecto hover */
    .paso-box:hover {
      transform: translateY(-10px) scale(1.03);
      box-shadow: 0 8px 20px rgba(0,0,0,0.2);
    }
    .paso-box:hover img {
      transform: rotate(-5deg) scale(1.1);
    }
    @keyframes fadeInUp {
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
    .pie {
      grid-column: 1 / -1;
      text-align: center;
      font-style: italic;
      margin-top: 1rem;
    }
  </style>
</head>
<body>

  <?php include 'h.php';?>

  <section class="section">
    <h2>Proceso de Admisión</h2>
    <div class="grid-area-admisiones">

      <div class="paso1 paso-box">
        <img src="solicitud.png" alt="Solicitud">
        <h3>1. Solicitud</h3>
        <p>Completa el formulario de admisión online o en secretaría.</p>
      </div>

      <div class="paso2 paso-box">
        <img src="entrevista.png" alt="Entrevista">
        <h3>2. Entrevista</h3>
        <p>Reunión con el equipo pedagógico y los tutores.</p>
      </div>

      <div class="paso3 paso-box">
        <img src="evaluacion.png" alt="Evaluación">
        <h3>3. Evaluación</h3>
        <p>Diagnóstico para conocer fortalezas y necesidades del postulante.</p>
      </div>

      <div class="paso4 paso-box">
        <img src="resultado.png" alt="Resultado">
        <h3>4. Resultado</h3>
        <p>Entrega del resultado del proceso de selección.</p>
      </div>

      <div class="paso5 paso-box">
        <img src="documentacion.png" alt="Documentación">
        <h3>5. Documentación</h3>
        <p>Entrega de los requisitos legales y médicos.</p>
      </div>

      <div class="paso6 paso-box">
        <img src="inscripcion.png" alt="Inscripción">
        <h3>6. Inscripción</h3>
        <p>Pago de matrícula e inscripción oficial del estudiante.</p>
      </div>

      <div class="pie">
        <p>Para más información, contáctanos o visita nuestras oficinas.</p>
      </div>

    </div>
  </section>

  <?php include 'footer.php';?>

</body>
</html>
