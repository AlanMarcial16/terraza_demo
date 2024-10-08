<?php
include("conexion.php");
$con = conectar();

// Verificar si se recibió el ID de la tarjeta
if (isset($_GET['id'])) {
    $id_tarjeta = $_GET['id'];

    // Realizar la consulta DELETE y agregar los datos a la tabla "ordenes_listas"
    $sql = "INSERT INTO ordenes_finalizadas SELECT * FROM ordenes_listas WHERE id = $id_tarjeta;
            DELETE FROM ordenes_listas WHERE id = $id_tarjeta";
    $query = mysqli_multi_query($con, $sql);

    // Verificar si se eliminó correctamente
    if ($query) {
        Header("Location: pendientes.php");
    }
} else {
    echo "No se recibió el ID de la tarjeta a eliminar.";
}
?>