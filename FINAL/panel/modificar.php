<?php
require_once("../registros/admin.php");
require_once("../conexion.php");
include_once("headerpanel.php");

if ($conexion != NULL) {
    if (isset($_GET['id'])) {
        $id = mysqli_real_escape_string($conexion, $_GET['id']);
        
        $cons = "SELECT id, nombre, descripcion, color, precio, foto, categoria_id FROM producto WHERE id='$id'"; 
        $respuesta = mysqli_query($conexion, $cons);

        if ($respuesta) {
            $row = mysqli_fetch_array($respuesta);
            ?>

            <form action="modificar2.php" method="get">
                <div class='mb-3 text-center'>
                    <h3>Modificar producto</h3>
                </div>
                <div class='col centrado'>
                    <input name="id" type="hidden" value="<?php echo $row['id']; ?>" />
                </div>
                <div class='mb-3'>
                    <label for="nom" class='form-label'>Nombre:</label>
                    <input id="nom" name="nombre" class='form-control' type="text" value="<?php echo $row['nombre']; ?>" required />
                </div>
                <div class='mb-3'>
                    <label for="desc" class='form-label'>Descripción:</label>
                    <textarea id="desc" name="desc" class='form-control' required><?php echo $row['descripcion']; ?></textarea>
                </div>
                <div class='mb-3'>
                    <label for="color" class='form-label'>Color:</label>
                    <input id="color" name="color" class='form-control' type="text" value="<?php echo $row['color']; ?>" required />
                </div>
                <div class='mb-3'>
                    <label for="pre" class='form-label'>Precio:</label>
                    <input id="pre" name="pre" class='form-control' type="number" value="<?php echo $row['precio']; ?>" required />
                </div>
                <div class='mb-3'>
                    <label for="cat" class='form-label'>Categoría:</label>
                    <select id="cat" name="cat" class='form-select' required>
                        <option value="">Seleccione una categoría</option>
                        <?php
                        $sql = 'SELECT id, nombre FROM categoria';
                        $result = $conexion->query($sql);
                        if ($result->num_rows > 0) {
                            while ($categoria = $result->fetch_assoc()) {
                                $selected = ($categoria['id'] == $row['categoria_id']) ? 'selected' : '';
                                echo "<option value='{$categoria['id']}' $selected>{$categoria['nombre']}</option>";
                            }
                        } else {
                            echo '<option value="">No hay categorías disponibles</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class='mb-3'>
                    <label for="arch" class='form-label'>Cargar imagen:</label>
                    <input id="arch" name="arch" class='form-control' type='file' required />
                </div>
                <div class='d-grid gap-2 d-md-flex justify-content-md-center'>
                    <button class='btn btn-primary me-md-2' type='submit'>Enviar</button>
                    <button id='res' class='btn btn-secondary' type='reset'>Reestablecer</button>
                </div>
            </form>

            <?php
        }
    }
}
include_once("footerpanel.php");
?>
