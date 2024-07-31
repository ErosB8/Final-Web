<?php
require_once("../conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $carrito_id = $_POST['carrito_id'];

    if ($conexion != NULL) {
        $consulta = "DELETE FROM carrito WHERE carrito_id = ?";
        $stmt = $conexion->prepare($consulta);
        $stmt->bind_param("i", $carrito_id);

        if ($stmt->execute()) {
            
            header("Location: carrito.php");
            exit();
        } else {
            echo "Error al eliminar el producto del carrito: " . $conexion->error;
        }
        $stmt->close();
    } else {
        echo "Error de conexión a la base de datos";
    }
}
?>
