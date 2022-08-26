<?php
session_start();
require 'config.php';

if(isset($_POST['delete_product']))
{
    $id_producto = mysqli_real_escape_string($link, $_POST['delete_product']);

    $query = "DELETE FROM producto WHERE id='$id_producto' ";
    $query_run = mysqli_query($link, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Producto eliminado";
        header("Location: product.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Producto no pudo ser eliminado";
        header("Location: product.php");
        exit(0);
    }
}

if(isset($_POST['update_product']))
{
    $id_producto = mysqli_real_escape_string($link, $_POST['id']);

    $namep = mysqli_real_escape_string($link, $_POST['nombre_producto']);
    $category = mysqli_real_escape_string($link, $_POST['categoria']);
    $stock = mysqli_real_escape_string($link, $_POST['stock']);
    $price = mysqli_real_escape_string($link, $_POST['precio']);

    $query = "UPDATE producto SET nombre_producto='$namep', categoria='$category', stock='$stock', precio='$price' WHERE id='$id_producto' ";
    $query_run = mysqli_query($link, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Producto actualizado";
        header("Location: product.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Producto no pudo ser actualizado";
        header("Location: product.php");
        exit(0);
    }

}


if(isset($_POST['save_product']))
{
    $namep = mysqli_real_escape_string($link, $_POST['nombre_producto']);
    $category = mysqli_real_escape_string($link, $_POST['categoria']);
    $stock = mysqli_real_escape_string($link, $_POST['stock']);
    $price = mysqli_real_escape_string($link, $_POST['precio']);

    $query = "INSERT INTO producto (nombre_producto,categoria,stock,precio) VALUES ('$namep','$category','$stock','$price')";

    $query_run = mysqli_query($link, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Producto creado satisfactoriamente";
        header("Location: create_product.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Error al crear producto";
        header("Location: create_product.php");
        exit(0);
    }
}

?>