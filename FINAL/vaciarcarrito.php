<?php
require_once("conexion.php");

// Asegúrate de que la conexión a la base de datos esté disponible
if ($conexion != NULL) {
    // Consulta para eliminar todos los productos del carrito
    $consulta = "DELETE FROM carrito";

    // Ejecuta la consulta
    if (mysqli_query($conexion, $consulta)) {
        // Redirige al usuario de vuelta a la página del carrito
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
