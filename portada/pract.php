<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>  
   
     body{
            display: grid;
            grid-template-rows: 80px 150px 300px 450px ;
            grid-template-columns:4% 96% ;
            grid-template-areas:
            "iz pag"
            "iz tit "
             "iz presentacion "
            "iz dato_uno"
           
           
            ;
        }
   
       
   @media(max-width:730px){
    body{
    display: grid;
    grid-template-rows: 100px 200px 200px 300px 850px;
    grid-template-columns:   99%;
    grid-template-areas:
    " pag"
    " tit "
    " presentacion "
    " dato_uno";
   
   
       }




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
    #personita{
        position: absolute;
        top:400px;
        left:1500px;
    }







    #dato_uno {
  grid-area: dato_uno;
  border: 3px solid #585858;
  background-color: white;
  border-radius: 50px;
  padding: 20px;
}

.d_uno {
  font-family: arial;
  font-size: 28px;
  margin-left: 10px;
  color: #385da8;
  margin-bottom: 20px;
}

.fila {
  display: flex;
  justify-content: space-between;
  font-family: arial;
  font-size: 18px;
  margin: 8px 10px;
  color: #282727;
  border-bottom: 1px solid #ddd;
  padding-bottom: 5px;
}

.etiqueta {
  color: #282727;
}

.valor {
  color: #585858;
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


<section id="presentacion">
    <p class="t_cinco">Ingrid Vazquez</p>
     <p class="t_cinco">Analista contable   </p> 
      <p class="t_cinco">activo</p>

      <div id="personita">
     <img src='icono_persona.jpg' alt="imag icono persona" />
  </div>

</section>



   <section id="dato_uno">
  <p class="d_uno">Datos básicos</p>

  <div class="fila">
    <span class="etiqueta">Tipo de usuario</span>
    <span class="valor">Resp Con accesor</span>
  </div>

  <div class="fila">
    <span class="etiqueta">Código de usuario</span>
    <span class="valor">123456789</span>
  </div>

  <div class="fila">
    <span class="etiqueta">Usuario de acceso</span>
    <span class="valor">usuario123</span>
  </div>

  <div class="fila">
    <span class="etiqueta">Usuario</span>
    <span class="valor">IngridV</span>
  </div>

  <div class="fila">
    <span class="etiqueta">Género</span>
    <span class="valor">Femenino</span>
  </div>

  <div class="fila">
    <span class="etiqueta">Cédula de identidad</span>
    <span class="valor">V-12345678</span>
  </div>

  <div class="fila">
    <span class="etiqueta">Correo</span>
    <span class="valor">correo@example.com</span>
  </div>

  <div class="fila">
    <span class="etiqueta">Ubicación</span>
    <span class="valor">Caracas</span>
  </div>

  <div class="fila">
    <span class="etiqueta">Cuenta vinculada</span>
    <span class="valor">Sí</span>
  </div>
</section>
   
    
 
   
</main>




</body>
</html>
 
