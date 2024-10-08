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

    $sql="SELECT *  FROM ordenMesa6";
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
                                    <a href="info_mesa6.php">
                                        <button class="btn btn-primary"><i class="fa1 fa fa-arrow-left"></i></button>
                                    </a>
                                    <h1 style="text-align: center;"><b>Mandar consumo a la habitación - Mesa 6</b></h1>
                    </div>

                <!-- Mostrar los detalles de la mesa en la página -->
                                <div class="container mt-5 custom-container">

                                <fieldset> 
                                    <div class="card">
                                    <!--<a style="text-align: right;"  onclick="al()" >
                                        <button class="btn info">Agregar descuento</button>
                                    </a>-->
                                    <script type="text/javascript">
                                        function al() {
                                                
                                            Swal.fire({
                                            
                                            icon: 'error',
                                            title: 'Advertencia',
                                            text: 'Solo el administrador puede realizar esta acción',
                                            showDenyButton: true,
                                            showCancelButton: true,
                                            confirmButtonText: 'Aceptar',
                                            cancelButtonText: "Cancelar",
                                            denyButtonText: `Soy el administrador`,
                                            confirmButtonColor: '#3085d6',
                                            cancelButtonColor: 'grey', 
                                        
                                            }).then((result) => {
                                            /* Read more about isConfirmed, isDenied below */
                                            if (result.isConfirmed) {
                                                Swal.fire('Para confirmar cualquier tarea llamar al administrador', '', 'warning')
                                            } else if (result.isDenied) {

                                                Swal.fire({
                                                title: 'Ingrese su contraseña',
                                                input: 'password',
                                                inputAttributes: {
                                                    autocapitalize: 'off'
                                                },
                                                showCancelButton: true,
                                                confirmButtonText: 'Confirmar',
                                                showLoaderOnConfirm: true,
                                                preConfirm: (password) => {
                                                    // Validar la contraseña ingresada
                                                    if (password !== '020799') {
                                                    Swal.showValidationMessage('La contraseña ingresada es incorrecta');
                                                    }
                                                },
                                                allowOutsideClick: () => !Swal.isLoading()
                                                }).then((result) => {
                                                if (result.isConfirmed) {
                                                    // Hacer algo cuando se confirma la contraseña
                                                    Swal.fire({
                                                    title: 'Contraseña confirmada',
                                                    icon: 'success'
                                                    });
                                                    window.location.href = '/pruebas/adesc2.php?id=<?php echo $row['cod_reserva'] ?>';
                                                }
                                                });
                                                // Redirigir al enlace deseado
                                                //window.location.href = '/pruebas/cerrarcaja.php';
                                            }
                                            })
                                        
                                            
                                        }
                                    </script>

                                    <br>
                                    <div class="container">
                                        <div>
                                        
                                                <?php
                                                    $total = 0; // Inicializar el total en 0
                                                    
                                                    while($row = mysqli_fetch_array($query)){
                                                        // Obtener el precio y convertirlo a número
                                                        $precio = floatval($row['preciou']);
                                                        
                                                        // Sumar el precio al total
                                                        $total += $precio;

                                                    }
                                                ?>
                                              

                                              <?php
                                                $servername = "localhost";
                                                $username = "root";
                                                $password = "";
                                                $dbname = "pruebar_demo";

                                                // Crear la conexión
                                                $conn = mysqli_connect($servername, $username, $password, $dbname);

                                                // Verificar la conexión
                                                if (!$conn) {
                                                    die("La conexión a la base de datos ha fallado: " . mysqli_connect_error());
                                                }

                                                // Consulta SQL para obtener la habitación de Mesa 1
                                                $sql = "SELECT habitacion FROM mesas WHERE nombre = 'Mesa 6'";

                                                $result = mysqli_query($conn, $sql);

                                                if (mysqli_num_rows($result) > 0) {
                                                    // Obtener el valor de "habitacion" de Mesa 1
                                                    $row = mysqli_fetch_assoc($result);
                                                    $habitacion = $row["habitacion"];
                                                } else {
                                                    $habitacion = "No encontrada"; // Manejar el caso en que Mesa 1 no se encuentre en la base de datos
                                                }
                                                ?>

                                                <br><br>  
                                                <h2 class="h2">El valor total de los consumos es de:</h2>
                                                <br><br>
                                                <h1 class="h1">
                                                    <b>Total: $<?php echo $total ?></b>
                                                </h1>
                                                <br><br>
                                                <h3 class="h3">El monto se añadirá al pago restante de la reservación, dentro del apartado de consumos extras de:</h3>
                                                <br><br>
                                                <h3 class="h1"><b>Habitación: <?php echo $habitacion ?></b></h3>
                                                <br><br>


                                        <div style="text-align: right;">

                                            <a href="generar_pdf6.php" target="_blank">
                                                <button class="btn btn-sm btn-primary" style="font-family: 'Nombre de tu tipografía', sans-serif;">Imprimir Ticket</button>
                                            </a>

                                            <a>
                                                <button onclick="confirmar()" class="btn btn-sm btn-success" style="font-family: 'Nombre de tu tipografía', sans-serif;">Continuar</button>
                                            </a>

                                            <a href="info_mesa6.php">
                                                <button class="btn btn-sm btn-danger" style="font-family: 'Nombre de tu tipografía', sans-serif;">Cancelar</button>
                                            </a>

                                        </div>

                                        <script type="text/javascript">
                                            function confirmar() {
                                                Swal.fire({
                                                    icon: 'question',
                                                    title: '¿Estás seguro?',
                                                    html: 'Esta acción no se puede deshacer',
                                                    showCancelButton: true,
                                                    confirmButtonText: 'Sí, estoy seguro',
                                                    cancelButtonText: 'Cancelar',
                                                    confirmButtonColor: '#4CAF50',
                                                    cancelButtonColor: '#D33',
                                                }).then((result) => {
                                                    if (result.isConfirmed) {
                                                        window.location.href = 'transactm6.php';
                                                    }
                                                });
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