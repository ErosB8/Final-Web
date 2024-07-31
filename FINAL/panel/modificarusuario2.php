<?php
require_once("../registros/admin.php");
require_once("../conexion.php");

echo "<div class='container mt-5'>";

if ($conexion != NULL) {
    if (isset($_GET['id']) && isset($_GET['estado'])) {
        $id = $_GET['id'];
        $nuevoestado_id = $_GET['estado']; 

        $cons = "UPDATE usuario SET estado_id='$nuevoestado_id' WHERE id='$id'";
        $respuesta = mysqli_query($conexion, $cons);

        if ($respuesta) {
            echo "
            <div class='card'>
                <div class='card-header text-center bg-success text-white'>
                    <h2>Éxito</h2>
                </div>
                <div class='card-body text-center'>
                    <p>El estado fue modificado correctamente.</p>
                    <a href='usuarios.php' class='btn btn-primary mt-3'>Volver al Inicio</a>
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
                    <p>Error al actualizar el estado: " . mysqli_error($conexion) . "</p>
                    <a href='usuarios.php' class='btn btn-primary mt-3'>Volver al Inicio</a>
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
                <p>Datos insuficientes para realizar la actualización.</p>
                <a href='usuarios.php' class='btn btn-primary mt-3'>Volver al Inicio</a>
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
            <a href='usuarios.php' class='btn btn-primary mt-3'>Volver al Inicio</a>
        </div>
    </div>
    ";
}

echo "</div>"; 

include_once("footerpanel.php");
?>
