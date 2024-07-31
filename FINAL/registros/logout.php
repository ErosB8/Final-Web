<?php
require_once("../conexion.php");
$consulta = "DELETE FROM carrito";

mysqli_query($conexion, $consulta);
    

mysqli_close($conexion);
session_start();
session_destroy();


header("location: ../index.php");

exit();
?>