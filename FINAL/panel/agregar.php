<?php
require_once("../registros/admin.php");
require_once("../conexion.php");

echo "<div class='container mt-5'>";

if ($conexion != NULL) {
    if (isset($_POST['nom']) && isset($_POST['desc']) && isset($_POST['color']) && isset($_POST['pre']) && isset($_POST['cat'])) {
        $nombre = $_POST['nom'];
        $descripcion = $_POST['desc'];
        $color = $_POST['color'];
        $precio = $_POST['pre'];
        $categoria = $_POST['cat'];
        
        $hora = time();
        $foto = $hora . '.jpg';
        move_uploaded_file($_FILES['arch']['tmp_name'], "../imgbbdd/$foto");

        $cons = "INSERT INTO producto(nombre, descripcion, color, precio, categoria_id, foto) VALUES ('$nombre', '$descripcion','$color','$precio', '$categoria', '$foto')";
        $respuesta = mysqli_query($conexion, $cons);

        if ($respuesta) {
            // Obtener el nombre de la categoría
            $categoria_query = "SELECT nombre FROM categoria WHERE id='$categoria'";
            $categoria_result = mysqli_query($conexion, $categoria_query);
            $categoria_nombre = mysqli_fetch_assoc($categoria_result)['nombre'];

            echo "
            <div class='card'>
                <div class='card-header text-center bg-success text-white'>
                    <h2>Éxito</h2>
                </div>
                <div class='card-body text-center'>
                    <p>El producto fue agregado a la lista.</p>
                    <p><strong>Nombre:</strong> $nombre</p>
                    <p><strong>Descripción:</strong> $descripcion</p>
                    <p><strong>Color:</strong> $color</p>
                    <p><strong>Precio:</strong> $precio</p>
                    <p><strong>Categoría:</strong> $categoria_nombre</p>
                    <img src='../imgbbdd/$foto' class='img-fluid' alt='Imagen del producto' style='max-width: 300px; height: auto;'>
                    <br>
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
                    <p>Error al agregar el producto: " . mysqli_error($conexion) . "</p>
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
                <p>Datos insuficientes para agregar el producto.</p>
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
            <p>Error de conexión. Algo salió mal.</p>
            <a href='index.php' class='btn btn-primary mt-3'>Volver al Inicio</a>
        </div>
    </div>
    ";
}

echo "</div>";

include_once("../footer.php");
?>
