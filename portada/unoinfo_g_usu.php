<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>  
    
     body{
            display: grid;
            grid-template-rows: 80px 450px  450px ;
            grid-template-columns:4% 96% ;
            grid-template-areas:
            "iz pag"
            "iz cuenta "
            "iz cuadro"
            
            
            ;
        }
    
   
       
         #barra_text{
            grid-area: barra_text;
            background-color: white;
            border-bottom: 2px solid #585858;
        }
 #cuenta{
    grid-area: cuenta;
    background-color: white;

 }
 #letra{
        width: 55px;
  height: 55px;
    padding: 50px;
    background-color:rgb(127, 80, 230) ;
    border: rgb(70, 130, 208);
    color: #f9f9f9;
    border-radius: 80px;
    font-family: arial;
    font-size: 60px;
  margin-left: 840px;
  margin-top: 100pxpx;
 

 }
 #mensaje_b{
    font-family: arial;
    font-size: 40px;
    color: #3d3d3d;
    margin-left: 500px;
 }
 #mensaje_lar{
    font-family: arial;
    font-size: 30px;
    color: #585858;
    margin-left: 340px;
 }
 
 #cuadro{
    grid-area: cuadro;
    ;


    display: grid;
            grid-template-rows: 360px ;
            grid-template-columns:48% 48%;
            grid-template-areas:
            "cuadro_uno cuadro_dos"
            
            
            
            ;
            gap: 60px;
 }
  #cuadro_uno{
    grid-area: cuadro_uno;
    border: 3px solid #585858;
    background-color: white;
    border-radius: 50px;
 }
 .priv{
    font-family: arial;
    font-size: 35px;
    color: #3d3d3d;
    margin-left: 240px;
 }
 .m{
    font-family: arial;
    font-size: 30px;
    color: #585858;
    margin-left: 60px;
 }
  #cuadro_dos{
    grid-area: cuadro_dos;
    border: 3px solid #585858;
    background-color: white;
    border-radius: 50px;
 }
.div{
     border-top: 3px solid #608cb4;
     color:#608cb4; 
     font-size: 30px;
     font-family: arial;
     margin-left: 5px;
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
<section id="cuenta"><p id="letra">E</p>
<p id="mensaje_b">Te damos la bienvenida,Nombre de la persona</p>
<p id="mensaje_lar">Gestiona tu información,privacidad y seguridad para mejorat tu experiencia como usuario</p></section>

<main id="cuadro">
    <section id="cuadro_uno"><p class="priv">Privacidad y personalizacion</p>
    <p class="m">Consulta los datos de almacenamiento en 
       tu cuenta y elige que actividad se debe 
       guardar para personalizar tu experiencia
    </p>
  <p class="div">Gestionar tus datos y privacidad</p>
</section>
<section id="cuadro_dos"><p class="priv">Ten tu cuenta protegida</p>
<p class="m">La revicion de seguridad ha comprobado 
    tu cuenta y no ha encontarado ninguna 
     accion recomendada </p>
    <p class="div">Ver detalles</p></section>

   
</main>


</body>
</html>