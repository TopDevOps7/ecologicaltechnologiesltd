<?php 

if(session_status() == PHP_SESSION_NONE){
    //session has not started
    session_start();
}

$lang = "de";
if(isset($_SESSION['lang'])){
  $lang = $_SESSION['lang'];
}
require_once("$lang.php");

?>