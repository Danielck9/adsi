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

    <title>Crear Cliente</title>
</head>
<body>
  
    <div class="container mt-5">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Añadir Cliente
                            <a href="client.php" class="btn btn-danger float-end">Atras</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="code.php" method="POST">

                            <div class="mb-3">
                                <label>Nombre del cliente</label>
                                <input type="text" name="nombre_cliente" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Direccion</label>
                                <input type="text" name="direccion" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Correo</label>
                                <input type="email" name="correo" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Telefono</label>
                                <input type="text" name="telefono" class="form-control">
                            </div>
                            <div class="mb-3">
                                <button type="ingresar" name="save_client" class="btn btn-primary">Guardar Cliente</button>
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