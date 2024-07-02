<?php
session_start();
require_once("../conexion.php");

if($conexion){
    $email2=$_POST['email2'];
    $contraseña2=$_POST['contraseña2'];

    $consulta= "SELECT * FROM usuarios WHERE EMAIL='$email2' AND CONTRASEÑA=MD5('$contraseña2')";

    $resultado=mysqli_query($conexion,$consulta);
    $filas = mysqli_fetch_array($resultado);

    if($filas['NIVEL'] == 'Admin'){
        $_SESSION = $filas;
        header("Location: ../panel/index.php");
    }else{
        $_SESSION = $filas;
        header("Location: ../session/index.php");
    }

    if($filas == NULL){
        header("Location: ../login.php?noexiste=ok");
    }

    if($filas['ESTADO'] == 'Ban'){
        header("Location: ../login.php?Ban=ok");

    }

    

    
}


?>