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
                        <h4>Editar producto
                            <a href="product.php" class="btn btn-danger float-end">Atras</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['id']))
                        {
                            $id_producto = mysqli_real_escape_string($link, $_GET['id']);
                            $query = "SELECT * FROM producto WHERE id='$id_producto' ";
                            $query_run = mysqli_query($link, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $product = mysqli_fetch_array($query_run);
                                ?>
                                <form action="code2.php" method="POST">
                                    <input type="hidden" name="id" value="<?= $product['id']; ?>">

                                    <div class="mb-3">
                                        <label>Nombre del producto</label>
                                        <input type="text" name="nombre_producto" value="<?=$product['nombre_producto'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Categoria</label>
                                        <input type="text" name="categoria" value="<?=$product['categoria'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Stock
                                        <input type="text" name="stock" value="<?=$product['stock'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Precio</label>
                                        <input type="text" name="precio" value="<?=$product['precio'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" name="update_product" class="btn btn-primary">
                                            Actualizar producto
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