<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pruebar_demo";

// Crea la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica la conexión
if ($conn->connect_error) {
  die("Error de conexión: " . $conn->connect_error);
}

// Consulta las mesas disponibles
$sql_disponible = "SELECT * FROM mesas WHERE estado='Disponible'";
$resultado_disponible = $conn->query($sql_disponible);

// Consulta las mesas ocupadas
$sql_ocupada = "SELECT * FROM mesas WHERE estado='ocupada'";
$resultado_ocupada = $conn->query($sql_ocupada);

// Muestra las mesas disponibles
echo "<h2>Mesas disponibles:</h2>";
if ($resultado_disponible->num_rows > 0) {
  while($fila = $resultado_disponible->fetch_assoc()) {
    echo "Mesa " . $fila["nombre"] . " - Capacidad: " . $fila["capacidad"] . "<br>";
  }
} else {
  echo "No hay mesas disponibles";
}

// Muestra las mesas ocupadas
echo "<h2>Mesas ocupadas:</h2>";
if ($resultado_ocupada->num_rows > 0) {
  while($fila = $resultado_ocupada->fetch_assoc()) {
    echo "Mesa " . $fila["nombre"] . " - Capacidad: " . $fila["capacidad"] . "<br>";
  }
} else {
  echo "No hay mesas ocupadas";
}

// Cierra la conexión
$conn->close();
?>