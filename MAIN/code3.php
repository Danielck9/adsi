<?php
session_start();
require 'config.php';

if(isset($_POST['delete_supplier']))
{
    $id_Proveedor = mysqli_real_escape_string($link, $_POST['delete_supplier']);

    $query = "DELETE FROM proveedores WHERE id='$id_Proveedor' ";
    $query_run = mysqli_query($link, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Proveedor eliminado";
        header("Location: supplier.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Proveedor no pudo ser eliminado";
        header("Location: supplier.php");
        exit(0);
    }
}

if(isset($_POST['update_supplier']))
{
    $id_Proveedor = mysqli_real_escape_string($link, $_POST['id']);

    $namess = mysqli_real_escape_string($link, $_POST['nombre_proveedor']);
    $phoness = mysqli_real_escape_string($link, $_POST['telefono']);
    $adress = mysqli_real_escape_string($link, $_POST['direccion']);
    

    $query = "UPDATE proveedores SET nombre_proveedor='$namess', telefono='$phoness', direccion='$adress' WHERE id='$id_Proveedor' ";
    $query_run = mysqli_query($link, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Proveedor actualizado";
        header("Location: supplier.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Proveedor no pudo ser actualizado";
        header("Location: supplier.php");
        exit(0);
    }

}


if(isset($_POST['save_supplier']))
{
    $namess = mysqli_real_escape_string($link, $_POST['nombre_proveedor']);
    $phoness = mysqli_real_escape_string($link, $_POST['telefono']);
    $adress = mysqli_real_escape_string($link, $_POST['direccion']);
    

    $query = "INSERT INTO proveedores (nombre_proveedor,telefono,direccion) VALUES ('$namess','$phoness','$adress')";

    $query_run = mysqli_query($link, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Proveedor creado satisfactoriamente";
        header("Location: create_supplier.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Error al crear Proveedor";
        header("Location: create_supplier.php");
        exit(0);
    }
}

?>