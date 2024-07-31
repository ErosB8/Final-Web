<?php
    include_once("header.php");
    include_once("conexion.php");
?>
<main class="mainc">
    <div id="letrasenvio" class="container-fluid">
        <div class="row">
            <div class="col centrado mt25px">
                <h1>¡Muchas gracias!</h1>
            </div>
        </div>
        <div class="row">
            <div class="col centrado mt25px">
                <p>Nuestro equipo se pondrá manos a la obra y en la brevedad se contactarán contigo</p>
            </div>
        </div>
        <div class="row">
            <div class="col centrado">
                <h2>Hemos recibido:</h2>
            </div>
        </div>
        <div class="row">
            <div class="col"></div>
            <div class="col text-center">
                <?php
                    $nombre = $apellido = $mail = $problema = $carga = $temp = "";

                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        if(isset($_POST['nombre'])){
                            $nombre = mysqli_real_escape_string($conexion, $_POST['nombre']);
                            print "<p><strong>Nombre</strong>: $nombre</p>";
                        }
                        if(isset($_POST['apellido'])){
                            $apellido = mysqli_real_escape_string($conexion, $_POST['apellido']);
                            print "<p><strong>Apellido</strong>: $apellido</p>";                        
                        }
                        if(isset($_POST['mail'])){
                            $mail = mysqli_real_escape_string($conexion, $_POST['mail']);
                            print "<p><strong>E-mail</strong>: $mail</p>";                       
                        }
                        if(isset($_POST['problema'])){
                            $problema = mysqli_real_escape_string($conexion, $_POST['problema']);
                            print "<p><strong>Motivo</strong>: $problema</p>";                        
                        }

                        $carga = time().".jpg";
                        $temp = $_FILES['carga']['tmp_name'];
                        
                        if (move_uploaded_file($temp, "recibido/$carga")) {
                            print "<p><strong>Imagen</strong>:</p><img class='mb20px' height='300' src='recibido/$carga' /><br>";
                            
                            $sql = "INSERT INTO contacto (nombre, apellido, mail, problema, carga) VALUES ('$nombre', '$apellido', '$mail', '$problema', '$carga')";
                            if (mysqli_query($conexion, $sql)) {
                            } else {
                                echo "Error al insertar datos: " . mysqli_error($conexion);
                            }
                        } else {
                            echo "Error al subir el archivo.";
                        }
                    }
                ?>
            </div>
            <div class="col"></div>
        </div>
    </div>
</main>
<?php
    include_once("footer.php");
    mysqli_close($conexion);
?>
