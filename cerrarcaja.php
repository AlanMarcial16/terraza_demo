<?php

include("conexion.php");
$con=conectar();

$sql = "TRUNCATE TABLE `cajaop`";
$query= mysqli_query($con,$sql);

$sql = "TRUNCATE TABLE `cajach`";
$query= mysqli_query($con,$sql);

    if($query){
        Header("Location: cajaint.php");
    }

?>