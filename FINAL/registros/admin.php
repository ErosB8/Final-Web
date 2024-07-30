
<?php
include_once("../session/headersession.php");
session_start();
if(!isset($_SESSION['estado_id']) || $_SESSION['estado_id'] != '1' ){

    die("No tenes permisos, debes registrarte como administrador");

}

?>