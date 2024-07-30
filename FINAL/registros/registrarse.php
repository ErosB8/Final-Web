<?php
session_start();
require_once("../conexion.php");

if($conexion){
    $email=$_POST['email'];
    $usuario=$_POST['usuario'];
    $contraseña=$_POST['contraseña'];
    $contraseña1=$_POST['contraseña1'];

    if($contraseña===$contraseña1){
        $consulta = "INSERT INTO usuario SET nombre='$usuario', correo='$email', contrasena=MD5('$contraseña'), estado_id='2'";
    
        mysqli_query($conexion,$consulta);
        
        header("Location: ../login.php?registrarse=ok");
    } else {
        header("Location: ../login.php");
    }
    

}






?>