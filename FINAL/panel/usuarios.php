<?php
require_once("../registros/admin.php");
require_once("../conexion.php");
include_once("headerpanel.php");
if($conexion != NULL){
    print "
    <main class='container-fluid mainpanel'>
        <div class='row'>
            <div class='col centrado'>
                <a href='index.php' class='bap mb20px vbap mt25px'>Productos</a>
            </div>
        </div>
        <div class='row'>
            <div class='col centrado'>
                <p class='pame'>Usuarios</p>
            </div>
        </div>
        
    ";

    $cons = "SELECT * FROM usuarios";

    $respuesta = mysqli_query($conexion,$cons);

    
    print "<div class='row'>
             <div class='col centrado'>
                <table border=1 >
                <tr>
                    <th class='border'>ID</th>
                    <th class='border'>EMAIL</th>
                    <th class='border'>USUARIO</th>
                    <th class='border'>CONTRASEÑA</th>
                    <th class='border'>NIVEL</th>
                    <th class='border'>ESTADO</th>
                </tr>    
    ";

    while ($row = mysqli_fetch_array($respuesta)) {
        print "
            
            <tr>
                <td class='border'>$row[ID]</td>
                <td class='border'>$row[EMAIL]</td>
                <td class='border'>$row[USUARIO]</td>
                <td class='border'>$row[CONTRASEÑA]</td>
                <td class='border'>$row[NIVEL]</td>
                <td class='border'>$row[ESTADO]</td>
                <td class='border'><a href='modificarusuario.php?id=$row[ID]'>Modificar</a></td>
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

<?php
    include_once("footerpanel.php")
?>