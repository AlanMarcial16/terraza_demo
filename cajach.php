<?php 
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}
    include("conexion2.php");
    $con=conectar();

    $sql="SELECT *  FROM cajaop";
    $query=mysqli_query($con,$sql);

    $sql2="SELECT *  FROM cajach";
    $query2=mysqli_query($con,$sql2);

    $sql3="SELECT *  FROM cajach";
    $query3=mysqli_query($con,$sql3);

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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	    <!-- Font Awesome Stylesheets -->
	    <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/responsive.css">
        <link rel="stylesheet" href="css/design.css">
        <link rel="stylesheet" href="css/estilo5.css">
        <link rel="stylesheet" href="css/estilo8.css">
        <link rel="stylesheet" href="css/estiloc.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
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
                <!--<div class="sidebar">
                    <ul>
                        <li><button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#modal-formulario">Reservar mesa</button></li>
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
                        <li><button type="button" class="btn btn-success btn-block" data-toggle="modal" data-target="#myModal">
                            Nueva mesa
                        </button><li>
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
                            <li><button type="button" class="btn btn-dark btn-block" >Nueva Orden</button></li>
                        <li><button type="button" class="btn btn-info btn-block" >Órdenes pendientes</button></li>
                        <li><a href="cajaint.php"><button type="button" class="btn btn-secondary btn-block" >Caja Chica</button></a></li>
                        <li><button onclick="confirmar()" type="button" class="btn btn-danger btn-block" >Reiniciar mesas</button></li>
                        
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

                        <li><button href="logout.php" onclick="salir()" class="btn btn-warning btn-block" >Cerrar sesión</button></li>
                        <script>
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
                </div>-->

                <div style="text-align: left;">
                    <a href="panel.php">
                        <button class="btn btn-primary"><i class="fa1 fa fa-arrow-left"></i></button>
                    </a>
                </div>
                
                <div class="container mt-5 custom-container">
                <div class="row"> 
                            <div>
                            <h1 style="text-align: center;"><b>Caja Chica</b></h1>
                            <hr>
                            <div style="text-align: right;">
                                <a href="cajaint.php">
                                    <button class="btn info">Ver Panel</button>
                                </a>
                            </div>
                            <br>
                            <form action="insertacaja.php" method="POST" style="max-width:500px;margin:auto">
                                    <h1 class="h1">Ingrese la siguiente información</h1>
                                    <hr>
                                    <p>Monto inicial</p>
                                    <input type="int" class="form-control mb-3" name="montoi" placeholder="Introduzca el monto inicial" required>
                                    <input type="hidden" class="form-control mb-3" name="total" placeholder="Total" required> 
                                    <p>Fecha</p>
                                    <input type="int" class="form-control mb-3" name="fecha" placeholder="Fecha" value="<?php echo date("Y-m-d");?>" required>
                                                                       
                                    <hr>
                                    <input type="submit" class="registerbtn">
                            </form>
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