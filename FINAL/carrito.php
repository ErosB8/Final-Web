<?php
include_once("header.php");
require_once("conexion.php");
?>
<main class="mt25px">
    <div class="centrado">
        <h3 id="titulo">Bienvenido al carrito</h3>
    </div>
    
    <?php
    if ($conexion != NULL) {
        $consulta = "SELECT carrito.carrito_id AS carrito_id, carrito.cantidad, carrito.total_carrito, producto.nombre, producto.foto
                    FROM carrito 
                    JOIN producto ON carrito.id_producto = producto.id";
        $respuesta = mysqli_query($conexion, $consulta);

        if ($respuesta) {
            print "<div class='container'>";
            print "<div class='row'>";
            while ($fila = mysqli_fetch_array($respuesta)) {
                print "
                <div class='col-4'>
                    <div id='productos'>
                        <article>
                            <p>ID: $fila[carrito_id]</p>
                            <p>Nombre: $fila[nombre]</p>
                            <p>Foto: <img src='imgbbdd/$fila[foto]' alt='Foto del producto' width='100' height='100'></p>
                            <p>Cantidad: $fila[cantidad]</p>
                            <p>Total: $$fila[total_carrito]</p>
                        </article>
                    </div>
                </div>
                ";
            }
            print "</div>";
            print "</div>";
        } else {
            echo "Error al recuperar los datos del carrito: " . mysqli_error($conexion);
        }

    } else {
        print "<h1>Error de conexión a la base de datos</h1>";
    }
    ?>
</main>
<?php
include_once("footer.php");
?>
