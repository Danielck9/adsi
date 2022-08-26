<?php
require 'config.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="Style.css" rel="stylesheet">

    <title>Vista de clientes</title>
</head>
<body>

    <div class="container mt-5">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Detalles del cliente 
                            <a href="client.php" class="btn btn-danger float-end">Atras</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['id']))
                        {
                            $id_cliente = mysqli_real_escape_string($link, $_GET['id']);
                            $query = "SELECT * FROM clientes WHERE id='$id_cliente' ";
                            $query_run = mysqli_query($link, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $client = mysqli_fetch_array($query_run);
                                ?>
                                
                                    <div class="mb-3">
                                        <label>Nombre del cliente</label>
                                        <p class="form-control">
                                            <?=$client['nombre_cliente'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Direccion del cliente</label>
                                        <p class="form-control">
                                            <?=$client['direccion'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Correo del cliente</label>
                                        <p class="form-control">
                                            <?=$client['correo'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Telefono del cliente</label>
                                        <p class="form-control">
                                            <?=$client['telefono'];?>
                                        </p>
                                    </div>

                                <?php
                            }
                            else
                            {
                                
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
