<?php
require_once("../registros/admin.php");
require_once("../conexion.php");
include_once("headerpanel.php");
if($conexion != NULL){
    if(isset($_GET['id'])){

        $id=$_GET['id'];

    }
    
    $cons= "SELECT * FROM usuarios WHERE id='$id'"; 

    $respuesta= mysqli_query($conexion,$cons);

    if($respuesta){

        $row=mysqli_fetch_array($respuesta);
        print "
            <form class='formpanel container-fluid' action=modificarusuario2.php method=get>
                <div class='row'>
                    <div class='col centrado'>
                        <input name=ID type=hidden value=$row[ID]/>
                        <h1><strong>Modificar al usuario ID = $row[ID]</strong><h1>
                    </div>
                </div>
                <div class='row'>
                    <div class='col centrado'>
                        <label for=NIVEL >Modificar NIVEL (Admin/Usuario)</label> 
                    </div>
                </div>
                <div class='row'>
                    <div class='col centrado'>
                        <input id=NIVEL name=NIVEL type=text value=$row[NIVEL]>
                    </div>
                </div>
                <div class='row'>
                    <div class='col centrado'>
                        <label for=ESTADO >Modificar ESTADO (Activo/Ban)</label>
                    </div>
                </div>
                <div class='row'>
                    <div class='col centrado'>
                        <input id=ESTADO name=ESTADO type=text value=$row[ESTADO]>
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