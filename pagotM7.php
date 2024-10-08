<?php 
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}
    include("conexion.php");
    $con=conectar();

    $sql="SELECT *  FROM ordenMesa7";
    $query=mysqli_query($con,$sql);
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
        <link rel="stylesheet" href="css/design.css?v=2">
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
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="sweetalert2.all.min.js"></script>
        <!-- Add icon library -->
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script src="/js/main.js"></script>
        <!-- OTROS SCRIPTS DE FUNCIONAMIENTO -->
        <script src="/js/fecha.js"></script>
        <style>

            .h3{
                text-align: center;
            }
            .h2{
                text-align: center;
            }

            .h1{
                text-align: center;
                color: green;
            }

            table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
            table-layout:fixed;
            }

            td, th {
            border: 1px solid black;
            text-align: center;
            padding: 0.5% 0;
            overflow:hidden;
            width: 50;
            white-space:nowrap;
            }

            .thd{
                text-align: center;
            }

            .thx{
                text-align: left;
            }

            tr:nth-child(even) {
            background-color: #dddddd;
            }
            .thc{
                font-size: 50px;
            }

            .ml-auto{
                    font-size: 1.5em;
            }

            .grid-container {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            grid-gap: 20px;
            }

            .grid-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            }

            .grid-item img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            }

            .grid-item p {
            font-size: 16px;
            font-weight: bold;
            margin: 0;
            }

            .modal-body img {
            max-width: 100%;
            max-height: 100%;
            }

            .title{
                text-align: center;
            }
            
            #mesa {
                margin: 0 auto;
                display: block;
            }

            #modal-formulario .modal-dialog {
            max-width: 800px; /* ancho máximo deseado */
            max-height: 500px; /* altura máxima deseada */
            }

            .fa1 {
                font-size: 2em;
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

            table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
            table-layout:fixed;
            }

            td, th {
            border: 1px solid #dddddd;
            text-align: center;
            padding: 0.5% 0;
            overflow:hidden;
            width: 50;
            white-space:nowrap;
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

            #boton-imagen {

            width: 100%;

            height: auto;

            }

            .custom-container {
                max-width: 1600px; /* Ajusta el valor según tus necesidades */
                margin: 0 auto; /* Centra el contenido horizontalmente */
            }

            #restante {
                margin-top: 20px;
                font-weight: bold;
                font-size: 24px; /* Tamaño de fuente más grande */
                color: green; /* Color verde */
            }
           
        </style>   
    </head>
    <body>
            <div class="header">
                <a href="panel.php" class="logo"><?php echo htmlspecialchars($_SESSION["username"]); ?> - Demo</a>
                    <div class="header-right">
                    <span id="fecha" class="ml-auto"></span>
                    <script>
                        function actualizarFechaYHora() {
                        var fecha = new Date(); // Obtiene la fecha y hora actual
                        var hora = fecha.getHours(); // Obtiene la hora actual
                        var minuto = fecha.getMinutes(); // Obtiene el minuto actual

                        // Obtener las opciones de formato para mostrar la fecha en el idioma español y en el formato deseado
                        const opcionesFecha = {
                            weekday: 'long',
                            day: 'numeric',
                            month: 'long',
                            year: 'numeric'
                        };

                        // Dar formato a la fecha y guardarla en una variable
                        const fechaFormateada = fecha.toLocaleDateString('es-ES', opcionesFecha);

                        // Obtener las opciones de formato para mostrar la hora en formato 12 horas sin segundos
                        const opcionesHora = {
                            hour: 'numeric',
                            minute: '2-digit',
                            hour12: true
                        };

                        // Dar formato a la hora y guardarla en una variable
                        const horaFormateada = fecha.toLocaleTimeString('es-ES', opcionesHora);

                        // Actualizar el contenido del elemento span con la fecha y hora actual
                        document.getElementById("fecha").innerHTML = fechaFormateada + " - " + horaFormateada;

                        }

                        // Llama a la función actualizarFechaYHora cada segundo
                        setInterval(actualizarFechaYHora, 1000);

                    </script>
                    </div>
                    <span style="font-size: 3vw; font-weight: bold; color: red; display: block; text-align: center; margin-top: 10px;">
            CAPACITACIÓN
        </span>
            </div>
            
            <div class="container mt-5 custom-container">
                
                <div class="row">

                    <div style="text-align: left;">
                                    <a href="pagarventam7.php">
                                        <button class="btn btn-primary"><i class="fa1 fa fa-arrow-left"></i></button>
                                    </a>
                                    <h1 style="text-align: center;"><b>PAGO CON TARJETA - Mesa 7</b></h1>
                    </div>

                <!-- Mostrar los detalles de la mesa en la página -->
                                <div class="container mt-5 custom-container">

                                <fieldset> 
                                    <div class="card">

                                    <br>
                                    <div class="container">
                                        
                                        <div style="display: flex; flex-direction: column; align-items: center; text-align: center;">
                                            <?php
                                            $total = 0; // Inicializar el total en 0
                                            
                                            while ($row = mysqli_fetch_array($query)) {
                                                // Obtener el precio y convertirlo a número
                                                $precio = floatval($row['preciou']);
                                                
                                                // Sumar el precio al total
                                                $total += $precio;
                                            }
                                            ?>
                                            <h1 class="h1">
                                                <b>Total a pagar: $<?php echo $total ?></b>
                                            </h1>
                                            <br>
                                            <h3 class="h3">Muestre la terminal al cliente y pida validar la operación con su NIP</h3>
                                            <br><br>
                                            <img src="https://us.123rf.com/450wm/juliarstudio/juliarstudio1603/juliarstudio160301713/53798327-terminal-punto-de-venta-con-el-icono-de-la-tarjeta-de-cr%C3%A9dito-en-estilo-isom%C3%A9trica-3d-sobre-un-fondo.jpg?ver=6"
                                                alt="terminal"
                                                width="450"
                                                height="350"
                                                style="text-align: center;">
                                        </div>

                                        

                                        <hr>

                                        <div style="text-align: center;">

                                            <a href="ticketguarda7v2.php">
                                                <button class="btn btn-sm btn-success" style="font-family: 'Nombre de tu tipografía', sans-serif;">Finalizar operación</button>
                                            </a>

                                            <a href="generar_pdf7.php" target="_blank">
                                                <button class="btn btn-sm btn-primary" style="font-family: 'Nombre de tu tipografía', sans-serif;">Imprimir Ticket</button>
                                            </a>

                                            <br>

                                            <h3 class="h3">Al concluir la operación haga click en "Continuar"</h3>

                                        </div>

                                        <br><br>  

                                        <script>
                                        function restar() {
                                            var total = <?php echo $total?>; // Valor inicial de 'total'
                                            var monto = document.getElementById("monto").value; // Obtener el monto introducido

                                            // Validar que se haya ingresado un monto válido
                                            if (monto !== '') {
                                                total = parseInt(monto) + total; // Restar el monto al valor inicial de 'total'
                                            }

                                            // Mostrar el monto restante en el elemento con el id 'restante'
                                            document.getElementById("restante").textContent = "Cambio: " + total;
                                        }
                                        </script>
                                        

                                    </div>
                                </fieldset>
                        </div>
                    </div>
                    </div>  
            </div>
                        </div>
                  
                            
                </div>
            
            </div>
                                    

    </body>
    <!--Fin de la página-->
    <br><br>
    <footer class="footer">
            <p>Ocaso Terraza Atlixco, Todos los derechos reservados &copy; 2023</p>
    </footer>
</html>