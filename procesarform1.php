<?php
include("conexion.php");
$con = conectar();

$opcion = $_POST["opcion"];
$cantidad = $_POST["cantidad"];
$precio = $_POST["precio"];

date_default_timezone_set('America/Mexico_City');
$fyh_actual = date('Y-m-d H:i:s');

// Inserción en ordenMesa1
$sql = "INSERT INTO ordenMesa1 (nombre, cantidad, preciou, fyh) VALUES ('$opcion', '$cantidad', '$precio', '$fyh_actual')";
$query = mysqli_query($con, $sql);

// Inserción en ordenes_currentes
$sql = "INSERT INTO ordenes_currentes (nombre, mesa, fyh) VALUES ('$opcion', 'Mesa 1', '$fyh_actual')";
$query = mysqli_query($con, $sql);

if ($query) {
    $total_query = mysqli_query($con, "SELECT SUM(preciou) AS total FROM ordenMesa1");
    $total_row = mysqli_fetch_assoc($total_query);
    $total = $total_row['total'];

    setcookie("total", $total, time() + (86400 * 30), "/"); // 30 days

    session_start();
    $_SESSION['total'] = $total;

    // Código JavaScript para reproducir el sonido
    echo '<script>var audio = new Audio("sounds/xdxd.mp3"); audio.play();</script>';

    header("Location: {$_SERVER['HTTP_REFERER']}");
    exit();
}
?>

