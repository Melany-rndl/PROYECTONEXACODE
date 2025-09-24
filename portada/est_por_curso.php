<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Panel de Clase</title>
  <style>
    body {
       display: grid;
            grid-template-rows: 95px 400px  650px ;
            grid-template-columns:4% 96% ;
            grid-template-areas:
            "iz pag"
            "iz alumnos "
            "iz profesores"
            
            
            ;
        font-family: Arial;
      background: white;
      
    }
      
      @media (max-width: 768px) {
    body {
      grid-template-columns: 100%;
      grid-template-rows: auto auto auto auto;
      grid-template-areas:
        "pag"
        "alumnos"
        "profesores"
        "iz";
      padding: 10px;
    }

    section {
      padding: 15px;
      margin-bottom: 15px;
    }

    #profesores li, #alumnos li {
      flex-direction: column;
      align-items: flex-start;
      gap: 5px;
    }

    #alumnos form {
      flex-direction: column;
      align-items: flex-start;
    }

    #alumnos p, #profesores a, button {
      font-size: 0.9em;
    }
  }

  

    /* ===== PROFESORES ===== */
    #profesores ul {
      display: flex;
      flex-direction: column;
      
      padding: 0;
   
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
      background: #664480ff;
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

    #alumnos li  {
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
        <?php  include ("dis_cabezera.php")?>
        </header>
        <section id="iz">
            <?php  include ("dis_menu.php")?>
  <div id="menuLateral">
  </div>
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
    <button>Ver tareas</button>
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
      <li><span>Alvarez Tejada Alejandro</span> </li>
      <li><span>Prado Pereira Anahi</span></li>
      <li><span>Uribe Guillen Andres</span> </li>
      <li><span>Garcia Ortulio Angel</span> </li>
      <li><span>Solis Saavedra Araceli</span> </li>
      <li><span>Morisett Rojas Ariana</span></li>
      <li><span>Escobari Aguilar Asel</span> </li>
      <li><span>Torrico Pinto Camila</span> </li>
      <li><span>Mejia Romero Carmen</span> </li>
      <li><span>Olivera Cortez Clariss</span> </li>
      <li><span>Quiroga Saavedra Cristin</span> </li>
      <li><span>Molina Vidaurre Denira</span> </li>
    </ul>
  </section>
  
</body>
</html>