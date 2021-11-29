<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$idCliente = $nombre = $direccion = $CP = $telefono = $ciudad = $estado = $pais = "";
$idCliente_err = $nombre_err = $direccion_err = $CP_err = $telefono_err = $ciudad_err = $estado_err = $pais_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // validar idcliente
    $input_idCliente = trim($_POST["idCliente"]);
    if(empty($input_idCliente)){
        $idCliente_err = "Ingresa un dato válido.";     
    } else{
        $idCliente = $input_idCliente;
    }
    // validar nombre
    $input_nombre = trim($_POST["nombre"]);
    if(empty($input_nombre)){
        $nombre_err = "Ingresa un nombre válido.";
    } elseif(!filter_var($input_nombre, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $nombre_err = "Ingresa un nombre válido.";
    } else{
        $nombre = $input_nombre;
    }
    
    // validar direccion
    $input_direccion = trim($_POST["direccion"]);
    if(empty($input_direccion)){
        $direccion_err = "Ingresa un dato válido.";     
    } else{
        $direccion = $input_direccion;
    }
    // validar CP
    $input_CP = trim($_POST["CP"]);
    if(empty($input_CP)){
        $CP_err = "Ingresa un dato válido.";     
    } else{
        $CP = $input_CP;
    }
   // validar telefono
   $input_telefono = trim($_POST["telefono"]);
   if(empty($input_telefono)){
       $telefono_err = "Ingresa un dato válido.";     
   } else{
       $telefono = $input_telefono;
   }
    // validar ciudad
   $input_ciudad = trim($_POST["ciudad"]);
   if(empty($input_ciudad)){
       $ciudad_err = "Ingresa un dato válido.";     
   } else{
       $ciudad = $input_ciudad;
   }
   // validar estado
   $input_estado = trim($_POST["estado"]);
   if(empty($input_estado)){
       $estado_err = "Ingresa un dato válido.";     
   } else{
       $estado = $input_estado;
   }
   // validar pais
   $input_pais = trim($_POST["pais"]);
   if(empty($input_pais)){
       $pais_err = "Ingresa un dato válido.";     
   } else{
       $pais = $input_pais;
   }

    // Check input errors before inserting in database
    if(empty($idCliente_err) && empty($nombre_err) && empty($direccion_err) && empty($CP_err) && empty($telefono_err)&& empty($ciudad_err) && empty($estado_err) && empty($pais_err)){
    
        // Prepare an insert statement
        $sql = "INSERT INTO Cliente (idCliente, nombre, direccion, CP, telefono, ciudad, estado, pais) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssssss", $param_idCliente, $param_nombre, $param_direccion, $param_CP, $param_telefono, $param_ciudad,$param_estado, $param_pais);

            // Set parameters $idCliente = $nombre = $direccion = $CP = $telefono = $ciudad = $estado = $pais = "";
            $param_idCliente = $idCliente;
            $param_nombre = $nombre;
            $param_direccion = $direccion;
            $param_CP = $CP;
            $param_telefono = $telefono;
            $param_ciudad = $ciudad;
            $param_estado = $estado;
            $param_pais = $pais;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: home.php");
                exit();
            } else{
                echo "Ocurrió un error.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
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
                    <h2 class="mt-5">Create Record</h2>
                    <p>Please fill this form and submit to add employee record to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                        <label>idCliente</label>
                            <input type="text" name="idCliente" class="form-control <?php echo (!empty($idCliente_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $idCliente; ?>">
                            <span class="invalid-feedback"><?php echo $idCliente_err;?></span>
                        </div>
                        <div class="form-group">
                        <label>nombre</label>
                            <input type="text" name="nombre" class="form-control <?php echo (!empty($nombre_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $nombre; ?>">
                            <span class="invalid-feedback"><?php echo $nombre_err;?></span>
                        </div>
                        <div class="form-group">
                        <label>direccion</label>
                            <textarea name="direccion" class="form-control <?php echo (!empty($direccion_err)) ? 'is-invalid' : ''; ?>"><?php echo $direccion; ?></textarea>
                            <span class="invalid-feedback"><?php echo $direccion_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>CP</label>
                            <input type="text" name="CP" class="form-control <?php echo (!empty($CP_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $CP; ?>">
                            <span class="invalid-feedback"><?php echo $CP_err;?></span>
                        </div>
                        <div class="form-group">
                        <label>telefono</label>
                            <input type="text" name="telefono" class="form-control <?php echo (!empty($telefono_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $telefono; ?>">
                            <span class="invalid-feedback"><?php echo $telefono_err;?></span>
                        </div>
                        <div class="form-group">
                        <label>ciudad</label>
                            <input type="text" name="ciudad" class="form-control <?php echo (!empty($ciudad_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $ciudad; ?>">
                            <span class="invalid-feedback"><?php echo $ciudad_err;?></span>
                        </div>
                        <div class="form-group">
                        <label>estado</label>
                            <input type="text" name="estado" class="form-control <?php echo (!empty($estado_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $estado; ?>">
                            <span class="invalid-feedback"><?php echo $estado_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>pais</label>
                            <input type="text" name="pais" class="form-control <?php echo (!empty($pais_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $pais; ?>">
                            <span class="invalid-feedback"><?php echo $pais_err;?></span>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="home.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>