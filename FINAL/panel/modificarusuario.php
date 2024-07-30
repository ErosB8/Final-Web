<?php
require_once("../registros/admin.php");
require_once("../conexion.php");
include_once("headerpanel.php");

if ($conexion != NULL) {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        // Consulta para obtener la información del usuario
        $cons = "SELECT * FROM usuario WHERE id='$id'";
        $respuesta = mysqli_query($conexion, $cons);

        // Consulta para obtener los estados disponibles
        $cons_estados = "SELECT id, nombre FROM estado"; // Obtener también el ID del estado
        $respuesta_estados = mysqli_query($conexion, $cons_estados);

        if ($respuesta && $respuesta_estados) {
            $row = mysqli_fetch_array($respuesta);
            print "
                <form class='formpanel container-fluid' action='modificarusuario2.php' method='get'>
                    <div class='row'>
                        <div class='col centrado'>
                            <input name='id' type='hidden' value='$row[id]'/>
                            <h1><strong>Modificar al usuario ID = $row[id]</strong></h1>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col centrado'>
                            <label for='estado'>Modificar ESTADO</label>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col centrado'>
                            <select id='estado' name='estado'>
            ";

            // Iterar sobre los estados y crear las opciones del select
            while ($estado = mysqli_fetch_array($respuesta_estados)) {
                $selected = ($estado['id'] == $row['estado_id']) ? "selected" : "";
                print "<option value='{$estado['id']}' $selected>{$estado['nombre']}</option>";
            }

            print "
                            </select>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col centrado'>
                            <button class='bap mb20px mt25px' type='submit'>Modificar</button>
                        </div>
                    </div>
                </form>
            ";
        } else {
            echo "Error al obtener la información del usuario o los estados.";
        }
    } else {
        echo "ID de usuario no especificado.";
    }
} else {
    echo "Error de conexión a la base de datos.";
}

include_once("footerpanel.php");
?>
