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

    $sql="SELECT *  FROM tickets";
    $query=mysqli_query($con,$sql);

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Caja Chica - Ocaso Terraza</title>
        <link rel="shortcut icon" href="https://static.wixstatic.com/media/9ed84f_b72e16d4242e4e97a54c4945ac674912~mv2.png/v1/fill/w_50,h_50,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/9ed84f_b72e16d4242e4e97a54c4945ac674912~mv2.png">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/style.css" rel="stylesheet">
        <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8sh+Wy9Ic6Y/iRS5X9p9atU3xHj13BweDgm9Nr' crossorigin='anonymous'>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <!-- Bootstrap Stylesheets -->
	    <link rel="stylesheet" href="css/bootstrap.min.css">
	    <!-- Font Awesome Stylesheets -->
	    <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/responsive.css">
        <link rel="stylesheet" href="css/design.css">
        <link rel="stylesheet" href="css/estilo5.css">
        <link rel="stylesheet" href="css/estilo8.css">
        <link rel="stylesheet" href="css/estiloc.css">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
        <script src="js/jquery.min.js"></script>
        <script src="js/popper.min.js"></script>
        
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
            .fa1 {
                font-size: 2em;
            }

            .custom-container {
                max-width: 1600px; /* Ajusta el valor según tus necesidades */
                margin: 0 auto; /* Centra el contenido horizontalmente */
            }

            @import url(https://fonts.googleapis.com/css?family=Open+Sans:400,700);

            body {
            font-family: 'Open Sans', sans-serif;
            }

            h1,h2,h3,label,input,th{
                font-family: 'Open Sans', sans-serif;
            }

            .button1 {
                background-color: #4CAF50; 
                border: none;
                color: white;
                padding: 10px 30px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 18px;
                margin: 4px 2px;
                cursor: pointer;
            }
            
            .button2 {
                background-color: #f44336; 
                border: none;
                color: white;
                padding: 10px 30px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 18px;
                margin: 4px 2px;
                cursor: pointer;
            } 

            .button3 {
                background-color: #1e90ff; 
                border: none;
                color: white;
                padding: 10px 30px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 18px;
                margin: 4px 2px;
                cursor: pointer;
            }    

            .h1{
                text-align: center;
            }
            .h2{
                text-align: center;
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
                text-align: justify;
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

            .btn {
            background-color: DodgerBlue;
            border: none;
            color: white;
            padding: 12px 16px;
            font-size: 16px;
            cursor: pointer;
            }
            .btnp {
            background-color: Green;
            border: none;
            color: white;
            padding: 12px 16px;
            font-size: 16px;
            cursor: pointer;
            }

            .btnc {
            background-color: Red;
            border: none;
            color: white;
            padding: 12px 16px;
            font-size: 16px;
            cursor: pointer;
            }

            .btni {
            background-color: #669999;
            border: none;
            color: white;
            padding: 12px 16px;
            font-size: 16px;
            cursor: pointer;
            }
            /* Darker background on mouse-over */
            .btn:hover {
            background-color: Black;
            }
            /* Darker background on mouse-over */
            .btnp:hover {
            background-color: Black;
            }
            /* Darker background on mouse-over */
            .btnc:hover {
            background-color: Black;
            }
           
        </style>   
    </head>
    <body onload="test()">
            <div class="header">
                <a href="panel.php" class="logo">Bienvenido, <?php echo htmlspecialchars($_SESSION["username"]); ?>!</a>
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
            </div>
            
            <div class="container mt-5 custom-container">
                <div class="row"> 
                            <div>
                            <div style="text-align: left;">
                                <a href="panel.php">
                                    <button class="btn btn-primary"><i class="fa1 fa fa-arrow-left"></i></button>
                                </a>
                            </div>
                            
                            <h1 style="text-align: center;"><b>Tickets</b></h1>

                            <br><br>

                            <div style="text-align: right;">
                                <a href="pbuscar.php">
                                    <button class="btn btn-success">Buscar por nombre</button>
                                </a>
                                <a href="fbuscar.php">
                                    <button class="btn btn-dark">Buscar por fechas</button>
                                </a>
                            </div>



                            <br>
                            <table>
                            <!-- Encabezado de la tabla -->
                            <thead class="table-success table-striped">
                                <tr>
                                    <th>ID</th>
                                    <th colspan="3">Consumos</th>
                                    <th>Habitación</th>
                                    <th>Comensal</th>
                                    <th>Fecha y Hora</th>
                                    <th>Acciones</th> <!-- Nueva columna para acciones -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // Comprobar si hay resultados antes de intentar iterar sobre ellos
                                if ($query && mysqli_num_rows($query) > 0) {
                                    while ($row = mysqli_fetch_array($query)) {
                                        ?>
                                        <tr>
                                            <td><?php echo $row['id']; ?></td>
                                            <td colspan="3">
                                                <?php
                                                // Decodificar el JSON y formatearlo como lista
                                                $consumos = json_decode($row['datos_json'], true);

                                                // Verificar si la decodificación fue exitosa
                                                if ($consumos !== null) {
                                                    echo '<ul>';
                                                    foreach ($consumos as $consumo) {
                                                        echo '<li>';
                                                        echo 'ID: ' . $consumo['id'] . ', Nombre: ' . $consumo['nombre'] . ', Cantidad: ' . $consumo['cantidad'] . ', Precio Unitario: ' . $consumo['preciou'];
                                                        echo '</li>';
                                                    }
                                                    echo '</ul>';
                                                } else {
                                                    echo 'Error al decodificar el JSON';
                                                }
                                                ?>
                                            </td>
                                            <td><?php echo $row['habitacion']; ?></td>
                                            <td><?php echo $row['comensal']; ?></td>
                                            <td><?php echo $row['fyh']; ?></td>
                                            <td>
                                                <button class="btn btn-primary imprimir-ticket" data-ticket-id="<?php echo $row['id']; ?>">Ver Ticket</button>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                } else {
                                    echo '<tr><td colspan="5">No hay datos disponibles</td></tr>';
                                }
                                ?>
                            </tbody>
                        </table>

                        <!-- Script JavaScript para manejar el clic en el botón "Imprimir ticket" -->
                        <script>
                            document.addEventListener('DOMContentLoaded', function () {
                                // Obtener todos los botones con la clase "imprimir-ticket"
                                var imprimirButtons = document.querySelectorAll('.imprimir-ticket');

                                // Adjuntar un controlador de eventos a cada botón
                                imprimirButtons.forEach(function (button) {
                                    button.addEventListener('click', function () {
                                        // Obtener el ID del ticket de los datos personalizados del botón
                                        var ticketId = button.getAttribute('data-ticket-id');

                                        // Redirigir a la página de generación de tickets con el ID del ticket
                                        window.open('generar_ticket.php?ticket_id=' + ticketId, '_blank');
                                    });
                                });
                            });
                        </script>




                            <br>

                            <div style="text-align: right;">
                               

                            </div>
                            <br>
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