<?php

include("conexion.php");
$con=conectar();

$opcion = $_POST["opcion"];

$sql = "INSERT INTO ventadirecta (nombre) VALUES ('$opcion')";
$query= mysqli_query($con,$sql);

$sql = "INSERT INTO ordenes_currentes (nombre, mesa) VALUES ('$opcion', 'Mesa 1')";
$query=mysqli_query($con,$sql);

    if($query){
        header("Location: {$_SERVER['HTTP_REFERER']}");
    }

?>