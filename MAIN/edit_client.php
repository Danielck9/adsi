<?php
session_start();
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

    <title>Edicion de clientes</title>
</head>
<body>
  
    <div class="container mt-5">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Editar cliente
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
                                <form action="code.php" method="POST">
                                    <input type="hidden" name="id" value="<?= $client['id']; ?>">

                                    <div class="mb-3">
                                        <label>Nombre del cliente</label>
                                        <input type="text" name="nombre_cliente" value="<?=$client['nombre_cliente'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Direccion del cliente</label>
                                        <input type="text" name="direccion" value="<?=$client['direccion'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Correo del cliente</label>
                                        <input type="email" name="correo" value="<?=$client['correo'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Telefono del Cliente</label>
                                        <input type="text" name="telefono" value="<?=$client['telefono'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" name="update_client" class="btn btn-primary">
                                            Actualizar cliente
                                        </button>
                                    </div>

                                </form>
                                <?php
                            }
                            else
                            {
                                echo "<h4>No se encontro esa ID</h4>";
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