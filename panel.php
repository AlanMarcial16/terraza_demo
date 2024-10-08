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

    $sql="SELECT *  FROM mesas";
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

            /* Otros estilos específicos para pantallas cuadradas */
            @media screen and (max-aspect-ratio: 1/1) {
                /* Agrega estilos específicos para pantallas cuadradas */
                body {
                    /* Por ejemplo, puedes cambiar el tamaño de la fuente o ajustar el espaciado */
                    font-size: 14px;
                }

                /* Ajusta el tamaño y la posición de los elementos según sea necesario */
            }

            @import url(https://fonts.googleapis.com/css?family=Open+Sans:400,700);

            body {
            font-family: 'Open Sans', sans-serif;
            }

            h1,h2,h3,label,input,th{
                font-family: 'Open Sans', sans-serif;
            }

            .ml-auto{
                font-size: 1.5em;
            }

            .max-w-75 {
            max-width: 90%;
            margin-right: 200px; /* ajusta este valor al ancho de tu sidebar */
            } 

            /* Ajusta el tamaño de la fuente o el espaciado para pantallas cuadradas */
            @media screen and (max-aspect-ratio: 1/1) {
                /* Otros estilos específicos para pantallas cuadradas */
                .max-w-75 {
                    /* Por ejemplo, puedes cambiar el tamaño de la fuente o ajustar el espaciado */
                    font-size: 14px;
                }
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
                width: 250px; /*cambiar a 150 px si es demasiado ancho para el monitor táctil*/
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

            .btn {
                /* Otros estilos... */
                margin-bottom: 5px; /* Reduzca el espacio entre los botones */
            }

           
        </style>   
    </head>
    <body>
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
                            // Obtener las opciones de formato para mostrar la hora en formato 12 horas con "12:46 pm"
                            const opcionesHora = {
                                hour: '2-digit',
                                minute: '2-digit',
                                hour12: true
                            };


                            // Dar formato a la hora y guardarla en una variable
                            const horaFormateada = fecha.toLocaleTimeString('es-ES', opcionesHora);

                            // Actualizar el contenido del elemento span con la fecha y hora actual en negritas
                            document.getElementById("fecha").innerHTML = "<b>" + fechaFormateada + " - " + horaFormateada + "</b>";
                        }

                        // Llama a la función actualizarFechaYHora cada segundo
                        setInterval(actualizarFechaYHora, 1000);
                    </script>



                    </div>
            </div>
            
            <div class="container">
                <div class="sidebar">
                    <ul>
                        <!--RESERVAR NUEVA MESA-->
                        <li><a><button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#modal-formulario">Reservar mesa</button></a></li>
                        <div class="modal fade" id="modal-formulario" tabindex="-1" role="dialog" aria-labelledby="modal-formulario-titulo" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h2 class="modal-title" id="gestionMesasModalLabel"><b>Gestionar mesas</b></h2>
                                <span id="fecha" class="ml-auto"></span>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <BR>
                                <div class="modal-body">
                                <form method="POST" action="editar_mesa.php">
                                <!--<label name="mesa" id="mesa">Selecciona una mesa:</label>-->
                                <select name="mesa" id="mesa">
                                <option value="">Seleccione una mesa</option>
                                <?php
                                $servername = "localhost";
                                $username = "root";
                                $password = "";
                                $dbname = "pruebar_demo";

                                // Crea la conexión
                                $conn = new mysqli($servername, $username, $password, $dbname);

                                // Verifica la conexión
                                if ($conn->connect_error) {
                                    die("Error de conexión: " . $conn->connect_error);
                                }

                                // Consulta las mesas disponibles
                                $sql = "SELECT * FROM mesas WHERE estado='Disponible'";
                                $resultado = $conn->query($sql);

                                if ($resultado->num_rows > 0) {
                                    while($fila = $resultado->fetch_assoc()) {
                                    echo "<option value='" . $fila["id"] . "'>" . $fila["nombre"] . "</option>";
                                    }
                                } else {
                                    echo "<option value='' disabled>No hay mesas Disponibles</option>";
                                }

                                // Cierra la conexión
                                $conn->close();
                                ?>
                                </select>
                                <br>
                                <button type="submit" >Editar mesa</button>
                            </form>
                                </div>
                            </div>
                            </div>
                        </div>
                        <!--ACTUALIZAR/CORREGIR MESAS-->
                        <li><a><button type="button" class="btn btn-outline-danger btn-block" data-toggle="modal" data-target="#modal-formulario2">Actualizar mesa</button></a></li>
                        <div class="modal fade" id="modal-formulario2" tabindex="-1" role="dialog" aria-labelledby="modal-formulario2-titulo" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h2 class="modal-title" id="gestionMesasModalLabel"><b>Actualizar/corregir mesas</b></h2>
                                <span id="fecha" class="ml-auto"></span>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <BR>
                                <div class="modal-body">
                                <form method="POST" action="editar_mesa2.php">
                                <!--<label name="mesa" id="mesa">Selecciona una mesa:</label>-->
                                <select name="mesa" id="mesa">
                                <option value="">Seleccione una mesa</option>
                                <?php
                                $servername = "localhost";
                                $username = "root";
                                $password = "";
                                $dbname = "pruebar_demo";

                                // Crea la conexión
                                $conn = new mysqli($servername, $username, $password, $dbname);

                                // Verifica la conexión
                                if ($conn->connect_error) {
                                    die("Error de conexión: " . $conn->connect_error);
                                }

                                // Consulta las mesas disponibles
                                $sql = "SELECT * FROM mesas WHERE estado='Ocupada'";
                                $resultado = $conn->query($sql);

                                if ($resultado->num_rows > 0) {
                                    while($fila = $resultado->fetch_assoc()) {
                                    echo "<option value='" . $fila["id"] . "'>" . $fila["nombre"] . "</option>";
                                    }
                                } else {
                                    echo "<option value='' disabled>No hay mesas Ocupadas</option>";
                                }

                                // Cierra la conexión
                                $conn->close();
                                ?>
                                </select>
                                <br>
                                <button type="submit" >Actualizar mesa</button>
                            </form>
                                </div>
                            </div>
                            </div>
                        </div>

                        <li><a><button type="button" class="btn btn-success btn-block" data-toggle="modal" data-target="#myModal">
                            Nueva mesa
                        </button></a><li>
                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="modal-formulario2-titulo" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h2 class="modal-title" id="gestionMesasModalLabel"><b>Añadir nueva mesa</b></h2>
                                    <span id="fecha" class="ml-auto"></span>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <BR>
                                    <div class="modal-body">
                                    <form action="insertarmesa.php" method="POST" class="form1">
                                        <div class="row">
                                            <div class="form-group form-inline">
                                                <label for="nombre" class="col-sm-4 col-form-label">Mesa (número):</label>
                                                <input type="int" id="nombre" name="nombre" required><br><br>
                                                </div>
                                            <div class="form-group form-inline">
                                                <label for="capacidad" class="col-sm-4 col-form-label">Capacidad:</label>
                                                <input type="int" id="capacidad" name="capacidad" required><br><br>
                                            </div>
                                            <div class="form-group form-inline">
                                                <label for="estado" class="col-sm-4 col-form-label">Estado:</label>
                                                <select class="form-control" id="estado" name="estado" required>
                                                    <option value="Disponible">Disponible</option>
                                                    <option value="Ocupada">Ocupada</option>
                                                    <option value="Reservada">Reservada</option>
                                                </select>
                                            </div>
                                        <br><br>
                                        <div class="row">
                                        <div class="col-md-12 text-center">
                                            <button type="submit" class="btn btn-primary" id="btn-submit">Enviar</button>
                                        </div>
                                        </div>
                                    </form>
                                    </div>
                                </div>
                                </div>
                            </div>
                        <li><a href="ventadirecta.php"><button type="button" class="btn btn-dark btn-block" >Venta Directa</button></a></li>
                        <li><a href="pendientes.php"><button type="button" class="btn btn-info btn-block" >Órdenes listas</button></a></li>
                        <li><a href="cajaint.php"><button type="button" class="btn btn-secondary btn-block" >Caja Chica</button></a></li>
                        <li><a href="tickets.php"><button type="button" class="btn btn-outline-info btn-block" >Historial de tickets</button></a></li>
                        <li><a href="vendidos.php"><button type="button" class="btn btn-outline-warning btn-block" >Artículos Vendidos</button></a></li>
                        <li><a><button onclick="confirmar()" type="button" class="btn btn-danger btn-block" >Reiniciar mesas</button></a></li>
                        
                        <script type="text/javascript">

                                    function confirmar() {
                                            
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
                                            window.location.href = 'reiniciar_mesas.php';
                                        }
                                        });
                                    }
                                    })
                                
                                    
                                }
                        </script>

                        <li>
                            <a>
                                <button onclick="validarCerrarSesion()" class="btn btn-warning btn-block">Cerrar sesión</button>
                            </a>
                        </li>

                        <script>
                            function validarCerrarSesion() {
                                // Realizar una solicitud AJAX al servidor para obtener el estado de las mesas
                                var xhr = new XMLHttpRequest();
                                xhr.onreadystatechange = function () {
                                    if (xhr.readyState == 4 && xhr.status == 200) {
                                        var mesas = JSON.parse(xhr.responseText);
                                        verificarEstadoMesas(mesas);
                                    }
                                };
                                xhr.open("GET", "obtener_estado_mesas.php", true);
                                xhr.send();
                            }

                            function verificarEstadoMesas(mesas) {
                                var algunaOcupada = false;

                                for (var i = 0; i < mesas.length; i++) {
                                    if (mesas[i].estado === 'Ocupada') {
                                        algunaOcupada = true;
                                        break;
                                    }
                                }

                                if (algunaOcupada) {
                                    Swal.fire({
                                        title: 'No se puede cerrar sesión',
                                        text: 'Hay mesas ocupadas. Por favor, libere todas las mesas antes de cerrar sesión.',
                                        icon: 'error',
                                    });
                                } else {
                                    salir();
                                }
                            }

                            function salir() {
                                Swal.fire({
                                    title: '¿Está seguro?',
                                    text: "¿Desea salir?",
                                    icon: 'warning',
                                    showCancelButton: true,
                                    confirmButtonColor: '#3085d6',
                                    cancelButtonColor: '#d33',
                                    confirmButtonText: 'Sí, salir',
                                    cancelButtonText: 'Cancelar'
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        // Aquí puedes colocar el código para cerrar la ventana o redireccionar a otra página
                                        window.location.href = 'logout.php';
                                    }
                                })
                            }
                        </script>


                    </ul>
                </div>


                <!-- CONTENIDO PRINCIPAL DE LA PÁGINA -->
                <div class="max-w-100">
                    <!-- aquí puedes agregar el contenido que quieras, por ejemplo: -->
                    <div class="row">
                        <?php
                        while($row = mysqli_fetch_array($query)) {
                            $enlace = "info_mesa" . $row['id'] . ".php";
                            $estado = $row['estado'];
                        
                            // Determinar si el botón "Info" debe estar habilitado o deshabilitado
                            $botonDeshabilitado = ($estado === "Disponible") ? "disabled" : "";

                            // Establecer el color del botón según el estado
                            if ($estado == "Disponible") {
                                $colorBoton = "btn-success";  // Clase CSS para el color verde
                            } else {
                                $colorBoton = "btn-primary";  // Clase CSS para el color azul
                            }
                            ?>
                                    <style>
                                    .card {
    /* Ajusta el espacio y el tamaño de la tarjeta */
    padding: 1rem;
    border-radius: 10px;
    margin-bottom: 10px; /* Reduzca el espacio entre las tarjetas */
}

/* Ajusta el estilo según la disponibilidad de la mesa */
.disponible {
    background-color: #4CAF50; /* Color verde para estado "Disponible" */
    color: white;
}

.no-disponible {
    background-color: #FF5733; /* Color rojo para otros estados */
    color: white;
}
                                    </style>

                                <div class="col-md-3">
                                    <div class="card p-3 shadow-sm <?php echo ($estado === 'Disponible') ? 'disponible' : 'no-disponible'; ?>">
                                        <div class="card-body text-center">
                                        <h3 class="card-title mb-3"><b><?php echo $row['nombre']?></b></h3>
                                        <p class="card-text">Estado: <b><?php echo $estado?></b></p>
                                        <p class="card-text">Tipo: <b><?php echo $row['tipo']?> <?php echo $row['habitacion']?></b></p>
                                        <p class="card-text">Comensal: <b><?php echo $row['comensal']?></b></p>
                                        <a href="<?php echo $enlace ?>" class="btn btn-info <?php echo $botonDeshabilitado ?>">Info</a>
                                        <br><br>
                                        <div class="d-flex justify-content-center">
                                            <button class="btn btn-danger" disabled>Eliminar mesa</button>
                                            <!-- Otros botones o contenido adicional -->
                                        </div>

                                        <!--<div class="d-flex justify-content-center">
                                            <a href="eliminar_tarjeta.php?id=<?php echo $row['id']?>" class="btn btn-danger" disabled>Eliminar mesa</a>
                                             Otros botones o contenido adicional 
                                        </div>-->

                                            <!-- Resto del código -->
                                            <!--<button onclick="eliminar()" type="button" class="btn btn-danger btn-block" >Eliminar mesa</button>-->
                                            

                                        </div>
                                    </div>
                                </div>
                                
                                    <?php
                                        }
                                    ?>
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