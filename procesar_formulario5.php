<?php
include("conexion.php");
$con = conectar();

date_default_timezone_set('America/Mexico_City');
$fyh_actual = date('Y-m-d H:i:s');

// Función para actualizar el inventario según una receta
function actualizarInventario($opcion, $cantidad, $precio) {
    global $con;

    // Obtener la receta seleccionada
    $receta_query = "SELECT * FROM recetas WHERE Nombre = '$opcion'";
    $receta_result = mysqli_query($con, $receta_query);

    if ($receta_result && mysqli_num_rows($receta_result) > 0) {
        $receta = mysqli_fetch_assoc($receta_result);
        $ingredientes = json_decode($receta['Cantidades'], true);

        // Actualizar el inventario para cada ingrediente
        foreach ($ingredientes as $ingrediente => $cant) {
            $update_query = "UPDATE inventario_alimentos SET Cantidad = Cantidad - ($cant * $cantidad) WHERE Nombre = '$ingrediente'";
            mysqli_query($con, $update_query);
        }

        echo "Inventario actualizado exitosamente.";
    } else {
        echo "Receta no encontrada.";
    }
}

if (isset($_POST['opcion'])) {
    $opcion = $_POST['opcion'];
    $cantidad = $_POST['cantidad'];
    $precio = $_POST['precio'];

    // Llamar a la función para actualizar el inventario
    actualizarInventario($opcion, $cantidad, $precio);

    // Inserción en ordenMesa5
    $sql = "INSERT INTO ordenMesa5 (nombre, cantidad, preciou, fyh) VALUES ('$opcion', '$cantidad', '$precio', '$fyh_actual')";
    $query = mysqli_query($con, $sql);

    // Inserción en ordenes_currentes
    $sql = "INSERT INTO ordenes_currentes (nombre, mesa, fyh) VALUES ('$opcion', 'Mesa 5', '$fyh_actual')";
    $query = mysqli_query($con, $sql);

    if ($query) {
        $total_query = mysqli_query($con, "SELECT SUM(preciou) AS total FROM ordenMesa5");
        $total_row = mysqli_fetch_assoc($total_query);
        $total = $total_row['total'];

        setcookie("total", $total, time() + (86400 * 30), "/"); // 30 days

        session_start();
        $_SESSION['total'] = $total;

        // Código JavaScript para reproducir el sonido
        echo '<script>var audio = new Audio("sounds/xdxd.mp3"); audio.play();</script>';

        header("Location: {$_SERVER['HTTP_REFERER']}");
        exit();
    }
}

// Resto de tu formulario y script JavaScript...
?>

