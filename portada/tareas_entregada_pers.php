<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Document</title>
<style>
    body{
        display: grid;
        grid-template-rows: 95px 100px 100px 730px ;
        grid-template-columns:4% 76% 20% ;
        grid-template-areas:
            " iz pag pag"
            " iz nom nom"
            "iz iconos datos"
            "iz fondo datos";
    }
      @media  (max-width: 768px) {
  body {
    grid-template-rows: 115px 200px 400px 100px 600px;
    grid-template-columns: 99%;
    grid-template-areas:
      "  pag "
      "  nom "
      "  datos"
      " iconos "
      " fondo ";
  }
  #img{
        padding-left: 100px;
        padding-bottom:50px ;
        margin-left: 20px;
    }
  }


    #nom{
        grid-area: nom;
        background-color: white;
        border-bottom: 2px solid #5c5959;
    }


    #nom_tarea{
        font-size: 25px;
        color: #5c5959;
        border-right: 2px solid #585858;
        font-family: arial;
    }


    #letra{
        width: 45px;
        height: 45px;
        padding: 15px;
        background-color:rgb(127, 80, 230) ;
        border: rgb(70, 130, 208);
        color: #f9f9f9;
        border-radius: 55%;
        font-family: arial;
        font-size: 20px;
        margin-left: 20px;
        cursor: pointer;
    }


    #nom_persona{
        font-size: 25px;
        color: #5c5959;
        font-family: arial;
    }


    #entregado{
        font-family: arial;
        font-size: 20px;
        color: #1ca445;
        margin-left: 20px;
    }


    #dev{
        font-size: 18px;
        font-family: arial;
        color: white;
        padding: 15px;
        margin-left: 1220px;
        margin-bottom:80px;
       
     
        border-radius: 30px;
        border: 2px solid #538bab ;
        background-color:#538bab ;
    }


    #iconos{
        grid-area: iconos;
        background-color: rgb(30, 28, 28);
    }


    #arch{
        margin-top: 15px;
        margin-left: 10px;
        font-size: 35px;
    }


    #nombre_archivo{
        font-size: 20px;
        color: white;
        font-family: arial;
    }


    #im{
        font-size: 40px;
        margin-left:700px;
        cursor: pointer;
    }


    #desc{
        font-size: 40px;
        margin-left: 50px;
        cursor: pointer;
    }


    #fondo{
        grid-area: fondo;
        background-color: rgb(30, 28, 28);
    }


    #img{
        padding-left: 900px;
        padding-bottom:400px ;
        margin-left: 70px;
    }


    #datos{
        grid-area: datos;
        background-color: white;
    }


    #ar{
        font-size: 20px;
        color: #5c5959;
        font-family: arial;
        margin-left: 30px;
    }


    #fecha_entrega{
        font-size: 20px;
        color: #5c5959;
        font-family: arial;
        margin-left: 30px;
    }


    #barra_arch{
        padding-left: 40px;
        padding-bottom: 30px;
        font-size: 25px;
        border-top: 2px solid #7e7e7e;
        border-bottom: 2px solid #7e7e7e;
        color:  #5c5959;
        font-family: arial;
    }


    #calif{
        padding-left: 40px;
        padding-bottom: 60px;
        font-size: 30px;
        color: #5c5959;
        border-bottom: 2px solid #5c5959;
        font-family: arial;
    }


    #puntaje{
        font-size: 30px;
        font-family: arial;
        color: #5c5959;
        padding: 20px;
        margin-top: 24px;
        padding-left: 50px;
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
<section id="nom">
    <p id="nom_tarea">Nonmbre de la tarea <a id="letra">E</a> <a id="nom_persona">Nombre de la persona</a>    
    <a id="entregado"> Entregado </a> <button id="dev">Devolver</button></p>
</section>


<section id="iconos">
    <p id="arch">📂<a id="nombre_archivo">Nombre.archivo</a><a id="im">🖨️​</a><a id="desc">📥​</a></p>
</section>


<section id="fondo">
    <button id="img"></button>
</section>


<section id="datos">
    <p id="ar">Archivos</p>
    <p id="fecha_entrega">Entrega:7 de mayo del 2025</p>
    <p id="barra_arch"><a id="b_arch">📂</a>a.png</p>
    <p id="calif">Calificacion
        <br><button id="puntaje">     /100</button>
    </p>
</section>
</body>
</html>


