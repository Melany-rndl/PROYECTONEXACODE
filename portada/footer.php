<footer>
  <style>
    :root {
      --azul-institucional: #005487;
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
    hr {
      border-color: rgba(255, 255, 255, 0.3);
      margin-top: 2rem;
      margin-bottom: 1rem;
    }
    p {
      font-family: 'Segoe UI', sans-serif;
    }

    /* Estilo para el formulario */
    .sugerencias-form label {
      display: block;
      margin-top: 0.5rem;
      font-weight: bold;
    }
    .sugerencias-form input[type="text"],
    .sugerencias-form textarea {
      width: 100%;
      padding: 0.5rem;
      border-radius: 5px;
      border: none;
      margin-top: 0.3rem;
    }
    .sugerencias-form input[type="submit"] {
      margin-top: 0.7rem;
      background-color: white;
      color: var(--azul-institucional);
      border: none;
      padding: 0.6rem 1.2rem;
      font-weight: bold;
      cursor: pointer;
      border-radius: 5px;
    }
    .sugerencias-form input[type="submit"]:hover {
      background-color: #e5e5e5;
    }
  </style>

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
        <a href="https://facebook.com" target="_blank">📘 Facebook</a><br />
        <a href="https://instagram.com" target="_blank">📸 Instagram</a><br />
        <a href="mailto:contacto@colegiobojanowski.edu.bo">📩 Correo</a>
      </p>
    </div>

    <!-- Nuevo cuadro para sugerencias -->
    <div class="sugerencias-form">
      <h4>Enviar Sugerencias</h4>
      <form action="archivo2.php" method="post">
        <label>ASUNTO:</label>
        <input type="text" name="asuntito" required>
        <label>COMENTARIO:</label>
        <textarea name="come" rows="3" required></textarea>
        <input type="submit" value="Enviar">
      </form>  
    </div>
  </div>
  <hr />
  <p style="text-align:center; margin-top:1rem;">
    &copy; 2025 Colegio Bojanowski. Todos los derechos reservados.
  </p>
</footer>
