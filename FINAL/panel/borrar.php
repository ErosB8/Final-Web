<?php
require_once("../registros/admin.php");
require_once("../conexion.php");

echo "<div class='container mt-5'>";

if ($conexion != NULL) {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        
        $cons = "DELETE FROM producto WHERE id='$id'";
        $respuesta = mysqli_query($conexion, $cons);

        if ($respuesta) {
            echo "
            <div class='card'>
                <div class='card-header text-center bg-success text-white'>
                    <h2>Éxito</h2>
                </div>
                <div class='card-body text-center'>
                    <p>El producto <strong>ID: $id</strong> fue eliminado correctamente.</p>
                    <a href='index.php' class='btn btn-primary mt-3'>Volver al Inicio</a>
                </div>
            </div>
            ";
        } else {
            echo "
            <div class='card'>
                <div class='card-header text-center bg-danger text-white'>
                    <h2>Error</h2>
                </div>
                <div class='card-body text-center'>
                    <p>Error al eliminar el producto: " . mysqli_error($conexion) . "</p>
                    <a href='index.php' class='btn btn-primary mt-3'>Volver al Inicio</a>
                </div>
            </div>
            ";
        }
    } else {
        echo "
        <div class='card'>
            <div class='card-header text-center bg-warning text-white'>
                <h2>Advertencia</h2>
            </div>
            <div class='card-body text-center'>
                <p>ID de producto no especificado.</p>
                <a href='index.php' class='btn btn-primary mt-3'>Volver al Inicio</a>
            </div>
        </div>
        ";
    }
} else {
    echo "
    <div class='card'>
        <div class='card-header text-center bg-danger text-white'>
            <h2>Error</h2>
        </div>
        <div class='card-body text-center'>
            <p>Error de conexión a la base de datos.</p>
            <a href='index.php' class='btn btn-primary mt-3'>Volver al Inicio</a>
        </div>
    </div>
    ";
}

echo "</div>"; 

include_once("footerpanel.php");
?>
