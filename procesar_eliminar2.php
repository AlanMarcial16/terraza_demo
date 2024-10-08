<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "pruebar_demo";

$conn = mysqli_connect($host, $user, $password, $dbname);

if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    if (is_numeric($id)) {
        // Consulta para obtener la información antes de eliminar
        $eliminar_info_query = mysqli_query($conn, "SELECT nombre FROM ordenMesa2 WHERE id = $id");
        $eliminar_info_row = mysqli_fetch_assoc($eliminar_info_query);
        $nombre_eliminar = $eliminar_info_row['nombre'];

        $sql_eliminar_ordenMesa2 = "DELETE FROM ordenMesa2 WHERE id = $id";
        if (mysqli_query($conn, $sql_eliminar_ordenMesa2)) {
            // Eliminar también en ordenes_currentes basado en el nombre
            $sql_eliminar_ordenes_currentes = "DELETE FROM ordenes_currentes WHERE nombre='$nombre_eliminar'";
            if (!mysqli_query($conn, $sql_eliminar_ordenes_currentes)) {
                echo "Error al eliminar en ordenes_currentes: " . mysqli_error($conn);
            }

            // Recalcula el nuevo total después de eliminar
            $total_query = mysqli_query($conn, "SELECT SUM(preciou) AS total FROM ordenMesa2");
            $total_row = mysqli_fetch_assoc($total_query);
            $total = $total_row['total'];

            setcookie("total", $total, time() + (86400 * 30), "/"); // 30 days

            session_start();
            $_SESSION['total'] = $total;

            header("Location: {$_SERVER['HTTP_REFERER']}");
            exit();
        } else {
            echo "Error al eliminar la opción: " . mysqli_error($conn);
        }
    } else {
        echo "ID de opción inválido.";
    }
}

mysqli_close($conn);
?>
