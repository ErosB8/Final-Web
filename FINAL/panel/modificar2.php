<?php
require_once("../registros/admin.php");
require_once("../conexion.php");
print "
<div class='mx-auto mb-5' style='max-width: 600px;'>
    <div class='card-body'>";
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
            <p>El nombre fue modificado por:</p>
        </div>
        <div class='centrado'>
            <p><strong>$nuevonombre</strong></p>
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
            <p>La descripción fue modificada por:</p>
        </div>
        <div class='centrado'>
            <p><strong>$nuevadesc</strong></p>
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
            <p>El color fue modificado por:</p>
        </div>
        <div class='centrado'>
            <p><strong>$nuevocolor</strong></p>
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
            <p>El precio fue modificado por:</p>
        </div>
        <div class='centrado'>
            <p><strong>$nuevoprecio</strong></p>
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
            <p>La categoría fue modificada por:</p>
        </div>
        <div class='centrado'>
            <p><strong>$nuevacat</strong></p>
        </div>
        ";
    }

    if(isset($_GET['arch'])){
        $nuevaimg=$_GET['arch'];
    }
    $cons= "UPDATE producto SET foto='$nuevaimg' WHERE id='$id' "; 
    $respuesta= mysqli_query($conexion,$cons);
    if($respuesta){
        print " 
        <div class='centrado'>
            <p>La foto fue modificada por:</p>
        </div>
        <div class='centrado'>
            <img src='../imgbbdd/$nuevaimg' width=300 heigth=300>
        </div>
        ";
    }

    print "
        <div class='centrado'>
            <a href=index.php class='bap mb20px vbap mt25px'>Volver</a>
        </div>
        ";  
}
print "
</div>
    </div>";
include_once("footerpanel.php")
?>