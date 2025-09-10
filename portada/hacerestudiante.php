<?php
$id_cuenta=$_GET['ci'];

$sql = "UPDATE cuenta SET rol='estudiante' WHERE id_cuenta='$id_cuenta'";
if (mysqli_query($conn, $sql)){
    header("Location: administrador.php");

}else{
    echo"Error:" .mysqli_error($conn);
}