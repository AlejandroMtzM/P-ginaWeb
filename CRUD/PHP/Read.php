<?php
// Check existence of id parameter before processing further
if(isset($_GET["idCliente"]) && !empty(trim($_GET["idCliente"]))){
    // Include config file
    require_once "config.php";
    
    // Prepare a select statement
    $sql = "SELECT * FROM Cliente WHERE idCliente = ?";
    
    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        
        // Set parameters
        $param_id = trim($_GET["idCliente"]);
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
    
            if(mysqli_num_rows($result) == 1){
                /* Fetch result row as an associative array. Since the result set
                contains only one row, we don't need to use while loop */
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                
                // Retrieve individual field value
                $idCliente= $row["idCliente"];
                $nombre = $row["nombre"];
                $direccion = $row["direccion"];
                $CP = $row["CP"];
                $telefono = $row["telefono"];
                $ciudad = $row["ciudad"];
                $estado = $row["estado"];
                $pais = $row["pais"];
               
            } else{
                // URL doesn't contain valid id parameter. Redirect to error page
                header("location: error.php");
                exit();
            }
            
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
     
    // Close statement
    mysqli_stmt_close($stmt);
    
    // Close connection
    mysqli_close($link);
} else{
    // URL doesn't contain id parameter. Redirect to error page
    header("location: error.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="mt-5 mb-3">Información del Cliente</h1>
                    <div class="form-group">
                        <label>Nombre</label>
                        <p><b><?php echo $row["nombre"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Dirección</label>
                        <p><b><?php echo $row["direccion"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Código postal</label>
                        <p><b><?php echo $row["CP"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Telefono</label>
                        <p><b><?php echo $row["telefono"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Ciudad</label>
                        <p><b><?php echo $row["ciudad"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Estado</label>
                        <p><b><?php echo $row["estado"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Pais</label>
                        <p><b><?php echo $row["pais"]; ?></b></p>
                    </div>                   
                
                    <p><a href="home.php" class="btn btn-primary">Back</a></p>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>