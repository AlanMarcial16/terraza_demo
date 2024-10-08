<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pruebar_demo";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Verificar conexión
if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}

// Consulta para vaciar la tabla 'mesas'
$sql_mesas = "DELETE FROM `mesas`";

// Ejecutar consulta para vaciar la tabla 'mesas'
if (mysqli_query($conn, $sql_mesas)) {
    echo "Tabla 'mesas' vaciada correctamente<br>";
} else {
    echo "Error al vaciar tabla 'mesas': " . mysqli_error($conn) . "<br>";
}

// Consultas para vaciar las tablas 'ordenMesa1' hasta 'ordenMesa8'
for ($i = 1; $i <= 8; $i++) {
    $sql_orden = "DELETE FROM `ordenMesa$i`";
    if (mysqli_query($conn, $sql_orden)) {
        echo "Tabla 'ordenMesa$i' vaciada correctamente<br>";
    } else {
        echo "Error al vaciar tabla 'ordenMesa$i': " . mysqli_error($conn) . "<br>";
    }
}

// Consulta para insertar los datos en la tabla 'mesas'
$sql_insert_mesas = "INSERT INTO `mesas` (`id`, `nombre`, `capacidad`, `estado`, `tipo`, `habitacion`, `comensal`, `comentario`) VALUES
(1, 'Mesa 1', 4, 'Disponible', '', '', '', ''),
(2, 'Mesa 2', 2, 'Disponible', '', '', '', ''),
(3, 'Mesa 3', 6, 'Disponible', '', '', '', ''),
(4, 'Mesa 4', 2, 'Disponible', '', '', '', ''),
(5, 'Mesa 5', 2, 'Disponible', '', '', '', ''),
(6, 'Mesa 6', 3, 'Disponible', '', '', '', ''),
(7, 'Mesa 7', 2, 'Disponible', '', '', '', ''),
(8, 'Mesa 8', 2, 'Disponible', '', '', '', '')";

// Ejecutar consulta para insertar datos en la tabla 'mesas'
if (mysqli_query($conn, $sql_insert_mesas)) {
    Header("Location: panel.php");
} else {
    echo "Error al insertar datos en 'mesas': " . mysqli_error($conn);
}

// Cerrar conexión
mysqli_close($conn);
?>
