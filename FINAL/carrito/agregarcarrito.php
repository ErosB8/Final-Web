<?php
require_once("../conexion.php");


if ($conexion != NULL) {
    if (isset($_POST['id'])) {
        $producto_id = $_POST['id'];

        // Verificar si el producto ya está en el carrito
        $consulta_verificar = "SELECT cantidad FROM carrito WHERE id_producto = $producto_id";
        $resultado_verificar = mysqli_query($conexion, $consulta_verificar);

        if ($resultado_verificar && mysqli_num_rows($resultado_verificar) > 0) {
            $fila = mysqli_fetch_array($resultado_verificar);
            $nueva_cantidad = $fila['cantidad'] + 1;

            $consulta_actualizar = "UPDATE carrito SET cantidad = $nueva_cantidad WHERE id_producto = $producto_id";
            if (mysqli_query($conexion, $consulta_actualizar)) {
                header("Location: carrito.php");
                exit();
            } else {
                echo "Error al actualizar la cantidad: " . mysqli_error($conexion);
            }
        } else {
        
            $consulta_producto = "SELECT precio FROM producto WHERE id = $producto_id";
            $resultado_producto = mysqli_query($conexion, $consulta_producto);
            if ($resultado_producto) {
                $producto = mysqli_fetch_array($resultado_producto);
                $precio = $producto['precio'];
                $cantidad = 1;
                $total = $precio * $cantidad;

                $consulta_insertar = "INSERT INTO carrito(id_producto, cantidad, total_carrito) VALUES ('$producto_id', '$cantidad', '$total')";
                if (mysqli_query($conexion, $consulta_insertar)) {
                    header("Location: carrito.php");
                    exit();
                } else {
                    echo "Error al insertar en el carrito: " . mysqli_error($conexion);
                }
            } else {
                echo "Error al obtener el precio del producto: " . mysqli_error($conexion);
            }
        }
    } else {
        echo "Datos insuficientes para agregar al carrito.";
    }
} else {
    echo "Error de conexión a la base de datos.";
}
?>
