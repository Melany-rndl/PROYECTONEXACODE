<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
   <style>
    body {
      display: grid;
      grid-template-columns: 16% 84% ;
      grid-template-rows: auto auto;
      grid-template-areas:"principal principal"
                          "opciones mn"
                          "opciones mn";
      font-family: Verdana, Geneva, Tahoma, sans-serif;
      background-color: #f8f8f8;
      margin:0px;
    }
    </style>
    <?php
        $direccion="localhost";
        $usuario="root";
        $contrasena="";
        $dbname="proyecto3"; 
        session_start();
        
        $conexion= new mysqli($direccion,$usuario,$contrasena,$dbname);
        if($conexion->error){
            echo"Hubo un error al conectar a la base de datos";
        }
        ?>
</head>
<body>
   <?php
     if($_SESSION['rol']==2 ){
           include("inicio2.php");  
        }else{
            if($_SESSION['rol']==1 ){
            include("inicio1.php");
        }
        }
  ?>
  <div class="n">
      <?php
         include("submenudeaula.php"); 
      ?>
      <div class="tablapersonas">
      <center>
         <table border="1">
            <tr>
               <th>Nombre</th>
               <th>Apellidos</th>
               <th>Direccion</th>
               <th>Fecha de Nacimiento</th>
               <th>Celular</th>
               <th>Curso</th>
               <th>RUDE</th>
               <th>CI</th>
               </tr>
               <?php
               $ID=$_GET['ID'];   
               $sql=" SELECT * FROM clases_has_cuenta WHERE Clases_ID='$ID' ";
               $resultado=$conexion->query($sql);
               if($resultado -> num_rows >0){
                  While($fila=$resultado ->fetch_assoc()){
                     $Cuenta_User=$fila['Cuenta_User'];
                     $sql2="SELECT*FROM Informacion WHERE CI='$Cuenta_User'";
                     $resultado2=$conexion->query ($sql2);
                     if ($resultado2->num_rows>0){
                           While($fila2=$resultado2->fetch_assoc()){
                              $Nombres=$fila2['Nombres'];
                              $Apellidos=$fila2['Apellidos'];
                              $Direccion=$fila2['Direccion'];
                              $Fecha=$fila2['Fechadenacimiento'];
                              $Celular=$fila2['Telefono'];
                              $Curso=$fila2['Curso'];
                              $Rude=$fila2['Rude'];
                              $CI=$fila2['CI'];
                              ?>
                                 <tr>
                                    <td><?=$Nombres?></td>
                                    <td><?=$Apellidos?></td>
                                    <td><?=$Direccion?></td>
                                    <td><?=$Fecha?></td>
                                    <td><?=$Celular?></td>
                                    <td><?=$Curso?></td>
                                    <td><?=$Rude?></td>
                                    <td><?=$CI?></td>
                                 </tr>
                              
                              </div> 
                        <?php
                        }
                     }
                  }
               }
               ?>
               </table>
               </center>
  </div>
     
</body>
</html>

