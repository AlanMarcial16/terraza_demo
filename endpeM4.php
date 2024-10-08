<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "prueba";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}

// Consulta para obtener la suma de 'preciou' en la tabla 'ordenmesa4' de la base de datos 'pruebar_demo'
$sqlSuma = "SELECT SUM(preciou) AS total FROM pruebar_demo.ordenmesa4";
$resultSuma = mysqli_query($conn, $sqlSuma);


if (!$resultSuma) {
    die("Error al obtener la suma: " . mysqli_error($conn));
}

// Obtener el valor de la suma
$rowSuma = mysqli_fetch_assoc($resultSuma);
$total = $rowSuma['total'];

// Insertar el valor en la tabla 'cajaop'
$sqlInsert = "INSERT INTO cajaop (cod_operacion, tipodeoperacion, descripcion, tipocomprobante, importeentrada, importesalida, fecha_hora_registro) 
              VALUES (NULL, 'Entrada', 'Consumos Mesa 1', 'Ticket', '$total', '', NOW())";

if (mysqli_query($conn, $sqlInsert)) {
    echo "Datos insertados correctamente en 'cajaop'.";
} else {
    echo "Error al insertar datos en 'cajaop': " . mysqli_error($conn);
}

mysqli_close($conn);

// Redirigir a la página 'info_mesa1.php'
header("Location: reiniciar_mesa4.php");
exit;
?>
