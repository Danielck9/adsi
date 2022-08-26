<?php
session_start();
require 'config.php';

if(isset($_POST['delete_client']))
{
    $id_cliente = mysqli_real_escape_string($link, $_POST['delete_client']);

    $query = "DELETE FROM clientes WHERE id='$id_cliente' ";
    $query_run = mysqli_query($link, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Cliente eliminado";
        header("Location: client.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Cliente no pudo ser eliminado";
        header("Location: client.php");
        exit(0);
    }
}

if(isset($_POST['update_client']))
{
    $id_cliente = mysqli_real_escape_string($link, $_POST['id']);

    $name = mysqli_real_escape_string($link, $_POST['nombre_cliente']);
    $address = mysqli_real_escape_string($link, $_POST['direccion']);
    $mail = mysqli_real_escape_string($link, $_POST['correo']);
    $phone = mysqli_real_escape_string($link, $_POST['telefono']);

    $query = "UPDATE clientes SET nombre_cliente='$name', direccion='$address', correo='$mail', telefono='$phone' WHERE id='$id_cliente' ";
    $query_run = mysqli_query($link, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Cliente actualizado";
        header("Location: client.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Cliente no pudo ser actualizado";
        header("Location: client.php");
        exit(0);
    }

}


if(isset($_POST['save_client']))
{
    $name = mysqli_real_escape_string($link, $_POST['nombre_cliente']);
    $address = mysqli_real_escape_string($link, $_POST['direccion']);
    $mail = mysqli_real_escape_string($link, $_POST['correo']);
    $phone = mysqli_real_escape_string($link, $_POST['telefono']);

    $query = "INSERT INTO clientes (nombre_cliente,direccion,correo,telefono) VALUES ('$name','$address','$mail','$phone')";

    $query_run = mysqli_query($link, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Cliente creado satisfactoriamente";
        header("Location: create_client.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Error al crear cliente";
        header("Location: create_client.php");
        exit(0);
    }
}

?>