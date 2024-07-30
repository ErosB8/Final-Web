<?php
require_once("../registros/admin.php");
require_once("../conexion.php");
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

    $cons = "
    SELECT usuario.id, usuario.correo, usuario.nombre, usuario.contrasena, estado.nombre AS nombre_estado 
    FROM usuario 
    INNER JOIN estado ON usuario.estado_id = estado.id";

    $respuesta = mysqli_query($conexion,$cons);

    
    print "<div class='row'>
             <div class='col centrado'>
                <table border=1 >
                <tr>
                    <th class='border'>ID</th>
                    <th class='border'>EMAIL</th>
                    <th class='border'>USUARIO</th>
                    <th class='border'>CONTRASEÑA</th>
                    <th class='border'>ESTADO</th>
                    <th class='border'>MODIFICAR</th>
                    <th class='border'>ELIMINAR</th>
                </tr>    
    ";

    while ($row = mysqli_fetch_array($respuesta)) {
        print "
            
            <tr>
                <td class='border'>$row[id]</td>
                <td class='border'>$row[correo]</td>
                <td class='border'>$row[nombre]</td>
                <td class='border'>$row[contrasena]</td>
                <td class='border'>$row[nombre_estado]</td>
                <td class='border'><a href='modificarusuario.php?id=$row[id]'>Modificar</a></td>
                <td class='border'><a href='eliminarusuario.php?id=$row[id]'>Eliminar</a></td>
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