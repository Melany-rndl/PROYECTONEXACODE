<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Insertar archivos con Google Drive</title>
<style>
  body {
    font-family: Arial;
    background: #2f2c2cff;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
  }

  .drive-container {
    background: #fff;
    width: 400px;
    padding: 100px;
    padding-right: 170px;
    border-radius: 10px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    text-align: center;
  }

  .drive-header {
    font-size: 18px;
    font-weight: bold;
    margin-bottom: 20px;
  }

  .drive-tabs {
    display: flex;
    justify-content: space-around;
    margin-bottom: 30px;
    border-bottom: 1px solid #ddd;
    padding-bottom: 5px;
  }

  .drive-tabs a {
    cursor: pointer;
    font-weight: bold;
    color: #666;
    padding: 8px ; /* más espacio alrededor del texto */
    margin: 0 ;      /* separación entre pestañas */
    letter-spacing: 0.5px; /* mejora la legibilidad */
    transition: color 0.3s, border-bottom 0.3s;
    text-decoration: none;
  }

  .drive-tabs a.active {
    color: #673b8eff;
    border-bottom: 2px solid #673b8eff;
    padding-bottom: 2px; /* un poco más de espacio para que se vea estético */
  }

  .drive-dropzone {
    background: #f5f5f5;
    border: 2px solid #ccc;
    border-radius: 8px;
    padding: 50px 20px;
    position: relative;
  }

  .drive-dropzone img {
    width: 80px;
    opacity: 0.4;
    margin-bottom: 20px;
  }

  .drive-dropzone button {
    background: #4285f4;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    font-size: 14px;
    margin-top: 10px;
    transition: background 0.3s;
  }

  .drive-dropzone button:hover {
    background: #3367d6;
  }

  .drive-dropzone p {
    color: #434040ff;
    font-size: 14px;
    margin-top: 10px;
  }
  #volver{
    margin-top:50px;
    padding:15px;
    border-radius: 15px;
    color: white;
    border: none;
     background-color: #4285f4;
     font-size: 14px;
 transition: background 0.3s;
  }
  #volver:hover {
    background: #3367d6;
  }
  
</style>
</head>
<body>

<div class="drive-container">
  <div class="drive-header">Insertar archivos </div>
  
  <div class="drive-tabs">
    <a class="active">Reciente</a>
    <a> Adjunta tu tarea</a>
   
   
  </div>

  <div class="drive-dropzone">
    <img src="https://www.gstatic.com/images/icons/material/system/2x/cloud_upload_grey600_48dp.png" alt="Cloud Icon">
    <br>
    <button>Subir Archivos </button>
   
  </div>
  <button id="volver">Volver a la clase</button>
</div>

</body>
</html>