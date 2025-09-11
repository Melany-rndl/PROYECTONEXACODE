<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>


:root {
      --celeste: #385da8;
      --gris-claro: #f4f4f4;
      --gris-oscuro: #3d3d3d;
      --azul: rgb(104, 125, 226);
      --negro: #1c1c1c;
      --blanco: #fff;
      --morado: rgb(35, 91, 245);
    }


          body{
            display: grid;
    grid-template-rows: 95px 210px 200px 280px 300px ;
    grid-template-columns: 4% 71% 24% ;
    grid-template-areas:
    "iz pag pag"
    "iz barratextouno general"
    "iz espacio general"
    "iz barratextodos general   "
    "iz pie general "
   
    ;
   
        }


      @media(max-width:730px){
    body{
    display: grid;
    grid-template-rows: 100px 200px 200px 300px 40px;
    grid-template-columns:  1% 99%;
    grid-template-areas:
    " iz pag "
    " iz barratextouno  "
    "  iz espacio "
    "  iz barratextodos "
    " iz general "
    " iz general  "
     " iz pie  ";
   
   
       }




}
       


     
   
















       




    #barratextouno{
        grid-area: barratextouno;
        background-color: white;
        border-bottom: 2px solid #666565;
    }
    #t{
      font-size: 36px;
      border: none;
      background-color: white;
       margin-top: 30px;
       margin-left: 28px;
    }


    #nomprof{
        font-family: arial;
        color: #666565;
        font-size: 20px;
        margin-left: 28px;
    }
   #fechapublicacion{
    font-family: arial;
        color: #666565;
        font-size: 20px;
        margin-left: 130px;
       
   }
   #fechaentrega{
     font-family: arial;
        color: #385da8;
        font-size: 20px;
        margin-left: 900px;
   }


   #espacio{
    grid-area:espacio;
   }
   #ins{
    font-family: arial;
        color: #666565;
        font-size: 20px;
        margin-left: 30px;
   }


    #barratextodos{
        grid-area: barratextodos;
        background-color: white;
    }
    #general{
        grid-area: general;
  display: grid;
    grid-template-rows: 300px 270px ;
    grid-template-columns: 90%;
    grid-template-areas:
    "cajauno"
    "cajados"
   
    ;
     gap: 50px;
        }
    #cajauno{
        grid-area: cajauno;
        margin-top: 40px;
        margin-left: 40px;
         background-color: white;
  border: 3px solid #949393;
  border-radius: 16px;
    }
   
    #trabajo {
        font-family: arial;
        font-size: 30px;
        color: #3c3c3c;
        margin-left: 25px;
    }
   
    #adjunt{
    color:rgb(94, 44, 116);
            background: white;
            border: 4px solid rgb(86, 59, 98) ;
            border-radius: 20px ;
            font-size: 20px;
            padding: 15px;
             margin-left: 40px;
             margin-top: 0px;
             cursor: pointer;
             transition: all 3s ;
             
    }
     #adjunt:hover{
       color:white;
       background-color:  rgb(86, 59, 98);
     }
    #arch{
          margin-left: 24px;
          margin-top:40px;
        padding: 40px;
         border: 2px solid rgba(88, 86, 88, 1) ;
        padding-left: 390px;
        padding-top: 60px;
        border-radius:30px;
    }
   
    #marcar{
        color: white;
            background:rgb(86, 59, 98);
            border: 2px solid rgb(86, 59, 98);
            border-radius: 20px;
            font-size: 20px;
            padding: 15px;
             margin-left: 30px;
             margin-right: 30px;
             cursor: pointer;
             margin-top: 10px;
              transition: all 3s ;
    }


    #marcar:hover{
