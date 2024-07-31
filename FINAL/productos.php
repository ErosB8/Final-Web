<?php
    include_once("header.php");
    require_once("conexion.php");

?>
    <main class="mt25px">
        <div class="container-fluid">
            <?php
            if($conexion != NULL){
                $cons = "SELECT id, nombre, descripcion, color, precio, foto FROM producto";
                $respuesta = mysqli_query($conexion, $cons);
                
                print "<div class='row'>";
                while ($row =  mysqli_fetch_array($respuesta)) {
                    print "
                        <div class='col-4 mb-10'>
                            <div class='productos'>
                                <div class=row>
                                    <div class='col centrado mt25px'>
                                        <img width=150 heigth=150 src=imgbbdd/$row[foto] alt=$row[nombre] />
                                    </div>    
                                </div>
                                <div class='fondo-productos'>
                                    <h2 class='centrado-productos'><strong>$row[nombre]</strong></h2>
                                    <p class='centrado-productos'><strong>Descripcion</strong>: $row[descripcion]</p>
                                    <p class='centrado-productos'><strong>Color</strong>: $row[color]</p>
                                    <p class='centrado-productos'><strong>Precio</strong>: $$row[precio]</p>";

                    if (isset($_SESSION['usuario'])) {
                        print "
                            <form class='boton-agregar-carrito' action='carrito/agregarcarrito.php' method='POST'>
                                <input type='hidden' name='id' value='$row[id]' />
                                <button class='btn btn-primary' type='submit'>Agregar al carrito</button>
                            </form>";
                    } else {
                        print "
                            <div class='text-center mt-3'>
                                <a href='login.php' class='btn btn-primary'>Iniciar sesión para agregar al carrito</a>
                            </div>";
                    }

                    print "
                        </div>
                        </div>
                        </div>
                    ";
                }
                print "</div>";

            }else{
                print "<h1>Error de conexión. Algo salió mal</h1>";
            }
            ?>
        </div>
    </main>
<?php
    include_once("footer.php")
?>
