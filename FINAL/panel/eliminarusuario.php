<?php
require_once("../registros/admin.php");
require_once("../conexion.php");
include_once("headerpanel.php");
if($conexion != NULL){
    if(isset($_GET['id'])){

        $id=$_GET['id'];

    }
    
    $cons = "DELETE FROM usuario WHERE id='$id'";

    $respuesta= mysqli_query($conexion,$cons);

    if($respuesta){
        print " 
        <div class='centrado'>
            <h1 class='mt25px'>El usuario <strong>ID:$id</strong> fue eliminado</h1>
        </div>
        <div class='centrado'>
            <a href=index.php class='bap mb20px vbap mt25px'>Volver</a>
        </div>  
        ";
    }
}
include_once("footerpanel.php")
?>