<?php
require_once("../registros/admin.php");
require_once("../conexion.php");

$modificacion_exitosa = false;
$mensajes = "";

if ($conexion != NULL) {
    if (isset($_POST['id'])) {
        $id = $_POST['id'];
    }

    if (isset($_POST['nombre'])) {
        $nuevonombre = $_POST['nombre'];
        $cons = "UPDATE producto SET nombre='$nuevonombre' WHERE id='$id'";
        $respuesta = mysqli_query($conexion, $cons);
        if ($respuesta) {
            $modificacion_exitosa = true;
            $mensajes .= "<p>El nombre fue modificado por: <strong>$nuevonombre</strong></p>";
        }
    }

    if (isset($_POST['desc'])) {
        $nuevadesc = $_POST['desc'];
        $cons = "UPDATE producto SET descripcion='$nuevadesc' WHERE id='$id'";
        $respuesta = mysqli_query($conexion, $cons);
        if ($respuesta) {
            $modificacion_exitosa = true;
            $mensajes .= "<p>La descripción fue modificada por: <strong>$nuevadesc</strong></p>";
        }
    }

    if (isset($_POST['color'])) {
        $nuevocolor = $_POST['color'];
        $cons = "UPDATE producto SET color='$nuevocolor' WHERE id='$id'";
        $respuesta = mysqli_query($conexion, $cons);
        if ($respuesta) {
            $modificacion_exitosa = true;
            $mensajes .= "<p>El color fue modificado por: <strong>$nuevocolor</strong></p>";
        }
    }

    if (isset($_POST['pre'])) {
        $nuevoprecio = $_POST['pre'];
        $cons = "UPDATE producto SET precio='$nuevoprecio' WHERE id='$id'";
        $respuesta = mysqli_query($conexion, $cons);
        if ($respuesta) {
            $modificacion_exitosa = true;
            $mensajes .= "<p>El precio fue modificado por: <strong>$nuevoprecio</strong></p>";
        }
    }

    if (isset($_POST['cat'])) {
        $nuevacat = $_POST['cat'];
        $cons = "UPDATE producto SET categoria_id='$nuevacat' WHERE id='$id'";
        $respuesta = mysqli_query($conexion, $cons);
        if ($respuesta) {
            $modificacion_exitosa = true;
            $categoriaTexto = $nuevacat == 1 ? 'Teléfono celular' : 'Reloj';
            $mensajes .= "<p>La categoría fue modificada por: <strong>$categoriaTexto</strong></p>";
        }
    }

    if (isset($_FILES['arch']) && $_FILES['arch']['error'] == UPLOAD_ERR_OK) {
        $hora = time();
        $foto = $hora . '.jpg';
        move_uploaded_file($_FILES['arch']['tmp_name'], "../imgbbdd/$foto");
        
        $cons = "UPDATE producto SET foto='$foto' WHERE id='$id'";
        $respuesta = mysqli_query($conexion, $cons);
        if ($respuesta) {
            $modificacion_exitosa = true;
            $mensajes .= "
            <p>La foto fue modificada por:</p>
            <img src='../imgbbdd/$foto' class='img-fluid' style='max-width: 300px; height: auto;'>";
        }
    }

    if ($modificacion_exitosa) {
        print "
        <div class='container mt-5'>
            <div class='card'>
                <div class='card-header text-center bg-success text-white'>
                    <h1><strong>Modificación Exitosa</strong></h1>
                </div>
                <div class='card-body text-center'>
                    $mensajes
                    <div class='text-center mt-4'>
                        <a href='index.php' class='btn btn-primary'>Volver</a>
                    </div>
                </div>
            </div>
        </div>";
    }
}

include_once("../footer.php");
?>
