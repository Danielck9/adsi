<?php
    if(isset($_SESSION['message'])) :
?>

    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Hey!</strong> <?= $_SESSION['message']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

<?php 
    unset($_SESSION['message']);
    endif;
?>




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

    <title>Proveedor CRUD</title>
</head>
<body>
  
    <div class="container mt-4">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Detalles de los Proveedores
                            <a href="create_supplier.php" class="btn btn-primary float-end">Añadir Proveedor</a>
                            <a href="welcome.php" class="btn btn-primary float-end">Atras</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre del Proveedor</th>
                                    <th>Telefono</th>
                                    <th>Direccion</th>
                                    
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $query = "SELECT * FROM proveedores";
                                    $query_run = mysqli_query($link, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $supplier)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $supplier['id']; ?></td>
                                                <td><?= $supplier['nombre_proveedor']; ?></td>
                                                <td><?= $supplier['telefono']; ?></td>
                                                <td><?= $supplier['direccion']; ?></td>
                                                
                                                <td>
                                                    <a href="view_supplier.php?id=<?= $supplier['id']; ?>" class="btn btn-info btn-sm">Ver</a>
                                                    <a href="edit_supplier.php?id=<?= $supplier['id']; ?>" class="btn btn-success btn-sm">Editar</a>-
                                                    <form action="code3.php" method="POST" class="d-inline">
                                                        <button type="submit" name="delete_supplier" value="<?=$supplier['id'];?>" class="btn btn-danger btn-sm">Borrar</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "<h5> No Record Found </h5>";
                                    }
                                ?>
                                
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>