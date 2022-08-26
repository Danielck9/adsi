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

    <title>Clientes CRUD</title>
</head>
<body>
  
    <div class="container mt-4">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Detalles de los clientes
                            <a href="create_client.php" class="btn btn-primary float-end">Añadir cliente</a>
                            <a href="welcome.php" class="btn btn-primary float-end">Atras</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre Cliente</th>
                                    <th>Direccion del cliente</th>
                                    <th>Correo</th>
                                    <th>telefono</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $query = "SELECT * FROM clientes";
                                    $query_run = mysqli_query($link, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $client)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $client['id']; ?></td>
                                                <td><?= $client['nombre_cliente']; ?></td>
                                                <td><?= $client['direccion']; ?></td>
                                                <td><?= $client['correo']; ?></td>
                                                <td><?= $client['telefono']; ?></td>
                                                <td>
                                                    <a href="view_client.php?id=<?= $client['id']; ?>" class="btn btn-info btn-sm">Ver</a>
                                                    <a href="edit_client.php?id=<?= $client['id']; ?>" class="btn btn-success btn-sm">Editar</a>-
                                                    <form action="code.php" method="POST" class="d-inline">
                                                        <button type="submit" name="delete_client" value="<?=$client['id'];?>" class="btn btn-danger btn-sm">Borrar</button>
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