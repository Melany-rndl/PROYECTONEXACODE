<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>  
   
     body{
            display: grid;
            grid-template-rows: 80px 150px 340px 440px ;
            grid-template-columns:4% 96% ;
            grid-template-areas:
            "iz pag"
            "iz tit "
             "iz cont "
            "iz dato_uno"
           
           
            ;
        }
   
       


    #tit{
        grid-area: tit;
        background-color: white;
         border-bottom: 2px solid #585858;
    }  
    #t_uno{
        font-family: arial;
        font-size: 30px;
        margin-left: 15px;
        color: #385da8;
    }
   


    #t_dos{
       font-family: arial;
        font-size: 20px;
        margin-left: 15px;
        color: #585858;
    }


    #t_tres{
        font-family: arial;
        font-size: 20px;
        margin-left: 800px;
        color: #585858;
    }
   
   
      #presentacion{
        grid-area: presentacion;
        background-color: white;
    }  
       
     .t_cinco{
        font-family: arial;
        font-size: 30px;
        margin-left: 30px;
        color: #585858;
    }
      
       
       
       #dato_uno{
        grid-area: dato_uno;
        border: 3px solid #585858;
    background-color: white;
    border-radius: 50px;
    }
    #dato_dos{
        grid-area: dato_dos;
        border: 3px solid #585858;
    background-color: white;
    border-radius: 50px;
    
    }  
    .d_uno{
        font-family: arial;
        font-size: 28px;
        margin-left: 28px;
        color: #385da8;
    }
    .dere{
         font-family: arial;
        font-size: 18px;
        margin-left: 40px;
        color: #282727;
    }
    .is{
        font-family: arial;
        font-size: 18px;
        margin-left: 434px;
        color: #585858;
    }
    #personita{
        position: relative;
        top:20px;
        left:1000px;
    }
    #cont{
        grid-area: cont;

         display: grid;
            grid-template-rows: 340px 340px  ;
            grid-template-columns:50% 50% ;
            grid-template-areas:
            "presentacion seccion_p"
            
           
           
            ;
    }


     #seccion_p{
        grid-area: seccion_p;
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
<section id="tit">
    <p id="t_uno">Perfil usuario-Nombre del usuario</p>
    <p id =t_dos>Creado:Nombre del creador  Fecha 00/00/00 <a id="t_tres">Modificado:Nombre del creador  Fecha 00/00/00</a></p>
</section>

<main id="cont">
<section id="presentacion">
    <p class="t_cinco">Ingrid Vazquez</p>
     <p class="t_cinco">Analista contable</p>
      <p class="t_cinco">activo</p>
       
</section>
<section id="seccion_p">
<div id="personita">
     <img src="icono_persona.jpg" alt="imag icono persona" />
  </div>
</section>

</main>

    <section id="dato_uno"><p class="d_uno">Datos basicos </p>
   
    <p class="dere">Tipo de usuario <a class="is"> Resp Con accesor</a></p>
     <p class="dere">Codigo de usuario <a class="is"> Resp Con accesor</a></p>
      <p class="dere">Usuario de acceso <a class="is"> Resp Con accesor</a></p>
       <p class="dere">Usuario  <a class="is"> Resp Con accesor</a></p>
         <p class="dere">Genero <a class="is"> Resp Con accesor</a></p>
        <p class="dere">Cedula de identidad <a class="is"> Resp Con accesor</a></p>
         <p class="dere">Correo <a class="is"> Resp Con accesor</a></p>
          <p class="dere">Ubicacion<a class="is"> Resp Con accesor</a></p>
             <p class="dere">Cuenta vinculada<a class="is"> Resp Con accesor</a></p>
        </section>
   
   
    </section>
 
   





</body>
</html>
