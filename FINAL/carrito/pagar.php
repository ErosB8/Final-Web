<?php
include_once("headercarrito.php");
require_once("../conexion.php");

// Inicializa el total a pagar
$total_pagar = 0;
?>

<main class="mt-5">
    <div class="container">
        <div class="text-center mb-4">
            <h3 id="titulo">Resumen de tu compra</h3>
        </div>

        <?php
        if ($conexion != NULL) {
            // Consulta para obtener los productos del carrito
            $consulta = "SELECT carrito.cantidad, carrito.total_carrito, producto.nombre, producto.precio 
                         FROM carrito 
                         JOIN producto ON carrito.id_producto = producto.id";
            $respuesta = mysqli_query($conexion, $consulta);

            if ($respuesta) {
                if (mysqli_num_rows($respuesta) > 0) {
                    echo "<table class='table table-striped'>";
                    echo "<thead><tr><th>Nombre</th><th>Cantidad</th><th>Precio</th><th>Total</th></tr></thead>";
                    echo "<tbody>";
                    while ($fila = mysqli_fetch_array($respuesta)) {
                        $subtotal = $fila['cantidad'] * $fila['precio'];
                        $total_pagar += $subtotal;
                        echo "<tr>
                                <td>{$fila['nombre']}</td>
                                <td>{$fila['cantidad']}</td>
                                <td>\${$fila['precio']}</td>
                                <td>\${$subtotal}</td>
                              </tr>";
                    }
                    echo "</tbody>";
                    echo "<tfoot><tr><th colspan='3' class='text-right'>Total a Pagar</th><th>\${$total_pagar}</th></tr></tfoot>";
                    echo "</table>";
                } else {
                    echo "<div class='text-center mt-4'><p>No hay productos en el carrito.</p></div>";
                }
            } else {
                echo "<div class='alert alert-danger'>Error al recuperar los datos del carrito: " . mysqli_error($conexion) . "</div>";
            }

            echo "
            <div class='text-center mt-4'>
                <form action='graciascompra.php' method='POST'>
                    <button type='submit' class='btn btn-success'>Finalizar Compra</button>
                </form>
            </div>
            ";

        } else {
            echo "<div class='alert alert-danger'>Error de conexión a la base de datos</div>";
        }
        ?>
    </div>
</main>

<?php
include_once("../panel/footerpanel.php")
?>
