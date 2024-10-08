<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "pruebar";

// Crear la conexión a la base de datos
$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}

// Consulta para obtener los datos de la tabla ordenMesa3
$sql = "SELECT * FROM ordenmesa3";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $data = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }

    // Convierte los datos a JSON
    $json_data = json_encode($data, JSON_UNESCAPED_UNICODE);

    // Añade el mensaje al JSON
    $json_data_with_message = json_decode($json_data, true);
    foreach ($json_data_with_message as &$item) {
        $item["mensaje"] = "PAGADO AL MOMENTO";
    }
    $json_data_with_message = json_encode($json_data_with_message, JSON_UNESCAPED_UNICODE);

    // Obtiene la habitación
    $conn3 = mysqli_connect($servername, $username, $password, "pruebar");
    $sql_habitacion = "SELECT habitacion, comensal FROM mesas WHERE nombre = 'Mesa 3'";
    $result_habitacion = mysqli_query($conn3, $sql_habitacion);

    if (mysqli_num_rows($result_habitacion) > 0) {
        $row_habitacion = mysqli_fetch_assoc($result_habitacion);
        $habitacion = $row_habitacion["habitacion"];
        $comensal = $row_habitacion["comensal"];

        // Inserta los datos en la tabla "tickets" junto con la habitación, comensal y la fecha/hora actual
        $insert_query = "INSERT INTO tickets (datos_json, habitacion, comensal, fyh) VALUES ('$json_data_with_message', '$habitacion', '$comensal', NOW())";

        if (mysqli_query($conn, $insert_query)) {
            echo "Datos insertados en la tabla 'tickets'.";
            // Redirige a la página "mandarhabm3.php"
            header("Location: endpdM3.php");
            exit; // Asegura que el script se detenga aquí
        } else {
            echo "Error al insertar datos en la tabla 'tickets': " . mysqli_error($conn);
        }

        // Cierra la conexión a la base de datos "pruebar"
        mysqli_close($conn3);
    } else {
        echo "No se encontró la habitación 'Mesa 3' en la tabla 'mesas' de la base de datos 'pruebar'.";
    }
}
?>
