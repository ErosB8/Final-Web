<?php
session_start();
require_once("../conexion.php");

if($conexion){
    $email2=$_POST['email2'];
    $contraseña2=$_POST['contraseña2'];

    $consulta= "SELECT * FROM usuario WHERE correo='$email2' AND contrasena=MD5('$contraseña2')";

    $resultado=mysqli_query($conexion,$consulta);
    $filas = mysqli_fetch_array($resultado);

    if($filas) {
        if($filas['estado_id'] == '1'){
            session_start();
            $_SESSION['estado_id'] = '1';
            header("Location: ../panel/index.php");
        } else {
            session_start();
            $_SESSION['usuario'] = $filas;
            header("Location: ../index.php");
        }

        if($filas['estado_id'] == '3'){
            header("Location: ../login.php?Ban=ok");
        }
    } else {
        header("Location: ../login.php?noexiste=ok");
    }


    

    
}


?>