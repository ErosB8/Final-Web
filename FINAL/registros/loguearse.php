<?php
session_start();
require_once("../conexion.php");

if($conexion){
    $email2=$_POST['email2'];
    $contraseña2=$_POST['contraseña2'];

    $consulta= "SELECT * FROM usuarios WHERE EMAIL='$email2' AND CONTRASEÑA=MD5('$contraseña2')";

    $resultado=mysqli_query($conexion,$consulta);
    $filas = mysqli_fetch_array($resultado);

    if($filas) {
        if($filas['NIVEL'] == 'Admin'){
            session_start();
            $_SESSION['usuario'] = $filas;
            header("Location: ../panel/index.php");
        } else {
            session_start();
            $_SESSION['usuario'] = $filas;
            header("Location: ../index.php");
        }

        if($filas['ESTADO'] == 'Ban'){
            header("Location: ../login.php?Ban=ok");
        }
    } else {
        header("Location: ../login.php?noexiste=ok");
    }


    

    
}


?>