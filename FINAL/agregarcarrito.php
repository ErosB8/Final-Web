<?php
require_once("conexion.php");

if ($conexion != NULL) {
    if (isset($_POST['nombre']) and isset($_POST['foto']) and isset($_POST['cantidad']) and isset($_POST['total'])) {
        $nombre = $_POST['nombre'];
        $foto = $_POST['foto'];
        $cantidad = $_POST['cantidad'];
        $total = $_POST['total'];
        
        $consulta = "INSERT INTO carrito(nombre, foto, cantidad, total) VALUES ('$nombre','$foto','$cantidad','$total')";

        //ejecuta la consulta
        $respuesta = mysqli_query($conexion,$consulta);

        header("location: carrito.php");
        
    }
    
} else {
     print "<h1>Algo ha fallado</h1>";
}

?>
