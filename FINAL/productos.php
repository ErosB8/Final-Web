<?php
    include_once("header.php");
    require_once("conexion.php");
?>
    <main class="mt25px">
        <div class="centrado">
            
        </div>
        
        <div class="container-fluid">
            <?php
            if($conexion != NULL){
           

            $cons = "SELECT id, nombre, color, precio, foto FROM productos";

            $respuesta = mysqli_query($conexion,$cons);

            print "<div class='row'>";
            while ($row =  mysqli_fetch_array($respuesta)) {
                print "
                        <div class='col-4'>
                            <h2 class='centrado mt25px'><strong>$row[nombre]</strong></h2>
                            <p class=centrado><strong>Color</strong>: $row[color]</p>
                            <p class=centrado><strong>Precio</strong>: $row[precio]</p>
                            <div class=row>
                                <div class='col centrado'>
                                    <img class='mb20px' width=300 heigth=300 src=imgbbdd/$row[foto] alt=$row[nombre] />
                                </div>    
                            </div>
                        </div>
            ";
            }
            print "</div>";

            }else{
                print "<h1>Error de conexión. Algo salio mal</h1>";
            }
            ?>
        </div>
    </main>
<?php
    include_once("footer.php")
?>