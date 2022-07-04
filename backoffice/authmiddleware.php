<?php

//if(session_status() == PHP_SESSION_NONE){
//    //session has not started
//    session_start();
//}
include_once("../lang/config.php");
include_once('../utils/dbconfig.php');
include_once('../utils/config.php');

$isFileLogin = isset($_COOKIE['file_login_pass']);

// echo $isFileLogin;

if (!$isFileLogin && (!$isLogin))
{
    header('location: ../');
    exit;
} else {

  if(!isset($_REQUEST['path']) || $_REQUEST['path'] == "") {
    header('location: ../');
    exit;
  }
  $path = "{$_REQUEST['path']}";
  header("Content-Description: File Transfer");
  header("Content-Type: application/octet-stream");
  header("Content-Disposition: attachment; filename=" . basename($path));
  readfile($path);
  exit;
}

?>