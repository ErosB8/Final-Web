<?php
require_once("../registros/admin.php");
require_once("../conexion.php");

if ($conexion != NULL) {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $cons = "SELECT * FROM usuario WHERE id='$id'";
        $respuesta = mysqli_query($conexion, $cons);

        $cons_estados = "SELECT id, nombre FROM estado";
        $respuesta_estados = mysqli_query($conexion, $cons_estados);

        if ($respuesta && $respuesta_estados) {
            $row = mysqli_fetch_array($respuesta);
            print "
                <div class='container mt-5'>
                    <div class='card'>
                        <div class='card-header text-center bg-secondary text-white'>
                            <h1><strong>Modificar al usuario ID = $row[id]</strong></h1>
                        </div>
                        <div class='card-body'>
                            <form class='formpanel' action='modificarusuario2.php' method='get'>
                                <input name='id' type='hidden' value='$row[id]'/>
                                <div class='form-group'>
                                    <label for='estado' class='form-label'><strong>Modificar ESTADO</strong></label>
                                    <select id='estado' name='estado' class='form-control'>
            ";

            while ($estado = mysqli_fetch_array($respuesta_estados)) {
                $selected = ($estado['id'] == $row['estado_id']) ? "selected" : "";
                print "<option value='{$estado['id']}' $selected>{$estado['nombre']}</option>";
            }

            print "
                                    </select>
                                </div>
                                <div class='text-center'>
                                    <button class='btn btn-success mt-3' type='submit'>Modificar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            ";
        } else {
            echo "<div class='alert alert-danger text-center'>Error al obtener la información del usuario o los estados.</div>";
        }
    } else {
        echo "<div class='alert alert-warning text-center'>ID de usuario no especificado.</div>";
    }
} else {
    echo "<div class='alert alert-danger text-center'>Error de conexión a la base de datos.</div>";
}

include_once("footerpanel.php");
?>
