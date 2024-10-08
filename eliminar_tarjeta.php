<?php
// Establecer conexión a la base de datos
$conn = mysqli_connect("localhost", "root", "", "pruebar");

// Verificar si se recibió el ID de la tarjeta
if (isset($_GET['id'])) {
    $id_tarjeta = $_GET['id'];

    // Realizar la consulta DELETE
    $sql = "DELETE FROM mesas WHERE id = $id_tarjeta";
    $resultado = mysqli_query($conn, $sql);

    // Verificar si se eliminó correctamente
    if($resultado){
        Header("Location: panel.php");
    } else {
        echo "Hubo un error al eliminar la tarjeta.";
    }
} else {
    echo "No se recibió el ID de la tarjeta a eliminar.";
}

// Cerrar la conexión a la base de datos
mysqli_close($conn);
?>