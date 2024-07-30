<?php
require_once("../registros/admin.php");
require_once("../conexion.php");
if($conexion != NULL){
    print "
    <main class='container-fluid mainpanel'>
        <div class='row'>
            <div class='col centrado'>
                <a href='usuarios.php' class='bap mb20px vbap mt25px'>Usuarios</a>
            </div>
        </div>
        <div class='row'>
            <div class='col centrado'>
                <p class='pame'>Productos</p>
            </div>
        </div>
        
        
    ";

    $cons = "SELECT 
            producto.id, 
            producto.nombre, 
            producto.descripcion, 
            producto.color, 
            producto.precio, 
            producto.foto, 
            categoria.nombre AS nombre_categoria
        FROM 
            producto
        INNER JOIN 
            categoria ON producto.categoria_id = categoria.id;";

    $respuesta = mysqli_query($conexion,$cons);

    
    print "<div class='container'>
            <div class='row'>
             <div class='col centrado'>
                <table border=1 class='table table-striped'>
                <tr>
                    <th class='border'>id</th>
                    <th class='border'>Nombre</th>
                    <th class='border'>Descripción</th>
                    <th class='border'>Color</th>
                    <th class='border'>Precio</th>
                    <th class='border'>Foto</th>
                    <th class='border'>Categoría</th>
                    <th class='border'>Modificar</th>
                    <th class='border'>Eliminar</th>
                </tr>    
    ";

    while ($row = mysqli_fetch_array($respuesta)) {
        print "
            
            <tr>
                <td class='border'>$row[id]</td>
                <td class='border'>$row[nombre]</td>
                <td class='border'>$row[descripcion]</td>
                <td class='border'>$row[color]</td>
                <td class='border'>$row[precio]</td>
                <td class='border'>$row[foto]</td>
                <td class='border'>$row[nombre_categoria]</td>
                <td class='border'><a href=modificar.php?id=$row[id] >Modificar</a></td>
                <td class='border'><a href=borrar.php?id=$row[id]>Eliminar</a></td> 
            </tr>
       ";
    }

    print "</div>
    </div>
    </div>
    </table >
    </main>
    ";




}else{
    print "<h1>Error de conexión. Algo salio mal</h1>";
}


?>
<div class="mx-auto mb-5" style="max-width: 600px;">
    <div class="card-body">
        <form action="agregar.php" method="post" enctype="multipart/form-data">
            <div class="mb-3 text-center">
                <h3>Agregar producto</h3>
            </div>
            <div class="mb-3">
                <label for="nom" class="form-label">Nombre:</label>
                <input id="nom" name="nom" class="form-control" type="text" required/>
            </div>
            <div class="mb-3">
                <label for="desc" class="form-label">Descripción:</label>
                <textarea id="desc" name="desc" class="form-control" type="text" rows="5" required> </textarea>
            </div>
            <div class="mb-3">
                <label for="color" class="form-label">Color:</label>
                <input id="color" name="color" class="form-control" type="text" required/>
            </div>
            <div class="mb-3">
                <label for="pre" class="form-label">Precio:</label>
                <input id="pre" name="pre" class="form-control" type="number" required/>
            </div>
            <div class="mb-3">
                <label for="cat" class="form-label">Categoría:</label>
                <select id="cat" name="cat" class="form-select" required>
                    <option>Seleccione una categoría</option>
                    <?php
                    $sql = "SELECT id, nombre FROM categoria";
                    $result = $conexion->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row['id'] . "'>" . $row['nombre'] . "</option>";
                        }
                    } else {
                        echo "<option value=''>No hay categorías disponibles</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="arch" class="form-label">Cargar imagen:</label>
                <input id="arch" name="arch" class="form-control" type="file" required/>
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                <button class="btn btn-primary me-md-2" type="submit">Enviar</button>
                <button id="res" class="btn btn-secondary" type="reset">Reestablecer</button>
            </div>
        </form>
    </div>
</div>

<?php
    include_once("footerpanel.php")
?>