<?php
require_once("../registros/admin.php");
require_once("../conexion.php");
include_once("headerpanel.php");
if($conexion != NULL){
    if(isset($_GET['id'])){

        $id=$_GET['id'];

    }
    
    $cons= "SELECT * FROM usuario WHERE id='$id'"; 

    $respuesta= mysqli_query($conexion,$cons);

    if($respuesta){

        $row=mysqli_fetch_array($respuesta);
        print "
            <form class='formpanel container-fluid' action=modificarusuario2.php method=get>
                <div class='row'>
                    <div class='col centrado'>
                        <input name=id type=hidden value=$row[id]/>
                        <h1><strong>Modificar al usuario ID = $row[id]</strong><h1>
                    </div>
                </div>
                <div class='row'>
                    <div class='col centrado'>
                        <label for=estado >Modificar ESTADO (Admin/Usuario/Ban)</label>
                    </div>
                </div>
                <div class='row'>
                    <div class='col centrado'>
                        <input id=estado name=estado type=text value=$row[nombre_estado]>
                    </div>
                </div>
                <div class='row'>
                    <div class='col centrado'>
                        <button class='bap mb20px mt25px' type='submit' value=modificarusuario>Modificar</button>
                    </div>
                </div>
                    
                


            </form>
        ";
          
       
    }
}
include_once("footerpanel.php")
?>