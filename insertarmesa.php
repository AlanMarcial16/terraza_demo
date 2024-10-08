<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pruebar";

// Crea la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica la conexión
if ($conn->connect_error) {
  die("Error de conexión: " . $conn->connect_error);
}

// Obtiene los datos del formulario
$nombre = $_POST["nombre"];
$capacidad = $_POST["capacidad"];
$estado = $_POST["estado"];

// Prepara la consulta SQL para insertar los datos en la tabla de mesas
$sql = "INSERT INTO mesas (nombre, capacidad, estado) VALUES ('$nombre', '$capacidad', '$estado')";

// Ejecuta la consulta SQL
if ($conn->query($sql) === TRUE) {
  Header("Location: panel.php");
  } else {
    echo "Error al guardar la mesa: " . $conn->error;
  }
  
  
?>