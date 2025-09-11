<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            display: grid;
            grid-template-rows: 95px 90px 200px 60px 1000px ;
            grid-template-columns:4% 94% ;
            grid-template-areas:
            "iz pag"
            "iz barra_text"
            "iz caja_conteo"
            "iz espacio"
            "iz caja_tarea"
           
            ;
        }
      @media  (max-width: 768px) {
  body {
    grid-template-rows: 100px 100px 300px 80px 10000px;
    grid-template-columns: 100%;
    grid-template-areas:
      "pag"
      "barra_text"
      "caja_conteo"
      "espacio"
      "caja_tarea";
  }


 


  .cajita_let {
    margin-left: 10px;
  }


  #enviar {
    position: relative;
    top: 20px;
    font-size: 18px;
  }


  #puntos {
    position: relative;
    top: 0px;
    left: 0;
    display: block;
    margin-top: 45px;
  }
   .entregado{
      position: relative;
     
        right:40px;
      }
      .asignado{
        position: relative;
        right:400px;
       
     
      }
      .evaluado{
       
        position: absolute;
        top:706px;
        left: 510px;
      }
}
       
         #barra_text{
            grid-area: barra_text;
            background-color: white;
            border-bottom: 2px solid #585858;
        }
        #enviar{
          padding: 15px;
         background-color: #583d9cff;
          color: white;
          border: 2px solid #583d9cff ;
          border-radius: 24px;
          margin-top: 10px;
          font-size: 20px;
         
        }
        #puntos{
          position: absolute;
          top :80px;
          left: 190px;
          font-size: 25px;
          color: #5c5959;
        }
        #car{
          font-size: 50px;
          margin-left: 10px;
          margin-top :405px;
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
       
      }
      .asignado{
        font-size: 25px;
        color: #5c5959;
        position: absolute;
        top:260px;
        left: 250px;
     
      }
      .evaluado{
        font-size: 25px;
        color: #5c5959;
        position: absolute;
        top:260px;
        left: 380px;
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
 @media  (max-width: 768px) {
  #caja_tarea {
    grid-template-rows: 400px 400px 400px  400px   400px   ;
    grid-template-columns: 99%;
    grid-template-areas:
      "t_uno "
      "t_dos "
      "t_tres"
       "t_cuatro "
       "t_cinco"
       
  ;
  }
}


        #t_uno{
          grid-area: t_uno;
          background-color: rgb(220, 221, 222);
  border: 2px solid #949393;
  border-radius:30px;
  transition: all 3s ;
        }
        #t_dos{
          grid-area: t_dos;
         background-color: rgb(220, 221, 222);
  border: 2px solid #949393;
  border-radius:30px;
  transition: all 3s ;
        }
        #t_tres{
          grid-area: t_tres;
          background-color: rgb(220, 221, 222);
  border: 2px solid #949393;
  border-radius:30px;
   transition: all 3s ;
        }
        #t_cuatro{
          grid-area: t_cuatro;
         background-color: rgb(220, 221, 222);
  border: 2px solid #949393;
  border-radius:30px;
  transition: all 3s ;
        }
        #t_cinco{
          grid-area: t_cinco;
          background-color: rgb(220, 221, 222);
  border: 2px solid #949393;
  border-radius:30px;
transition: all 3s ;
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
        color:  #25a41cff;
       }


       #t_uno:hover{
       
        box-shadow:7px 3px 4px #9980b8ff;
       }
        #t_dos:hover{
       
        box-shadow:7px 3px 4px #9980b8ff;
       }
        #t_tres:hover{
       
        box-shadow:7px 3px 4px #9980b8ff;
       }
        #t_cuatro:hover{
       
        box-shadow:7px 3px 4px #9980b8ff;
       }
        #t_cinco:hover{
       
        box-shadow:7px 3px 4px #9980b8ff;
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
    <section id="barra_text">
      <button id="enviar">Enviar </button><p id="puntos">Puntos  <a id="car">✉︎</a></p>
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




