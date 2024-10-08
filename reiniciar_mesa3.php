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

// Consulta para vaciar la tabla 'ordenMesa3'
$sql_vaciar_tabla = "DELETE FROM `ordenMesa3`";

// Consulta para restaurar el estado de 'Mesa 3' en la tabla 'mesas'
$sql_restaurar_mesa3 = "UPDATE `mesas` SET `capacidad` = 4, `estado` = 'Disponible', `tipo` = '', `habitacion` = '', `comensal` = '', `comentario` = '' WHERE `nombre` = 'Mesa 3'";

// Ejecutar consulta para vaciar la tabla 'ordenMesa3'
if (mysqli_query($conn, $sql_vaciar_tabla)) {
    echo "Tabla 'ordenMesa3' vaciada correctamente<br>";
} else {
    echo "Error al vaciar tabla 'ordenMesa3': " . mysqli_error($conn) . "<br>";
}

// Ejecutar consulta para restaurar el estado de 'Mesa 3'
if (mysqli_query($conn, $sql_restaurar_mesa3)) {
    echo "Estado de 'Mesa 3' restaurado correctamente<br>";
} else {
    echo "Error al restaurar estado de 'Mesa 3': " . mysqli_error($conn) . "<br>";
}

// Cerrar conexión
mysqli_close($conn);

// Redirigir a la página 'info_mesa3.php'
header("Location: panel.php");
exit; // Asegurarse de que el script se detenga aquí
?>
