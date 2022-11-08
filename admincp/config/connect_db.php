<?php
error_reporting(E_ALL);
ini_set('log_errors', 1);
ini_set('display_errors', 1);
ini_set('error_log', 'errors.log');
ini_set("error_reporting", E_ALL);

try{
    /*$db = new PDO('mysql:host=localhost;dbname=greatifealumni_oaualumni','greatifealumni_oaualumni','new@100_');*/
    $db = new PDO('mysql:host=localhost;dbname=luxuryHotel','root','localhost');
    $db->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET SESSION sql_mode = ''");
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    //echo 'Connection Successfull';
}catch(PDOException $e){
    die($e->getmessage());
}


?>
