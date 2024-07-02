<?php
    include_once("header.php");
?>
    <main class="mainc">
        <div id="letrasenvio" class="container-fluid">
            <div class="row">
                <div class="col centrado mt25px">
                    <h1>Muchas gracias!</h1>
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
                <div class="col">
                    <?php
                        $nombre;
                        $apellido;
                        $mail;
                        $problema;
                        $carga;
                        $temp;
                        
                        if(isset($_POST['nombre'])){
                            $nombre = $_POST['nombre'];
                            print "<p><strong>Nombre</strong>: $nombre</p>";
                        }
                        if(isset($_POST['apellido'])){
                            $apellido = $_POST['apellido'];
                            print "<p><strong>Apellido</strong>: $apellido</p>";                        
                        }
                        if(isset($_POST['mail'])){
                            $mail = $_POST['mail'];
                            print "<p><strong>E-mail</strong>: $mail</p>";                       
                        }
                        if(isset($_POST['problema'])){
                            $problema = $_POST['problema'];
                            print "<p><strong>Motivo</strong>: $problema</p>";                        
                        }
                        
                        $carga = time().".jpg";
                        $temp = $_FILES['carga']['tmp_name'];
                        
                        move_uploaded_file($temp,"recibido/$carga");
                        
                        print "<p><strong>Imagen</strong>:</p><img class='mb20px' src=recibido/$carga />";                       
                    ?>
                </div>
                <div class="col"></div>
            </div>
        </div>
    </main>
<?php
    include_once("footer.php")
?>