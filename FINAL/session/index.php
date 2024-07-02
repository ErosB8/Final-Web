
<?php
include_once("headersession.php");
session_start();
if(!isset($_SESSION['NIVEL']) || $_SESSION['NIVEL'] != 'Usuario' ){

    header("Location: ../login.php?noexiste=ok");

} else if(!isset($_SESSION['ID'])){

    header("Location: ../index.php");

}else{
    print "<h1 class='centrado'>Logueado</h1>";
    var_dump($_SESSION);
}

?>

<?php
    include_once("footersession.php")
?>