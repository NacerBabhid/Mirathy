<?php 
session_start();
if(isset($_SESSION['autorise'])){
    include "NavbarConnect.inc.php";
}else{
    include "NavbarGuest.inc.php";
}
?>