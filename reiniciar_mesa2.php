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

// Consulta para vaciar la tabla 'ordenMesa2'
$sql_vaciar_tabla = "DELETE FROM `ordenMesa2`";

// Consulta para restaurar el estado de 'Mesa 2' en la tabla 'mesas'
$sql_restaurar_mesa2 = "UPDATE `mesas` SET `capacidad` = 4, `estado` = 'Disponible', `tipo` = '', `habitacion` = '', `comensal` = '', `comentario` = '' WHERE `nombre` = 'Mesa 2'";

// Ejecutar consulta para vaciar la tabla 'ordenMesa2'
if (mysqli_query($conn, $sql_vaciar_tabla)) {
    echo "Tabla 'ordenMesa2' vaciada correctamente<br>";
} else {
    echo "Error al vaciar tabla 'ordenMesa2': " . mysqli_error($conn) . "<br>";
}

// Ejecutar consulta para restaurar el estado de 'Mesa 2'
if (mysqli_query($conn, $sql_restaurar_mesa2)) {
    echo "Estado de 'Mesa 2' restaurado correctamente<br>";
} else {
    echo "Error al restaurar estado de 'Mesa 2': " . mysqli_error($conn) . "<br>";
}

// Cerrar conexión
mysqli_close($conn);

// Redirigir a la página 'info_mesa2.php'
header("Location: panel.php");
exit; // Asegurarse de que el script se detenga aquí
?>
