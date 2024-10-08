<?php
// Conecta a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pruebar";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Conexión fallida: " . $conn->connect_error);
}

// Recupera los datos enviados desde el formulario
$mesa_id = $_POST["mesa_id"];
$nombre = $_POST["nombre"];
$capacidad = $_POST["capacidad"];
$estado = $_POST["estado"];
$tipo = $_POST["tipo"];
$habitacion = $_POST["habitacion"];
$comensal = $_POST["comensal"];
$comentario = $_POST["comentario"];

// Actualiza los datos de la mesa en la base de datos
$sql = "UPDATE mesas SET nombre='$nombre', capacidad='$capacidad', estado='$estado', tipo='$tipo', habitacion='$habitacion', comensal='$comensal', comentario='$comentario' WHERE id='$mesa_id'";

if ($conn->query($sql) === TRUE) {
    Header("Location: panel.php");
} else {
  echo "Error al actualizar la mesa: " . $conn->error;
}

// Cierra la conexión
$conn->close();
?>
