<?php
require_once("../registros/admin.php");
require_once("../conexion.php");
include_once("headerpanel.php");
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

    $cons = "SELECT id, nombre, color, precio, foto FROM productos";

    $respuesta = mysqli_query($conexion,$cons);

    
    print "<div class='row'>
             <div class='col centrado'>
                <table border=1 >
                <tr>
                    <th class='border'>id</th>
                    <th class='border'>Nombre</th>
                    <th class='border'>Color</th>
                    <th class='border'>Precio</th>
                    <th class='border'>Foto</th>
                    <th class='border'>Modificar</th>
                    <th class='border'>Eliminar</th>
                </tr>    
    ";

    while ($row = mysqli_fetch_array($respuesta)) {
        print "
            
            <tr>
                <td class='border'>$row[id]</td>
                <td class='border'>$row[nombre]</td>
                <td class='border'>$row[color]</td>
                <td class='border'>$row[precio]</td>
                <td class='border'>$row[foto]</td>
                <td class='border'><a href=modificar.php?id=$row[id] >Modificar</a></td>
                <td class='border'><a href=borrar.php?id=$row[id]>Eliminar</a></td> 
            </tr>
       ";
    }

    print "</div>
    </div>
    </table >
    </main>
    ";




}else{
    print "<h1>Error de conexión. Algo salio mal</h1>";
}


?>

<form class="formpanel container-fluid" action="agregar.php" method="post" enctype="multipart/form-data">
    <div class='row'>
        <div class='col centrado'>
            <p class='pame'>Agregar producto</p>
        </div>
    </div>
    <div class="row">
        <div class="col centrado">
            <label for="nom" >Nombre:</label>
            <input id="nom" name="nom"  type="text" required/>
        </div>
    </div>
    <div class="row">
        <div class="col centrado">
        <label for="color" >Color:</label>
        <input id="color" name="color"  type="text" required/>
        </div>
    </div>
    <div class="row">
        <div class="col centrado">
        <label for="pre" >Precio:</label>
        <input id="pre" name="pre"  type="number" required/>
        </div>
    </div>
    <div class="row">
        <div class="col centrado">
            <label for="arch" >Cargar imagen:</label>
        </div>
    </div>
    <div class="row">
        <div class="col centrado">
            <input id="arch" name="arch"  type="file" required/>
        </div>
    </div>
    <div class="row">
        <div class="col centrado">
            <button class="bap mb20px mt25px" type="submit">Enviar</button>
            <button id="res" class="bap mb20px mt25px" type="reset">Reestablecer</button>
        </div>
    </div>

</form>

<?php
    include_once("footerpanel.php")
?>