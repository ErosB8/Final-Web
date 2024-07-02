<?php
session_start();
require_once("../conexion.php");

if($conexion){
    $email=$_POST['email'];
    $usuario=$_POST['usuario'];
    $contraseña=$_POST['contraseña'];
    $contraseña1=$_POST['contraseña1'];

    if($contraseña===$contraseña1){
        $consulta = "INSERT INTO usuarios SET EMAIL='$email', USUARIO='$usuario', CONTRASEÑA=MD5('$contraseña'), NIVEL='Usuario', ESTADO='Activo'";
    
        mysqli_query($conexion,$consulta);
        
        header("Location: ../login.php?registrarse=ok");
    } else {
        header("Location: ../login.php");
    }
    

}






?>