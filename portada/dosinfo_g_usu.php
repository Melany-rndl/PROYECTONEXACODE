<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>  
    
     body{
            display: grid;
            grid-template-rows: 90px 150px 300px 450px ;
            grid-template-columns:4% 96% ;
            grid-template-areas:
            "iz pag"
            "iz tit "
             "iz presentacion "
            "iz datos"
            
            
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
      #datos{
        grid-area: datos;
        display: grid;
            grid-template-rows: 460px ;
            grid-template-columns:48% 48%;
            grid-template-areas:
            "dato_uno dato_dos"
            
            
            
            ;
            gap: 60px;
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
        margin-left: 14px;
        color: #282727;
    }
    .is{
        font-family: arial;
        font-size: 18px;
        margin-left: 434px;
        color: #585858;
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
<section id="tit">
    <p id="t_uno">Perfil usuario-Nombre del usuario</p>
    <p id =t_dos>Creado:Nombre del creador  Fecha 00/00/00 <a id="t_tres">Modificado:Nombre del creador  Fecha 00/00/00</a></p> 
</section>

<section id="presentacion">
    <p class="t_cinco">Ingrid Vazquez</p>
     <p class="t_cinco">Analista contable</p>
      <p class="t_cinco">activo</p>
</section>

<main id="datos">
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
    
    <section id="dato_dos">
        <p class="d_uno">Datos de oficina </p>

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
 
   
</main>


</body>
</html>