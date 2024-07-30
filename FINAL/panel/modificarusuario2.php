<?php
require_once("../registros/admin.php");
require_once("../conexion.php");
include_once("headerpanel.php");

if ($conexion != NULL) {
    if (isset($_GET['id']) && isset($_GET['estado'])) {
        $id = $_GET['id'];
        $nuevoestado_id = $_GET['estado']; // Nuevo estado ID

        // Actualizar el estado del usuario
        $cons = "UPDATE usuario SET estado_id='$nuevoestado_id' WHERE id='$id'";
        $respuesta = mysqli_query($conexion, $cons);

        if ($respuesta) {
            echo "
            <div class='centrado'>
                <h2>El estado fue modificado.</h2>
            </div>
            ";
        } else {
            echo "Error al actualizar el estado: " . mysqli_error($conexion);
        }
    } else {
        echo "Datos insuficientes para realizar la actualización.";
    }
} else {
    echo "Error de conexión a la base de datos.";
}

include_once("footerpanel.php");
?>
