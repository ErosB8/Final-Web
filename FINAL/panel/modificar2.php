<?php
require_once("../registros/admin.php");
require_once("../conexion.php");
include_once("headerpanel.php");

if($conexion != NULL){
    if(isset($_GET['id'])){

        $id=$_GET['id'];

    }

    
    if(isset($_GET['nombre'])){

        $nuevonombre=$_GET['nombre'];
    }
    $cons= "UPDATE producto SET nombre='$nuevonombre' WHERE id='$id' "; 
    $respuesta= mysqli_query($conexion,$cons);
    if($respuesta){
        print "     
        <div class='centrado'>
            <h2>El nombre fue modificado por <strong>$nuevonombre</strong></h2>
        </div>
    "; 
    }

    if(isset($_GET['desc'])){

        $nuevadesc=$_GET['desc'];
    }
    $cons= "UPDATE producto SET descripcion='$nuevadesc' WHERE id='$id' "; 
    $respuesta= mysqli_query($conexion,$cons);
    if($respuesta){
        print "     
        <div class='centrado'>
            <h2>La descripción fue modificada por <strong>$nuevadesc</strong></h2>
        </div>
    "; 
    }


    if(isset($_GET['color'])){

        $nuevocolor=$_GET['color'];
    }
    $cons= "UPDATE producto SET color='$nuevocolor' WHERE id='$id' "; 
    $respuesta= mysqli_query($conexion,$cons);
    if($respuesta){
        print "  
        <div class='centrado'>
            <h2>El color fue modificado por <strong>$nuevocolor</strong></h2>
        </div>
        ";
    }


    if(isset($_GET['pre'])){

        $nuevoprecio=$_GET['pre'];
    }
    $cons= "UPDATE producto SET precio='$nuevoprecio' WHERE id='$id' "; 
    $respuesta= mysqli_query($conexion,$cons);
    if($respuesta){
        print " 
        <div class='centrado'>
            <h2>El precio fue modificado por <strong>$nuevoprecio</strong></h2>
        </div>
        ";
    }

    if(isset($_GET['cat'])){

        $nuevacat=$_GET['cat'];
    }
    $cons= "UPDATE producto SET categoria_id='$nuevacat' WHERE id='$id' "; 
    $respuesta= mysqli_query($conexion,$cons);
    if($respuesta){
        if($nuevacat==1){
            $nuevacat='Teléfono celular';
        } else if ($nuevacat==2){
            $nuevacat='Reloj';
        }
        print "  
        <div class='centrado'>
            <h2>La categoría fue modificada por <strong>$nuevacat</strong></h2>
        </div>
        ";
    }

    print "
        <div class='centrado'>
            <a href=index.php class='bap mb20px vbap mt25px'>Volver</a>
        </div>
        ";  
}
include_once("footerpanel.php")
?>