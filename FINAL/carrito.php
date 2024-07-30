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

        $consulta = "SELECT carrito.id, carrito.cantidad, carrito.total, producto.nombre, producto.foto
            FROM carrito JOIN  producto ON carrito.id_producto = producto.id";
        $respuesta = mysqli_query($conexion, $consulta);

        print "<div class='container'>";
        print "<div class='row'>";
        while ($fila = mysqli_fetch_array($respuesta)) {
            print "
            <div class='col-4'>
                <div id='productos'>
                    <article>
                        <p>$fila[id]</p>
                        <p> - $fila[nombre] - </p>
                        <p>Foto: <img src='$fila[foto]' alt='Foto del producto'></p>
                        <p>Cantidad: $fila[cantidad]</p>
                        <p>Total: $$fila[total]</p>
                    </article>
                </div>
            </div>
            ";
        }
        print "</div>";
        print "</div>";

    } else {
         print "<h1>Algo ha fallado</h1>";
    }
    ?>
    </main>
<?php
    include_once("footer.php")
?>