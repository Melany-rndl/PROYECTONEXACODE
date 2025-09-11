<?php
$id_cuenta=$_GET['ci'];

$sql = "UPDATE cuenta SET bloqueado=1 WHERE id_cuenta='$id_cuenta'";
if (mysqli_query($conn, $sql)){
    header("Location: narda.php");

}else{
    echo"Error:" .mysqli_error($conn);
}