color:  rgb(86, 59, 98);
 background-color:white;


    }














     #cajados{
        grid-area: cajados;
         margin-left: 40px;
          background-color: white;
  border: 3px solid rgb(94, 44, 116);
  border-radius: 16px;
   transition: all 3s ;
    }
    #cajados:hover{
        background-color: rgba(184, 162, 216, 1);
    }
    #puntaje{
        font-family: arial;
        font-size: 28px;
        color: rgb(95, 37, 112);
        margin-left: 60px;
    }
    #vale{
        font-family: arial;
        font-size: 28px;
        color: #3c3c3c;
        margin-left: 60px;
    }
    #puntos{
        font-family: arial;
        font-size: 28px;
        color: #3c3c3c;
        margin-left: 60px;
    }
    #pie{
        grid-area: pie;
        background-color: rgb(255, 255, 255);
        margin-top: 280px;
    }
 
    .container {
      max-width: 1000px;
      margin: 2rem auto;
      padding: 0 1rem;
      display: grid;
      gap: 2rem;
    }


    .class-card, .materials, .tasks {
      background-color: white;
      border-radius: 12px;
      padding: 1.5rem;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
    }


    .class-card h3,
    .materials h3,
    .tasks h3 {
      color: var(--celeste);
      margin-bottom: 1rem;
    }


    .comment-box {
      display: grid;
      grid-template-columns: 1fr auto;
      gap: 1rem;
    }


    .comment-box textarea {
      padding: 0.6rem;
      height: 60px;
      border-radius: 8px;
      border: 1px solid #ccc;
      resize: vertical;
      font-family: 'Roboto', sans-serif;
    }


    .comment-box button {
      background-color: var(--azul);
      color: white;
      border: none;
      padding: 0.6rem 1.2rem;
      border-radius: 8px;
      cursor: pointer;
      font-weight: bold;
    }


    .comment-box button:hover {
      background-color: var(--morado);
    }


    .comment-list {
      margin-top: 1rem;
      display: grid;
      gap: 1rem;
    }


    .comment-item {
      background-color: var(--gris-claro);
      padding: 1rem;
      border-left: 4px solid var(--azul);
      border-radius: 10px;
      white-space: pre-wrap;
      word-wrap: break-word;
      overflow-wrap: break-word;
      max-width: 100%;
      width: 100%;
      overflow: hidden;
    }




#menuLateral {
  display: none;
  flex-direction: column;
  background-color: #f4f4f4;
  border-right: 2px solid #ccc;
  padding: 20px;
  position: absolute;
  top: 80px;
  left: 0;
  width: 200px;
  height: calc(100vh - 80px);
  z-index: 1000;
  box-shadow: 2px 0 5px rgba(0,0,0,0.1);
}


#menuLateral a {
  text-decoration: none;
  color: #3d3d3d;
  font-family: Arial, sans-serif;
  padding: 10px 0;
  font-size: 18px;
  border-bottom: 1px solid #ccc;
}


#menuLateral a:hover {
  color: #385da8;
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
   <section id="barratextouno">
      <button id="t">📝</button> <strong id="nomtarea">NOMBRE DE LA TAREA</strong>
      <p id="nomprof">nombre del profesor  <a id="fechapublicacion">• fecha publicadion</a></p>
      <p id="fechaentrega"><strong>fecha de entrega : 15 de ago</strong> </p>
    </section>
    <section id="espacio">
        <p id="ins"> Instrucciones de la tarea</p><br>
        <br>
        <br>
       
        <buton id="arch"></buton>
    </section>
   <section id="barratextodos">


   <div class="container">


    <div class="class-card">
      <h3>👥 nombre de la persona</h3><h3>• fecha publicadion</h3>
      <div class="comment-box">
        <textarea id="comentario" placeholder="Escribe un comentario..."></textarea>
        <button onclick="publicarComentario()">Publicar</button>
        <button onclick="publicarComentario()">Editar</button>
      </div>
      <div class="comment-list" id="listaComentarios"></div>
    </div>






   </section>
   <main id="general">
    <section id="cajauno">
        <p id="trabajo">Tu entrega</p>
        <button id="adjunt"><strong> + Añadir o crear</strong></button>
        <button id="marcar"> Marcar como completado</button>
    </section>
    <section id="cajados">
        <p id="puntaje"><stong>☑︎ PUNTAJE</stong></p>
    <p id="vale">vale por :</p>
    <p id="puntos">100 puntos</p>
    </section>
   
   </main>
   <footer id="pie">
    © 2025 Nexa Classroom. Todos los derechos reservados.
  </footer>


 




  <script>
    function publicarComentario() {
      const texto = document.getElementById("comentario").value.trim();
      if (texto !== "") {
        const lista = document.getElementById("listaComentarios");
        const nuevoComentario = document.createElement("div");
        nuevoComentario.className = "comment-item";
        nuevoComentario.textContent = texto;
        lista.prepend(nuevoComentario);
        document.getElementById("comentario").value = "";
      }
    }


  </script>


</body>
</html>


