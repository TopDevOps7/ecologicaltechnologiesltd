<?php
ini_set('memory_limit', "4096M");

if(session_status() == PHP_SESSION_NONE){
    //session has not started
    session_start();
}

// error_reporting(E_ALL);
$DB_host = "localhost";
$DB_user = "root";
$DB_pass = "";
$DB_name = "price_db";
//$DB_host = "gavipigi.mysql.db.internal";
//$DB_user = "gavipigi_gws";
//$DB_pass = "Cj13J9+k*h!N=AWEEPmR";
//$DB_name = "gavipigi_gwm";

try
{
    $DB_con = new PDO("mysql:host={$DB_host};dbname={$DB_name}",$DB_user,$DB_pass);
    $DB_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)  
{
    echo $e->getMessage();
}

include_once 'class.crud.php';
$crud = new crud($DB_con, $ln);

?>