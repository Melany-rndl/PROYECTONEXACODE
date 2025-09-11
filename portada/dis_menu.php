<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
          #iz{
            grid-area: iz;
             
 
        }
        .iconomenu{
    background-color: white;
    border: none;
    font-size: 25px;
    color: #3f3e57;
    cursor: pointer;
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
   <section id="iz">
  <button class="iconomenu" onclick="toggleMenu()">☰</button>
  <div id="menuLateral">
    <a href="#"> Matemáticas</a>
    <a href="#"> Química</a>
    <a href="#"> Geografía</a>
    <a href="#"> Literatura</a>
    <a href="#"> Informática</a>
  </div>
</section>
<script>
     function toggleMenu() {
  const menu = document.getElementById("menuLateral");
  menu.style.display = (menu.style.display === "flex") ? "none" : "flex";
}
   
</script>


</body>
</html>
