<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pruebar";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Verificar conexión
if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}

// Consulta para vaciar la tabla 'ordenMesa6'
$sql_vaciar_tabla = "DELETE FROM `ordenMesa6`";

// Consulta para restaurar el estado de 'Mesa 6' en la tabla 'mesas'
$sql_restaurar_mesa6 = "UPDATE `mesas` SET `capacidad` = 6, `estado` = 'Disponible', `tipo` = '', `habitacion` = '', `comensal` = '', `comentario` = '' WHERE `nombre` = 'Mesa 6'";

// Ejecutar consulta para vaciar la tabla 'ordenMesa6'
if (mysqli_query($conn, $sql_vaciar_tabla)) {
    echo "Tabla 'ordenMesa6' vaciada correctamente<br>";
} else {
    echo "Error al vaciar tabla 'ordenMesa6': " . mysqli_error($conn) . "<br>";
}

// Ejecutar consulta para restaurar el estado de 'Mesa 6'
if (mysqli_query($conn, $sql_restaurar_mesa6)) {
    echo "Estado de 'Mesa 6' restaurado correctamente<br>";
} else {
    echo "Error al restaurar estado de 'Mesa 6': " . mysqli_error($conn) . "<br>";
}

// Cerrar conexión
mysqli_close($conn);

// Redirigir a la página 'info_mesa6.php'
header("Location: panel.php");
exit; // Asegurarse de que el script se detenga aquí
?>
