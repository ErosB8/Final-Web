<?php
include_once("header.php");
require_once("conexion.php");
?>
<main class="mt-5">
    <div class="container">
        <div class="text-center mb-4">
            <h3 id="titulo">Bienvenido al carrito</h3>
        </div>
        
        <?php
        if ($conexion != NULL) {
            $consulta = "SELECT carrito.carrito_id AS carrito_id, carrito.cantidad, carrito.total_carrito, producto.nombre, producto.foto
                        FROM carrito 
                        JOIN producto ON carrito.id_producto = producto.id";
            $respuesta = mysqli_query($conexion, $consulta);

            if ($respuesta) {
                if (mysqli_num_rows($respuesta) > 0) {
                    echo "<div class='row'>";
                    while ($fila = mysqli_fetch_array($respuesta)) {
                        echo "
                        <div class='col-md-4 mb-4'>
                            <div class='card'>
                                <div class='d-flex justify-content-center'>
                                    <img src='imgbbdd/{$fila['foto']}' class='card-img-top img-custom' alt='Foto del producto'>
                                </div>
                                <div class='card-body mismo-alto'>
                                    <h5 class='card-title centrado'>{$fila['nombre']}</h5>
                                    <p class='card-text centrado'><strong>Cantidad:</strong> {$fila['cantidad']}</p>
                                    <p class='card-text centrado'><strong>Total:</strong> $ {$fila['total_carrito']}</p>
                                </div>
                            </div>
                        </div>
                        ";
                    }
                    echo "</div>";
                } else {
                    echo "<div class='text-center mt-4'><p>El carrito está vacío.</p></div>";
                }
            } else {
                echo "<div class='alert alert-danger'>Error al recuperar los datos del carrito: " . mysqli_error($conexion) . "</div>";
            }

            echo "
            <div class='text-center mt-4'>
                <form class='boton-vaciar-carrito' action='vaciarcarrito.php' method='POST'>
                    <button type='submit' class='btn btn-danger'>Vaciar Carrito</button>
                </form>
            </div>
            ";

        } else {
            echo "<div class='alert alert-danger'>Error de conexión a la base de datos</div>";
        }
        ?>
    </div>
</main>
