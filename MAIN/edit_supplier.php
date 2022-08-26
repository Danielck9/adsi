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

    <title>Edicion de proveedores</title>
</head>
<body>
  
    <div class="container mt-5">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Editar proveedor
                            <a href="supplier.php" class="btn btn-danger float-end">Atras</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['id']))
                        {
                            $id_Proveedor = mysqli_real_escape_string($link, $_GET['id']);
                            $query = "SELECT * FROM proveedores WHERE id='$id_Proveedor' ";
                            $query_run = mysqli_query($link, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $supplier = mysqli_fetch_array($query_run);
                                ?>
                                <form action="code3.php" method="POST">
                                    <input type="hidden" name="id" value="<?= $supplier['id']; ?>">

                                    <div class="mb-3">
                                        <label>Nombre del proveedor</label>
                                        <input type="text" name="nombre_proveedor" value="<?=$supplier['nombre_proveedor'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Categoria</label>
                                        <input type="text" name="telefono" value="<?=$supplier['telefono'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Stock
                                        <input type="text" name="direccion" value="<?=$supplier['direccion'];?>" class="form-control">
                                    </div>

                                    <div class="mb-3">
                                        <button type="submit" name="update_supplier" class="btn btn-primary">
                                            Actualizar proveedor
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