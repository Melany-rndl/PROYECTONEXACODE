<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Panel de Clase</title>
  <style>
    body {
       display: grid;
            grid-template-rows: 95px 300px  650px ;
            grid-template-columns:4% 96% ;
            grid-template-areas:
            "iz pag"
            "iz alumnos "
            "iz profesores"
            
            
            ;
        font-family: Arial;
      background: white;
      
    }
      
    
   
    h2 {
      margin-bottom: 10px;
      color: #333;
    }

    section {
      background: #fff;
      border-radius: 8px;
      padding: 20px;
      margin-bottom: 30px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.1);
    }

    /* ===== PROFESORES ===== */
    #profesores ul {
      display: flex;
      flex-direction: column;
      gap: 8px;
      padding: 0;
      list-style: none;
    }

    #profesores li {
      display: flex;
      justify-content: space-between;
      align-items: center;
      background: #f0f0f0;
      padding: 8px 12px;
      border-radius: 6px;
    }

    #profesores a, #profesores button {
      margin-top: 15px;
      display: inline-block;
      text-decoration: none;
    }

    button {
      background: #4285f4;
      border: none;
      color: white;
      padding: 10px 16px;
      border-radius: 6px;
      cursor: pointer;
    }

    /* ===== ALUMNOS ===== */
    #alumnos header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 15px;
    }

    #alumnos ul {
      display: flex;
      flex-direction: column;
      gap: 8px;
      list-style: none;
      padding: 0;
    }

    #alumnos li {
      display: flex;
      justify-content: space-between;
      align-items: center;
      background: #f9f9f9;
      padding: 8px 12px;
      border-radius: 6px;
    }

    #alumnos li a {
      color: #4285f4;
      text-decoration: none;
      font-size: 0.9em;
    }

    #alumnos li a:hover {
      text-decoration: underline;
    }

  </style>
</head>
<body>
     <header id="pag">
        <?php  include ("cabezera.php")?>
        </header>
        <section id="iz">
          <?php  include ("estilo_menu.php")?>
  <div id="menuLateral">
   </section>
  <!-- Sección Profesores -->
  <section id="profesores">
    <h2>Profesores</h2>
    <ul>
      <li><span>Dania Rocio Lima Cabezas</span></li>
      <li><span>Narda Lara</span></li>
      <li><span>Liz Mariela Jaimez Cossio</span> <em>(Invitado)</em></li>
    </ul>
    <a href="#">Ver todo</a><br>
    <button>Habilitar el acceso para padres, madres o tutores</button>
  </section>

  <!-- Sección Alumnos -->
  <section id="alumnos">












    
   
      <h2>Alumnos</h2>
      <p>38 alumnos</p>
    

    <form>
      <label>
        <input type="checkbox" name="seleccionar_todos"> Seleccionar todos
      </label>
      <button type="submit">Acciones</button>
    </form>

    <ul>
      <li><span>Alvarez Tejada Alejandro</span> <a href="#">Invitar a padres</a></li>
      <li><span>Prado Pereira Anahi</span> <a href="#">Invitar a padres</a></li>
      <li><span>Uribe Guillen Andres</span> <a href="#">Invitar a padres</a></li>
      <li><span>Garcia Ortulio Angel</span> <a href="#">Invitar a padres</a></li>
      <li><span>Solis Saavedra Araceli</span> <a href="#">Invitar a padres</a></li>
      <li><span>Morisett Rojas Ariana</span> <a href="#">Invitar a padres</a></li>
      <li><span>Escobari Aguilar Asel</span> <a href="#">Invitar a padres</a></li>
      <li><span>Torrico Pinto Camila</span> <a href="#">Invitar a padres</a></li>
      <li><span>Mejia Romero Carmen</span> <a href="#">Invitar a padres</a></li>
      <li><span>Olivera Cortez Clariss</span> <a href="#">Invitar a padres</a></li>
      <li><span>Quiroga Saavedra Cristin</span> <a href="#">Invitar a padres</a></li>
      <li><span>Molina Vidaurre Denira</span> <a href="#">Invitar a padres</a></li>
    </ul>
  </section>
  
</body>
</html>