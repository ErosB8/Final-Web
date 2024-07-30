<?php
require_once("../registros/admin.php");
require_once("../conexion.php");
if($conexion != NULL){
    if(isset($_POST['nom']) and isset($_POST['desc']) and isset($_POST['color']) and isset($_POST['pre']) and isset($_POST['cat'])){
        $nombre = $_POST['nom'];
        $descripcion = $_POST['desc'];
        $color = $_POST['color'];
        $precio = $_POST['pre'];
        $categoria = $_POST['cat'];
        

        $hora = time();
        $foto = $hora.'.jpg';
        move_uploaded_file($_FILES ['arch']['tmp_name'], "../imgbbdd/$foto");


    $cons = "INSERT INTO producto(nombre, descripcion, color, precio, categoria_id, foto) VALUES ('$nombre', '$descripcion','$color','$precio', '$categoria', '$foto')";
    

    $respuesta = mysqli_query($conexion,$cons);


    if($respuesta){
        print "
        <div class='centrado'>
            <h1>El producto fue agregado a la lista</h1>
        </div>
        <div class='centrado'>
            <p><strong>Nombre</strong>: $nombre</p>
        </div>
        <div class='centrado'>
            <p><strong>Color</strong>: $color</p>
        </div>
        <div class='centrado'>
            <p><strong>Precio</strong>: $precio</p>
        </div>
        <div class='centrado'>
            <img src='../imgbbdd/$foto' width=300 heigth=300>
        </div>
        <div class='centrado'>
            <a href=index.php class='bap mb20px vbap mt25px'>Volver</a>
        </div>
        ";    
       
    }
    }

}else{
    print "<h1>Error de conexión. Algo salio mal</h1>";
}

include_once("footerpanel.php")

?>