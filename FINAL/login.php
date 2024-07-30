<?php
    include_once("header.php");
?>
<main>
    <div class="container-fluid">
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                <form class="centrado" id="form" action="registros/loguearse.php" method="post">
                    <fieldset id="fieldset">
                        <legend class="centrado"><strong>Iniciá sesión</strong></legend>
                        <?php
                        if(isset($_GET['noexiste'])){
                            print "<p style=color:red>Ese usuario no existe, ingrese bien sus datos</p>";
                        }
                        if(isset($_GET['Ban'])){
                            print "<p style=color:red>Este usuario ha sido baneado permanentemente</p>";
                        }
                        ?>
                        <div>
                            <label for="email2" >E-mail</label>
                            </br>
                            <input type="email" id="email2" name="email2" required>
                        </div>
                        <div>
                            <label for="contraseña2" >Contraseña</label>
                            </br>
                            <input type="password" id="contraseña2" name="contraseña2" required>
                        </div>
                        <input type="submit" id="boton2" value="Iniciar sesión" class="bap mt25px">
                    </fieldset>    
                </form>
            </div>
            <div class="col-3"></div>
        </div>
        <div class="row mb20px">
            <div class="col-3"></div>
            <div class="col-6">
                <form class="centrado" id="form" action="registros/registrarse.php" method="post" >
                    <fieldset id="fieldset">
                        <legend class="centrado"><strong>Registrate</strong></legend>
                        <?php
                        if(isset($_GET['registrarse'])){
                            print "<strong style=color:green>Ya podes iniciar sesión</strong>";
                        }
                        ?>
                        <div>
                            <label for="usuario" >Nombre de usuario</label>
                            </br>
                            <input type="text" id="usuario" name="usuario" required>
                        </div>
                        <div>
                            <label for="email" >E-mail</label>
                            </br>
                            <input type="email" id="email" name="email" required>
                        </div>
                        <div>
                            <label for="contraseña" >Contraseña</label>
                            </br>
                            <input type="password" id="contraseña" name="contraseña" required>
                        </div>
                        <div>
                            <label for="contraseña1" >Repetir Contraseña</label>
                            </br>
                            <input type="password" id="contraseña1" name="contraseña1" required>
                        </div>
                        <input type="submit" id="registro" value="Registrarme" class="bap mt25px" >
                    </fieldset>    
                </form>
            </div>
            <div class="col-3"></div>
        </div>
        
    </div>
    </div>
</main>
    <script>
        
    </script>
<?php
    include_once("footer.php")
?>