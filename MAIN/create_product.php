<?php
session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="Style.css" rel="stylesheet">

    <title>Crear Producto</title>
</head>
<body>
  
    <div class="container mt-5">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Añadir Producto
                            <a href="product.php" class="btn btn-danger float-end">Atras</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="code2.php" method="POST">

                            <div class="mb-3">
                                <label>Nombre del producto</label>
                                <input type="text" name="nombre_producto" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Categoria</label>
                                <input type="text" name="categoria" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Stock</label>
                                <input type="text" name="stock" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Precio</label>
                                <input type="text" name="precio" class="form-control">
                            </div>
                            <div class="mb-3">
                                <button type="ingresar" name="save_product" class="btn btn-primary">Guardar producto</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>