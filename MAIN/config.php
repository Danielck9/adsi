<?php
    /* Credenciales de la base de datos */
    define('DB_SERVER', 'localhost');  //definir Servidor
    define('DB_USERNAME', 'root');     // definir Usuario
    define('DB_PASSWORD', 'seditsira257');      // Clave de la base de datos
    define('DB_NAME', 'adsi');      // Nombre de la base de datos
     
    /* intento de conexión con la base de datos MySql */
    $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
     
    // verificar conexión
    if($link === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
?>