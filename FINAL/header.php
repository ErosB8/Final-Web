<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Apple</title>
</head>
<body>
    <?php
    
    if (empty($_SESSION['usuario']) || isset($_GET['accion'])) {
        $usuario = false;
        session_destroy();
    } else {
        $usuario = $_SESSION['usuario'];
    }
    ?>
    <header>
        <?php
            $secciones = array();
            $secciones['Inicio'] = "index.php";
            $secciones['Productos'] = "productos.php";
            $secciones['AppleCard'] = "applecard.php";
            $secciones['¿Quiénes somos?'] = "nosotros.php";
            $secciones['Contacto'] = "contacto.php";
        ?>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a href="index.php"><img src="img/manzanita.png" alt="Logo Apple" id="manzanita" width="40" height="40"></a>
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav me-auto">
                        <?php
                            foreach($secciones as $texto => $link) {
                                echo "<li class='nav-item'>
                                        <a class='nav-link' href=$link>$texto</a>
                                      </li> ";
                            }
                        ?>
                    </ul>
                </div>
                <?php
                    if ($usuario) {
                        echo "
                        
                            <a class='nav-link' href='carrito.php'><img src='img/carrito.png' alt='Carrito' height='55'></a>
                            <a class='nav-link' href='registros/logout.php'>Cerrar sesión</a>
                            
                        ";
                    } else {
                        echo "<div>
                                <a class='nav-link' href='login.php'>Iniciar sesión</a>
                            </div>";
                    }
                ?>
                
            </div>
        </nav>
    </header>