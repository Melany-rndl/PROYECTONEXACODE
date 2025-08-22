<?php
$conexion = mysqli_connect("localhost", "root", "", "p25");
if (!$conexion) die("Error de conexión");
include("Conexion-Clase.php"); 
function darLike($id){
    global $conexion;
    $sql = "UPDATE publicaciones SET likes = likes + 1 WHERE id = $id";
    mysqli_query($conexion, $sql);
}

if(isset($_GET['id'])){
    darLike($_GET['id']);
    header("Location: Pagina-Principal.php");
}
?>
<?php
echo "<p>Likes: ".$row['Likes']."</p>";
echo "<a href='like.php?id=".$row['id']."'>👍 Me gusta</a>";

?>
