<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            display: grid;
            grid-template-rows: 90px 90px 200px 60px 1000px ;
            grid-template-columns:4% 94% ;
            grid-template-areas:
            "iz pag"
            "iz barra_text"
            "iz caja_conteo"
            "iz espacio"
            "iz caja_tarea"
            
            ;
        }
        

       
         #barra_text{
            grid-area: barra_text;
            background-color: white;
            border-bottom: 2px solid #585858;
        }
        #enviar{
          padding: 15px;
          background-color: white;
          color: #5c5959;
          border: 2px solid #5c5959;
          border-radius: 24px;
          margin-top: 10px;
          font-size: 20px;
        }
        #puntos{
          position: absolute;
          top :60px;
          left: 190px;
          font-size: 25px;
          color: #5c5959;
        }
        #car{
          font-size: 50px;
          margin-left: 10px;
        }
        #caja_conteo{
            grid-area: caja_conteo;
             background-color: white;
             border-bottom: 2px solid #585858;
        }
        #descripcion_t{
              
          font-size: 30px;
             color: #46217f;
        }
      .entregado{
        font-size: 25px;
        color: #5c5959;
        margin-top: 20px;
        margin-left: 50px;
        border-right: 2px solid #585858;
      }
      .asignado{
        font-size: 25px;
        color: #5c5959;
        position: absolute;
        top:246px;
        left: 330px;
      
      }
      .evaluado{
        font-size: 25px;
        color: #5c5959;
        position: absolute;
        top:246px;
        left: 510px;
        
      }
      #espacio{
        grid-area: espacio;
      }
        #caja_tarea{
            grid-area: caja_tarea;
             background-color:white;
              display: grid;
    grid-template-rows: 100px 100px 100px 100px;
    grid-template-columns: 18% 18% 18% 18% 18%;
    grid-template-areas:
    "t_uno t_dos t_tres t_cuatro t_cinco"
    "t_uno t_dos t_tres t_cuatro t_cinco"
    "t_uno t_dos t_tres t_cuatro t_cinco"
    "t_uno t_dos t_tres t_cuatro t_cinco"
    
    ;
    gap: 20px;
        }


        #t_uno{
          grid-area: t_uno;
          background-color: rgb(220, 221, 222);
  border: 2px solid #949393;
          
        }
        #t_dos{
          grid-area: t_dos;
         background-color: rgb(220, 221, 222);
  border: 2px solid #949393;
        }
        #t_tres{
          grid-area: t_tres;
          background-color: rgb(220, 221, 222);
  border: 2px solid #949393;
        }
        #t_cuatro{
          grid-area: t_cuatro;
         background-color: rgb(220, 221, 222);
  border: 2px solid #949393;
        }
        #t_cinco{
          grid-area: t_cinco;
          background-color: rgb(220, 221, 222);
  border: 2px solid #949393;
        }
       .cajita_let{
         width: 45px;
  height: 45px;
    padding: 10px;
    background-color:rgb(127, 80, 230) ;
    border: rgb(70, 130, 208);
    color: #f9f9f9;
    border-radius: 50%;
    font-family: arial;
    font-size: 20px;
  margin-left: 130px;
  margin-top: 17px;
  cursor: pointer;

       }
       .nom_estudiante{
        margin-left: 10px;
        font-family: arial;
        font-size: 20px;
        color: #524f4f;
       }
       .espacio_archivo{
        padding: 75px;
        background-color: white;
       border: 2px solid #949393;
       margin-left: 78px;
       }
       .num_archivos{
         margin-left: 10px;
        font-family: arial;
        font-size: 20px;
        color: #524f4f;
       }
       .dato_entregado{
         margin-left: 10px;
        font-family: arial;
        font-size: 20px;
        color: #1ca445;
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
    <section id="barra_text">
      <button id="enviar">Enviar</button><p id="puntos">Puntos                <a id="car">✉︎</a></p>
    
    </section>
    <section id="caja_conteo">
      <p id="descripcion_t">Nombre de la tarea</p>
      <p class="entregado">Entregado<br><p class="entregado">34</p>
      <p class="asignado">Asignado<br><br class="asignado">34
      <p class="evaluado">Evaluado <br><br class="evaluado">34
    </section>
    <section id="espacio"></section>
     <main id="caja_tarea">
      <section id="t_uno">
         <button class="cajita_let">E</button><p class="nom_estudiante">Nombre completo del estudiante</p>
            <button class="espacio_archivo"></button>
            <p class="num_archivos">Num archivos adjuntos</p>
            <p class="dato_entregado">Entregado</p>
      </section>
      <section id="t_dos"><button class="cajita_let">E</button><p class="nom_estudiante">Nombre completo del estudiante</p>
            <button class="espacio_archivo"></button>
            <p class="num_archivos">Num archivos adjuntos</p>
            <p class="dato_entregado">Entregado</p></section>
      <section id="t_tres"><button class="cajita_let">E</button><p class="nom_estudiante">Nombre completo del estudiante</p>
            <button class="espacio_archivo"></button>
            <p class="num_archivos">Num archivos adjuntos</p>
            <p class="dato_entregado">Entregado</p></section>
      <section id="t_cuatro"><button class="cajita_let">E</button><p class="nom_estudiante">Nombre completo del estudiante</p>
            <button class="espacio_archivo"></button>
            <p class="num_archivos">Num archivos adjuntos</p>
            <p class="dato_entregado">Entregado</p></section>
      <section id="t_cinco"><button class="cajita_let">E</button><p class="nom_estudiante">Nombre completo del estudiante</p>
            <button class="espacio_archivo"></button>
            <p class="num_archivos">Num archivos adjuntos</p>
            <p class="dato_entregado">Entregado</p></section>

     </main>
         




        
</body>
</html>

