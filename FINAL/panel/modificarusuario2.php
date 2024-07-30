<?php
require_once("../registros/admin.php");
require_once("../conexion.php");

if($conexion != NULL){
    if(isset($_GET['ID'])){

        $id=$_GET['ID'];

    }

    
    if(isset($_GET['NIVEL'])){

        $nuevonivel=$_GET['NIVEL'];
    }
    $cons= "UPDATE usuario SET NIVEL='$nuevonivel' WHERE ID='$id' "; 
    $respuesta= mysqli_query($conexion,$cons);
    if($respuesta){
        print "     
        <div class='centrado'>
            <h2>El NIVEL fue modificado por <strong>$nuevonivel</strong></h2>
        </div>
    "; 
    }


    if(isset($_GET['ESTADO'])){

        $nuevoestado=$_GET['ESTADO'];
    }
    $cons= "UPDATE usuario SET ESTADO='$nuevoestado' WHERE ID='$id' "; 
    $respuesta= mysqli_query($conexion,$cons);
    if($respuesta){
        print "  
        <div class='centrado'>
            <h2>El ESTADO fue modificado por <strong>$nuevoestado</strong></h2>
        </div>
        ";
    }

    print "
        <div class='centrado'>
            <a href=usuarios.php class='bap mb20px vbap mt25px'>Volver</a>
        </div>
        ";  
}
include_once("footerpanel.php")
?>