<?php
include_once("headercarrito.php");
require_once("../conexion.php");
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

            $hay_productos = false;

            if ($respuesta) {
                if (mysqli_num_rows($respuesta) > 0) {
                    $hay_productos = true;
                    echo "<div class='row'>";
                    while ($fila = mysqli_fetch_array($respuesta)) {
                        echo "
                        <div class='col-md-4 mb-4'>
                            <div class='card'>
                                <div class='d-flex justify-content-center'>
                                    <img src='../imgbbdd/{$fila['foto']}' class='card-img-top img-custom' alt='Foto del producto'>
                                </div>
                                <div class='card-body mismo-alto'>
                                    <h5 class='card-title centrado'>{$fila['nombre']}</h5>
                                    <p class='card-text centrado'><strong>Cantidad:</strong> {$fila['cantidad']}</p>
                                    <p class='card-text centrado'><strong>Precio unitario:</strong> $ {$fila['total_carrito']}</p>
                                    <form class='boton-eliminar' action='eliminarproducto.php' method='POST'>
                                        <input type='hidden' name='carrito_id' value='{$fila['carrito_id']}'>
                                        <button type='submit' class='btn btn-danger'>Eliminar</button>
                                    </form>
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
            <div class='container mb-5'>
                <div class='row justify-content-center'>
                    <div class='col-auto'>
                        <form class='boton-vaciar-carrito' action='vaciarcarrito.php' method='POST'>
                            <button type='submit' class='btn btn-warning mx-2'>Vaciar Carrito</button>
                        </form>
                    </div>
                    <div class='col-auto'>
                        <form class='boton-seguir-comprando' action='../productos.php' method='POST'>
                            <button type='submit' class='btn btn-secondary mx-2'>Seguir Comprando</button>
                        </form>
                    </div>
                    <div class='col-auto'>
                        <form class='boton-comprar' action='pagar.php' method='POST'>
                            <button type='submit' class='btn btn-primary mx-2' ".($hay_productos ? "" : "disabled").">Pagar</button>
                        </form>
                    </div>
                </div>
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
