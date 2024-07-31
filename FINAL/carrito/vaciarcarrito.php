<?php
require_once("../conexion.php");

if ($conexion != NULL) {
    $consulta = "DELETE FROM carrito";

    if (mysqli_query($conexion, $consulta)) {
        header("Location: carrito.php");
        exit();
    } else {
        echo "Error al vaciar el carrito: " . mysqli_error($conexion);
    }
} else {
    echo "<h1>Error de conexión a la base de datos</h1>";
}

mysqli_close($conexion);
?>
