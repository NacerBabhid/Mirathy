<?php 
$hostname = "localhost";
$database_name = "myirth";
$database_user ="root";
$db_pwd ="";
$dsn ="mysql:host=$hostname;dbname=$database_name";
$option = array(PDO :: ATTR_ERRMODE => PDO :: ERRMODE_EXCEPTION );

$connection = new PDO($dsn,$database_user,$db_pwd,$option);
?>