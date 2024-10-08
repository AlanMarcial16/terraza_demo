<?php
include("conexion.php");
$con = conectar();

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $cantidad = $_POST['cantidad'];
    $preciou = $_POST['preciou'];

    // Verificar si el ID existe en la base de datos antes de actualizar en ordenMesa1
    $sql_check = "SELECT fyh FROM ordenMesa1 WHERE id = $id";
    $result_check = mysqli_query($con, $sql_check);

    if (mysqli_num_rows($result_check) > 0) {
        $row = mysqli_fetch_assoc($result_check);
        $fyh = $row['fyh'];

        // El ID existe en la base de datos ordenMesa1, realizar la actualización en ambas tablas
        $sql_update_ordenMesa1 = "UPDATE ordenMesa1 SET nombre='$nombre', cantidad='$cantidad', preciou='$preciou' WHERE fyh='$fyh'";
        $query_update_ordenMesa1 = mysqli_query($con, $sql_update_ordenMesa1);

        if ($query_update_ordenMesa1) {
            // Ahora actualizar también en ordenes_currentes solo el campo nombre
            $sql_update_ordenes_currentes = "UPDATE ordenes_currentes SET nombre='$nombre' WHERE fyh='$fyh'";
            $query_update_ordenes_currentes = mysqli_query($con, $sql_update_ordenes_currentes);

            if (!$query_update_ordenes_currentes) {
                echo "Error al actualizar en ordenes_currentes: " . mysqli_error($con);
            }

            // Actualizar el valor total
            $total_query = mysqli_query($con, "SELECT SUM(preciou) AS total FROM ordenMesa1");
            $total_row = mysqli_fetch_assoc($total_query);
            $total = $total_row['total'];

            setcookie("total", $total, time() + (86400 * 30), "/"); // 30 days

            session_start();
            $_SESSION['total'] = $total;

            header("Location: info_mesa1.php");
            exit();
        } else {
            echo "Error al actualizar los datos en ordenMesa1: " . mysqli_error($con);
        }
    } else {
        echo "ID no válido o no existe en la base de datos.";
    }
}

mysqli_close($con);
?>
