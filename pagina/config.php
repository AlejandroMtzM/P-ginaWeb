<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'tienda');
 
//conexion a la bd
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
//Comprobar la conexion a la bd
if($link === false){
    die("ERROR: No se pudo conectar. " . mysqli_connect_error());
}
?>