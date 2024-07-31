<?php
include_once("headercarrito.php");
require_once("../conexion.php");

$consulta = "DELETE FROM carrito";

mysqli_query($conexion, $consulta);
    

mysqli_close($conexion);


if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

?>

<main class="d-flex align-items-center justify-content-center vh-100">
    <div class="container text-center">
        <div class="card p-5 shadow-lg">
            <h3 class="mb-4">Gracias por su compra</h3>
            <p>Se le enviará un mail con el resumen de la compra y un código de descuento para que vuelva a elegirnos</p>
            <form class="boton-volver-inicio" action="../index.php" method="POST">
                <button type="submit" class="btn btn-primary mt-3">Inicio</button>
            </form>
        </div>
    </div>
</main>

<?php
include_once("../panel/footerpanel.php")
?>
