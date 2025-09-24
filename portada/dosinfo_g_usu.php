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
    grid-template-rows: 100px 200px 200px 400px ;
    grid-template-columns:   99%;
    grid-template-areas:
    " pag"
    " tit "
    " presentacion "
    " dato_uno";
   
   #dato_uno {
    border: 2px solid #585858;
    border-radius: 15px; /* menos redondeado en móvil */
    margin: 10px;        /* espacio para que no pegue con los lados */
    padding: 15px;       /* más compacto */
  }

  .datos-grid {
    grid-template-columns: 1fr; /* una sola columna en móvil */
  }
}
       }

 #dato_uno {
    border: 2px solid #585858;
    border-radius: 15px; /* menos redondeado en móvil */
    margin: 15px;        /* espacio para que no pegue con los lados */
    padding: 19px;       /* más compacto */
  }

  .datos-grid {
    grid-template-columns: 1fr; /* una sola columna en móvil */
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
       
        width: 50;
  height: 50;
    }

#dato_uno {
  grid-area: dato_uno;
  border: 3px solid #585858;
  background-color: white;
  border-radius: 20px;
  padding: 20px;
  box-shadow: 2px 4px 8px rgba(0,0,0,0.1);
}

#dato_uno .d_uno {
  font-family: Arial, sans-serif;
  font-size: 28px;
  margin-bottom: 15px;
  color: #385da8;
  border-bottom: 2px solid #ddd;
  padding-bottom: 5px;
}

.datos-grid {
  display: grid;
  grid-template-columns: 1fr 1fr; /* dos columnas */
  gap: 12px 30px;
}

.campo {
  font-family: Arial, sans-serif;
  font-size: 18px;
  color: #282727;
}

.label {
  font-weight: bold;
  color: #585858;
}

.valor {
  margin-left: 8px;
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
<section id="tit">
    <p id="t_uno">Perfil usuario-Nombre del usuario</p>
    <p id =t_dos>Creado:Nombre del creador  Fecha 00/00/00 <a id="t_tres">Modificado:Nombre del creador  Fecha 00/00/00</a></p>
</section>


<section id="presentacion">
    <p class="t_cinco">Ingrid Vazquez</p>
     <p class="t_cinco">Analista contable   </p> 
      <p class="t_cinco">activo</p>

      

</section>



  <section id="dato_uno">
  <h2 class="d_uno">Datos básicos</h2>
  <div class="datos-grid">
    <div class="campo"><span class="label">Tipo de usuario:</span> <span class="valor">Resp Con accesor</span></div>
    <div class="campo"><span class="label">Código de usuario:</span> <span class="valor">123456</span></div>
    <div class="campo"><span class="label">Usuario de acceso:</span> <span class="valor">ingrid.vzq</span></div>
    <div class="campo"><span class="label">Usuario:</span> <span class="valor">IngridV</span></div>
    <div class="campo"><span class="label">Género:</span> <span class="valor">Femenino</span></div>
    <div class="campo"><span class="label">Cédula de identidad:</span> <span class="valor">6789012</span></div>
    <div class="campo"><span class="label">Correo:</span> <span class="valor">ingrid@email.com</span></div>
    <div class="campo"><span class="label">Ubicación:</span> <span class="valor">Cochabamba</span></div>
    <div class="campo"><span class="label">Cuenta vinculada:</span> <span class="valor">Google</span></div>
  </div>
</section>
   
    
 
   
</main>




</body>
</html>
 
