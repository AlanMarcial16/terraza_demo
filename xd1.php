<?php
$servername1 = "localhost";  // Datos de la base de datos "pruebar" (tabla "tickets")
$username1 = "root";
$password1 = "";
$database1 = "pruebar";

$servername2 = "localhost";  // Datos de la base de datos "prueba" (tabla "reservaciones")
$username2 = "root";
$password2 = "";
$database2 = "prueba";

// Crear la conexión a ambas bases de datos
$conn1 = mysqli_connect($servername1, $username1, $password1, $database1);
$conn2 = mysqli_connect($servername2, $username2, $password2, $database2);

if (!$conn1 || !$conn2) {
    die("Conexión fallida: " . mysqli_connect_error());
}

// Obtén el "id" de la reserva desde la URL
$id = $_GET['id'];

// Obtener los datos de la tabla "tickets"
$sql_tickets = "SELECT * FROM tickets";
$result_tickets = mysqli_query($conn1, $sql_tickets);

// Obtener los datos de la tabla "reservaciones" para una reserva específica
$sql_reservaciones = "SELECT * FROM reservaciones WHERE cod_reserva = '$id'";
$result_reservaciones = mysqli_query($conn2, $sql_reservaciones);

// Bandera para verificar si se cumple la validación
$coincidencia = false;

// Datos del ticket
$datos_ticket = null;

if (mysqli_num_rows($result_tickets) > 0 && mysqli_num_rows($result_reservaciones) > 0) {
    while ($row_ticket = mysqli_fetch_assoc($result_tickets)) {
        while ($row_reservacion = mysqli_fetch_assoc($result_reservaciones)) {
            if ($row_ticket['habitacion'] == $row_reservacion['habitacion'] &&
                $row_ticket['comensal'] == $row_reservacion['cliente']) {
                $coincidencia = true;
                $datos_ticket = json_decode($row_ticket['datos_json'], true);
                break 2; // Salir de ambos bucles
            }
        }
        // Reiniciar el puntero de la tabla "reservaciones" para volver a recorrerla
        mysqli_data_seek($result_reservaciones, 0);
    }
}

// Cierra las conexiones a las bases de datos
mysqli_close($conn1);
mysqli_close($conn2);

if ($coincidencia) {
    // Datos válidos, mostrar el ticket
    echo "<!DOCTYPE html>";
    echo "<html lang='es'>";
    echo "<head>";
    echo "<meta charset='UTF-8'>";
    echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
    echo "<title>Consulta de Datos de Tickets</title>";
    echo "</head>";
    echo "<body>";
    echo "<h1>Datos de Tickets</h1>";
    echo "<table border='1'>";
    echo "<tr>";
    echo "<th>ID</th>";
    echo "<th>Nombre</th>";
    echo "<th>Cantidad</th>";
    echo "<th>Precio Unitario</th>";
    echo "</tr>";

    foreach ($datos_ticket as $item) {
        echo "<tr>";
        echo "<td>" . $item['id'] . "</td>";
        echo "<td>" . $item['nombre'] . "</td>";
        echo "<td>" . $item['cantidad'] . "</td>";
        echo "<td>" . $item['preciou'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
    echo "</body>";
    echo "</html>";
} else {
    // No se cumple la validación, no se puede visualizar el ticket
    echo "No se cumple la validación. No se puede visualizar el ticket.";
}
?>
