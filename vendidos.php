<?php 
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Inicio - Ocaso Terraza</title>
        <link rel="shortcut icon" href="https://static.wixstatic.com/media/9ed84f_b72e16d4242e4e97a54c4945ac674912~mv2.png/v1/fill/w_50,h_50,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/9ed84f_b72e16d4242e4e97a54c4945ac674912~mv2.png">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/style.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	    <!-- Font Awesome Stylesheets -->
	    <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/responsive.css">
        <link rel="stylesheet" href="css/design.css">
        <link rel="stylesheet" href="css/estilo5.css">
        <link rel="stylesheet" href="css/estilo8.css">
        <link rel="stylesheet" href="css/estilotabla.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script src="js/jquery.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
	    <!-- Template Main Stylesheets -->
	    <link rel="stylesheet" href="css/contact-form.css" type="text/css">	
        <!--SWEET ALERT-->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="sweetalert2.all.min.js"></script>
        <!-- Add icon library -->
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script src="/js/main.js"></script>
        <!-- OTROS SCRIPTS DE FUNCIONAMIENTO -->
        <script src="/js/fecha.js"></script>
        <style>

            @import url(https://fonts.googleapis.com/css?family=Open+Sans:400,700);

            body {
            font-family: 'Open Sans', sans-serif;
            }

            h1,h2,h3,label,input,th{
                font-family: 'Open Sans', sans-serif;
            }
            .sidebar {
                width: 200px;
                height: 100%;
                background-color: #f1f1f1;
                position: absolute;
                top: 80px;
                right: 0;
            }

            ul {
                list-style-type: none;
                margin: 0;
                padding: 0;
                text-align: right;
            }

            li {
                margin: 10px 0;
            }

            a {
                display: block;
                color: #000;
                padding: 8px 16px;
                text-decoration: none;
            }

            a:hover {
                background-color: #ddd;
            }

            main {
                margin-top: 160px; /* 80px para el encabezado + 80px para el margen superior del contenido */
                margin-bottom: 80px;
            }

            .cambia-color {
                width: 100px;
                height: 100px;
                object-fit: cover;
            }

            .cambia-color.clicked {
            background-color: red;
            }

            table {
            width: 800px; /* establece un ancho fijo de 600 píxeles */
            height: 300px; /* establece un alto fijo de 400 píxeles */
            }

            .card-img {
            width: 50px; /* tamaño deseado de la imagen */
            }

            .form1 {
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
            }

            .modal-dialog {
            max-width: 500px;
            display: flex;
            justify-content: center;
            align-items: center;
            }

            .header {
            font-size: 14px; /* cambia el tamaño de la fuente */
            padding: 10px; /* reduce el espacio de relleno */
            height: 80px; /* reduce la altura del footer */
            }

            .footer {
            font-size: 14px; /* cambia el tamaño de la fuente */
            padding: 10px; /* reduce el espacio de relleno */
            height: 50px; /* reduce la altura del footer */
            }

            /* Estilo para el formulario */

            .flat-form {
              background: #fff;
              padding: 30px;
              max-width: 500px;
              margin: 0 auto;
              box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.075);
              border-radius: 5px;
            }

            .flat-form h2 {
              margin-top: 0;
              margin-bottom: 30px;
              font-weight: 700;
              font-size: 36px;
              color: #333;
              text-align: center;
            }

            .flat-form .form-group {
              margin-bottom: 20px;
            }

            .flat-form label {
              display: block;
              margin-bottom: 8px;
              font-weight: 700;
              font-size: 16px;
              color: #333;
            }

            .flat-form input[type=text],
            .flat-form input[type=number],
            .flat-form select {
              width: 100%;
              padding: 12px;
              border: 1px solid #ddd;
              border-radius: 3px;
              font-size: 16px;
              color: #666;
            }

            .flat-form input[type=text]:focus,
            .flat-form input[type=number]:focus,
            .flat-form select:focus {
              outline: none;
              border-color: #52caff;
            }

            .flat-form button[type=submit] {
              background: #52caff;
              border: none;
              color: #fff;
              font-size: 18px;
              font-weight: 700;
              padding: 12px 20px;
              border-radius: 3px;
              cursor: pointer;
            }

            .flat-form button[type=submit]:hover {
              background: #2d98da;
            }
           
        </style>   
    </head>
    <body>
            <div class="header">
                <a href="panel.php" class="logo">Bienvenido, <?php echo htmlspecialchars($_SESSION["username"]); ?>!</a>
                    <div class="header-right">
                    <span id="fecha" class="ml-auto"></span>
                    </div>
            </div>

            <br><br>
            
            <div class="container">
                

                <!-- CONTENIDO PRINCIPAL DE LA PÁGINA -->
                <div class="max-w-75">
                    <a href="panel.php">
                                    <button class="btn info"><i class="fa1 fa fa-arrow-left"></i></button>
                                </a>
                      <h1 style="text-align: center"><b>Resumen de artículos vendidos</b></h1>
                      <br>
                      <?php
