<?php

session_start();
 
// Verificar si el usuario inició sesión, if no redireccionar al pagina "login"
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bienvenido</title>
    <link href="Style.css" type="text/css" rel="stylesheet">
    
   
</head>
<body class="bg-dark">
    
  

    <h1><span> Bienvenido al sistema Santorini <span>MGV</span></span> </h1>
    <h2><span>A cual modulo desea acceder?</span></h2>
    
   








    <p>
    <a href="client.php" class="btn btn-outline-primary btn-lg">Mod Cliente</a>
    <a href="product.php" class="btn btn-outline-secondary btn-lg">Mod Producto</a>
    <a href="supplier.php" class="btn btn-outline-danger btn-lg">Mod Proveedor</a>
    
        
        <a href="logout.php" class="btn btn-light ml-3">Cerrar sesión</a>
    </p>
</body>
</html>
