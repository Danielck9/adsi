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

    <title>Vista de producto</title>
</head>
<body>

    <div class="container mt-5">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Detalles del producto 
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
                                
                                    <div class="mb-3">
                                        <label>Nombre del producto</label>
                                        <p class="form-control">
                                            <?=$product['nombre_producto'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Categoria</label>
                                        <p class="form-control">
                                            <?=$product['categoria'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Stock</label>
                                        <p class="form-control">
                                            <?=$product['stock'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Precio</label>
                                        <p class="form-control">
                                            <?=$product['precio'];?>
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
