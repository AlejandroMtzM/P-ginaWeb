<?php
// Include config file
require_once "config.php";

//Se toma la variable del botón de la tienda
//echo $_GET["var"];

if( isset($_GET["variable"]) ){
    $consulta=($_GET['variable']);
    switch ($consulta) {
        case 'valor1':
            $sql = "INSERT INTO carrito (idProd, nombre, descripcion, cantidad, precio) VALUES (1, 'Maybelline Great Lash Blackest Black','Da volumen natural a las pestañas',1, 100);";        
            $resultado = mysqli_query($link, $sql, MYSQLI_USE_RESULT) or die('Consulta fallida: ' . mysqli_error($link));
        break;
        case 'valor2':
            $sql = "INSERT INTO carrito (idProd, nombre, descripcion, cantidad, precio) VALUES (2, 'Lashblast Volume Waterproof Mascara', 'Black by CoverGirl for Women ', 10, 1200.0000);";        
            $resultado = mysqli_query($link, $sql, MYSQLI_USE_RESULT) or die('Consulta fallida: ' . mysqli_error($link));
        break;
        case 'valor3':
            $sql = "INSERT INTO carrito (idProd, nombre, descripcion, cantidad, precio) VALUES (3, 'Paris Loreal mascara de pestanas', 'air volume mega mascara lavable', 1, 249.0000);";        
            $resultado = mysqli_query($link, $sql, MYSQLI_USE_RESULT) or die('Consulta fallida: ' . mysqli_error($link));
        break;
    }
    echo $consulta;
}else{
    echo 'No se han recibido datos';
}

// Close connection
mysqli_close($link);
header("location: Carrito.php");
exit();

?>