<?php
// Conexión a la base de datos
$host = "localhost";
$user = "root";
$password = "";
$dbname = "pruebar";

$conn = mysqli_connect($host, $user, $password, $dbname);

if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}

// Verificar si se envió la solicitud de eliminación
if (isset($_POST['id'])) {
    // Obtener el ID de la entrada a eliminar
    $id = $_POST['id'];
    
    // Verificar si el ID es válido
    if (is_numeric($id)) {
        // Ejecutar la consulta SQL DELETE
        $sql = "DELETE FROM ventadirecta WHERE id = $id";
        if (mysqli_query($conn, $sql)) {
            header("Location: {$_SERVER['HTTP_REFERER']}");
        } else {
            echo "Error al eliminar la opción: " . mysqli_error($conn);
        }
    } else {
        echo "ID de opción inválido.";
    }
}

mysqli_close($conn);
?>