// Conexión a la base de datos
$conexion = new mysqli('localhost', 'root', '', 'pruebar');

// Verificar conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Consulta para obtener el resumen de artículos vendidos
$sql = "
SELECT 
    DATE(fyh) AS fecha, 
    nombre, 
    SUM(CAST(cantidad AS DECIMAL)) AS total_cantidad, 
    CAST(preciou AS DECIMAL) AS precio_unitario, 
    SUM(CAST(cantidad AS DECIMAL) * CAST(preciou AS DECIMAL)) AS total_precio
FROM 
    ordenes_listas
GROUP BY 
    DATE(fyh), nombre, precio_unitario
ORDER BY 
    fecha DESC;
";

$resultado = $conexion->query($sql);
?>

<div class="container">
    <table border="1" class="table">
        <thead>
            <tr>
                <th>Fecha</th>
                <th>Artículo</th>
                <th>Cantidad Vendida</th>
                <th>Precio Unitario</th>
                <th>Total Vendido</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($fila = $resultado->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $fila['fecha']; ?></td>
                    <td><?php echo $fila['nombre']; ?></td>
                    <td><?php echo $fila['total_cantidad']; ?></td>
                    <td><?php echo number_format($fila['precio_unitario'], 2); ?> MXN</td>
                    <td><?php echo number_format($fila['total_precio'], 2); ?> MXN</td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    

    <?php

// Conexión a la base de datos
$conexion = new mysqli('localhost', 'root', '', 'pruebar');

// Verificar conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Consulta para obtener la fecha más antigua y la más reciente de la columna 'fyh'
$sql_fechas = "
SELECT 
    MIN(fyh) AS fecha_mas_antigua, 
    MAX(fyh) AS fecha_mas_reciente
FROM 
    ordenes_listas;
";

$resultado_fechas = $conexion->query($sql_fechas);
$fila_fechas = $resultado_fechas->fetch_assoc();

// Asignar fechas
$fecha_mas_antigua = $fila_fechas['fecha_mas_antigua'];
$fecha_mas_reciente = $fila_fechas['fecha_mas_reciente'];

// Consulta para contar cuántas veces se repiten los artículos vendidos en el rango de fechas obtenido
$sql_pastel_rango = "
SELECT 
    nombre, 
    COUNT(nombre) AS total_cantidad
FROM 
    ordenes_listas
WHERE 
    fyh BETWEEN '$fecha_mas_antigua' AND '$fecha_mas_reciente'
GROUP BY 
    nombre
ORDER BY 
    total_cantidad DESC;
";

$resultado_pastel_rango = $conexion->query($sql_pastel_rango);

// Arrays para los datos del gráfico
$articulos_rango = [];
$cantidades_rango = [];

// Verificación de datos
while ($fila_pastel_rango = $resultado_pastel_rango->fetch_assoc()) {
    $articulos_rango[] = $fila_pastel_rango['nombre'];
    $cantidades_rango[] = $fila_pastel_rango['total_cantidad'];
}

?>

<br><br>

<!-- Gráfico de pastel basado en el rango de fechas -->
<h2>Artículos vendidos entre <?php echo $fecha_mas_antigua; ?> y <?php echo $fecha_mas_reciente; ?></h2>
<br><br>
<!-- Contenedor con un tamaño fijo que controlará el tamaño del gráfico -->
<div style="width: 500px; height: 500px; margin: auto;">
    <canvas id="graficaArticulosVendidosRango"></canvas>
</div>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var ctxRango = document.getElementById('graficaArticulosVendidosRango').getContext('2d');
    var graficaArticulosVendidosRango = new Chart(ctxRango, {
        type: 'pie',
        data: {
            labels: <?php echo json_encode($articulos_rango); ?>,
            datasets: [{
                label: 'Artículos Vendidos',
                data: <?php echo json_encode($cantidades_rango); ?>,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.7)',
                    'rgba(54, 162, 235, 0.7)',
                    'rgba(255, 206, 86, 0.7)',
                    'rgba(75, 192, 192, 0.7)',
                    'rgba(153, 102, 255, 0.7)',
                    'rgba(255, 159, 64, 0.7)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,  // Asegura que el gráfico se ajuste al contenedor
            plugins: {
                legend: {
                    position: 'top',
                }
            }
        }
    });
</script>


</div>

<?php
$conexion->close();
?>

                    

            </div>

            
    </body>
    <!--Fin de la página-->
    <br><br>
    <footer class="footer">
            <p>Ocaso Terraza Atlixco, Todos los derechos reservados &copy; 2023</p>
    </footer>
</html>