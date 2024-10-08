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

// Consulta para vaciar la tabla 'ordenMesa5'
$sql_vaciar_tabla = "DELETE FROM `ordenMesa5`";

// Consulta para restaurar el estado de 'Mesa 5' en la tabla 'mesas'
$sql_restaurar_mesa5 = "UPDATE `mesas` SET `capacidad` = 5, `estado` = 'Disponible', `tipo` = '', `habitacion` = '', `comensal` = '', `comentario` = '' WHERE `nombre` = 'Mesa 5'";

// Ejecutar consulta para vaciar la tabla 'ordenMesa5'
if (mysqli_query($conn, $sql_vaciar_tabla)) {
    echo "Tabla 'ordenMesa5' vaciada correctamente<br>";
} else {
    echo "Error al vaciar tabla 'ordenMesa5': " . mysqli_error($conn) . "<br>";
}

// Ejecutar consulta para restaurar el estado de 'Mesa 5'
if (mysqli_query($conn, $sql_restaurar_mesa5)) {
    echo "Estado de 'Mesa 5' restaurado correctamente<br>";
} else {
    echo "Error al restaurar estado de 'Mesa 5': " . mysqli_error($conn) . "<br>";
}

// Cerrar conexión
mysqli_close($conn);

// Redirigir a la página 'info_mesa5.php'
header("Location: panel.php");
exit; // Asegurarse de que el script se detenga aquí
?>
