<?php
$servername = "localhost";
$username = "root";
$password = "";

// Crear la conexión a la base de datos "pruebar_demo"
$conn6 = mysqli_connect($servername, $username, $password, "pruebar_demo");

// Verificar la conexión
if (!$conn6) {
    die("La conexión a la base de datos 'pruebar_demo' ha fallado: " . mysqli_connect_error());
}

// Obtener la habitación de Mesa 6 de la base de datos "pruebar_demo"
$sql = "SELECT habitacion FROM mesas WHERE nombre = 'Mesa 6'";
$result = mysqli_query($conn6, $sql);

if (mysqli_num_rows($result) > 0) {
    // Obtener el valor de "habitación" de Mesa 6
    $row = mysqli_fetch_assoc($result);
    $habitacionMesa = $row["habitacion"];

    // Cerrar la conexión a la base de datos "pruebar_demo"
    mysqli_close($conn6);

    // Crear una nueva conexión a la base de datos "prueba"
    $conn2 = mysqli_connect($servername, $username, $password, "prueba");

    // Verificar la conexión
    if (!$conn2) {
        die("La conexión a la base de datos 'prueba' ha fallado: " . mysqli_connect_error());
    }

    // Consultar si la habitación existe en la tabla de reservaciones de la base de datos "prueba"
    $sqlReservaciones = "SELECT * FROM reservaciones WHERE habitacion = '$habitacionMesa'";
    $resultReservaciones = mysqli_query($conn2, $sqlReservaciones);

    if (mysqli_num_rows($resultReservaciones) > 0) {
        // Crear una nueva conexión a la base de datos "pruebar_demo"
        $conn3 = mysqli_connect($servername, $username, $password, "pruebar_demo");

        // Verificar la conexión
        if (!$conn3) {
            die("La conexión a la base de datos 'pruebar_demo' ha fallado: " . mysqli_connect_error());
        }

        // Consulta SQL para obtener la suma de 'preciou' de la tabla 'ordenmesa6' en la base de datos "pruebar_demo"
        $sqlTotal = "SELECT SUM(preciou) AS total FROM ordenmesa6";

        $resultTotal = mysqli_query($conn3, $sqlTotal);

        if (mysqli_num_rows($resultTotal) > 0) {
            // Obtener el valor de "total" desde la consulta
            $rowTotal = mysqli_fetch_assoc($resultTotal);
            $total = $rowTotal["total"];

            // Obtener valores de "cextras" de la base de datos "prueba"
            $sql_select = "SELECT cextras, textras, gtotal FROM reservaciones WHERE habitacion = '$habitacionMesa'";
            $query_select = mysqli_query($conn2, $sql_select);
            $row_select = mysqli_fetch_assoc($query_select);
            $cextras_actual = $row_select['cextras'];
            $textras = $row_select['textras'];
            $gtotal = $row_select['gtotal'];

            // Realizar la suma acumulativa
            $cextras_nuevo = $cextras_actual + $total;

            $textras = (-$cextras_nuevo - $sextras);

            $gtotal = ($total2 + $textras);

            // Actualizar el valor de "cextras" en la tabla "reservaciones" de la base de datos "prueba"
            $updateSql = "UPDATE reservaciones SET cextras='$cextras_nuevo', textras='$textras', gtotal='$gtotal' WHERE habitacion = '$habitacionMesa'";
            if (mysqli_query($conn2, $updateSql)) {
                // Redirigir a la página "info_mesa6.php"
                header("Location: guardaticket6.php");
                exit; // Asegurarse de que el script se detenga aquí
            } else {
                echo "Error al actualizar 'cextras': " . mysqli_error($conn2);
            }
        } else {
            echo "No se pudo obtener el valor de 'total' desde la tabla 'ordenmesa6' en la base de datos 'pruebar_demo'.";
        }

        // Cerrar la conexión a la base de datos "pruebar_demo"
        mysqli_close($conn3);
    } else {
        echo "No se encontraron reservaciones para la habitación '$habitacionMesa' en la base de datos 'prueba'.";
    }

    // Cerrar la conexión a la base de datos "prueba"
    mysqli_close($conn2);
} else {
    echo "No se encontró la habitación 'Mesa 6' en la tabla 'mesas' de la base de datos 'pruebar_demo'.";
}
?>
