<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	
	<link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

	<title>Carrito</title>
      <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
      </script>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-5 mb-3 clearfix">
                        <h2 class="pull-left">Clientes</h2>
                        
                        <a href="Create.php" class="btn btn-success pull-right"><i class="fa fa-plus"></i>Agregar cliente</a>
                        <a href="../index.html" class="btn btn-success pull-right"><i class="fa fa-chevron-left"></i> Regresar</a>
                    </div>
                    <?php
                    session_start();
                    
                    // Include config file
                    require_once "config.php";
                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM Cliente";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo '<table class="table table-bordered table-striped">';
                                echo "<thead>";
                                    echo "<tr>";
                                    echo "<th>idCliente</th>";                                   
                                    echo "<th>nombre</th>";
                                    echo "<th>direccion</th>";
                                    echo "<th>CP</th>";
                                    echo "<th>telefono</th>";
                                    echo "<th>ciudad</th>";
                                    echo "<th>estado</th>";
                                    echo "<th>pais</th>";

                                echo "</tr>";
                            echo "</thead>";
                            echo "<tbody>";
                            while($row = mysqli_fetch_array($result)){
                                echo "<tr>";
                                    echo "<td>" . $row['idCliente'] . "</td>";
                                    echo "<td>" . $row['nombre'] . "</td>";
                                    echo "<td>" . $row['direccion'] . "</td>";
                                    echo "<td>" . $row['CP'] . "</td>";
                                    echo "<td>" . $row['telefono'] . "</td>";
                                    echo "<td>" . $row['ciudad'] . "</td>";
                                    echo "<td>" . $row['estado'] . "</td>";
                                    echo "<td>" . $row['pais'] . "</td>";
                                    echo "<td>";
                                            echo '<a href="Read.php?idCliente='. $row['idCliente'] .'" class="mr-3" title="Ver información del cliente" data-toggle="tooltip"><span class="fa fa-eye"></span></a>';
                                            echo '<a href="Update.php?idCliente='. $row['idCliente'] .'" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>';
                                            echo '<a href="Delete.php?idCliente='. $row['idCliente'] .'" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo '<div class="alert alert-danger"><em>No se ha encontrado nada.</em></div>';
                        }
                    } else{
                        echo "Algo salió mal.";
                    }
 
                    // Close connection
                    mysqli_close($link);
                    ?>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>