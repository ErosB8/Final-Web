<?php
require_once("../registros/admin.php");
require_once("../conexion.php");
include_once("headerpanel.php");
if($conexion != NULL){
    if(isset($_GET['id'])){

        $id=$_GET['id'];

    }
    
    $cons= "SELECT id, nombre, descripcion, color, precio, foto, categoria_id FROM producto WHERE id='$id'"; 

    $respuesta= mysqli_query($conexion,$cons);

    if($respuesta){

        $row=mysqli_fetch_array($respuesta);
        print "
            <form class='formpanel container-fluid' action=modificar2.php method=get>
                <div class='row'>
                    <div class='col centrado'>
                        <input name=id type=hidden value=$row[id] />
                    </div>
                </div>
                <div class='row'>
                    <div class='col centrado'>
                        <label for=nombre >Modificar nombre</label>
                        <input id=nombre name=nombre type=text value=$row[nombre]>
                    </div>
                </div>
                <div class='row'>
                    <div class='col centrado'>
                        <label for=color >Modificar color</label>
                        <input id=color name=color type=text value=$row[color]>
                    </div>
                </div>
                <div class='row'>
                    <div class='col centrado'>
                        <label for=precio >Modificar precio</label>
                        <input id=precio name=precio type=text value=$row[precio]>
                    </div>
                </div>
                <div class='row'>
                    <div class='col centrado'>
                        <button class='bap mb20px mt25px' type='submit' value=Modificar>Modificar</button>
                    </div>
                </div>
                    
                


            </form>
        ";
          
       
    }
}
include_once("footerpanel.php")
?>