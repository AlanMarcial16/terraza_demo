<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pruebar_demo";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}


mysqli_close($conn);

// Redirigir a la página 'info_mesa1.php'
header("Location: reiniciar_mesa7.php");
exit;
?>
