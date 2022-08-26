<?php

session_start();
 

$_SESSION = array();
 

session_destroy();
 
// redireccionar a "login.php"
header("location: login.php");
exit;
?>