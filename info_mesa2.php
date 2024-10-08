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

    // Definir el ID de la mesa a consultar
    $mesa_id = 2;
    // Crear la consulta SQL con la cláusula WHERE
    $sql="SELECT * FROM mesas WHERE id = $mesa_id";
    $query=mysqli_query($con,$sql);

    $sql2="SELECT *  FROM ordenMesa2";
    $query2=mysqli_query($con,$sql2);
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
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="sweetalert2.all.min.js"></script>
        <!-- Add icon library -->
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script src="/js/main.js"></script>
        <!-- OTROS SCRIPTS DE FUNCIONAMIENTO -->
        <script src="/js/fecha.js"></script>
        <style>

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

                <!-- Mostrar los detalles de la mesa en la página -->
                            <div style="text-align: left;">
                                <a href="panel.php">
                                    <button class="btn btn-primary"><i class="fa1 fa fa-arrow-left"></i></button>
                                </a>
                                <h1 class="title"><b>Detalles de la Mesa 2</b></h1>
                                <br>
                            </div>
                                <br><br><br>
                                    <hr>
                                    <?php
                                        while($row=mysqli_fetch_array($query)){
                                    ?>
                                    <div class="col">
                                            <h5 for="selector1-<?php echo $row['id'] ?>">Tipo:</h5>
                                            <input type="int" class="form-control" value="<?php echo $row['tipo'] ?>" readonly>
                                            <br>
                                            <h5 for="selector2-<?php echo $row['id'] ?>">Habitación</h5>
                                            <input type="int" class="form-control" value="<?php echo $row['habitacion'] ?>" readonly>
                                            <br>
                                            <button onclick="confirmar()" type="button" class="btn btn-warning">Cliente frecuente</button>
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
                                                                window.location.href = '#';
                                                            }
                                                            });
                                                        }
                                                        })
                                                    
                                                        
                                                    }
                                            </script>

                                            <button onclick="reiniciar()" type="button" class="btn btn-danger">Reiniciar mesa</button>
                                            <script type="text/javascript">

                                                        function reiniciar() {
                                                                
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
                                                                window.location.href = 'reiniciar_mesa2.php';
                                                            }
                                                            });
                                                        }
                                                        })
                                                    
                                                        
                                                    }
                                            </script>
                                        </div>
                                        <div class="col">
                                            <h5>Comentario</h5>
                                            <input type="int" class="form-control" value="<?php echo $row['comentario'] ?>" readonly>
                                            <br>
                                            <h5>Estado</h5>
                                            <input type="int" class="form-control" value="<?php echo $row['estado'] ?>" readonly>
                                            <br>
                                            <button type="button" class="btn btn-success btn-block" data-toggle="modal" data-target="#agregarModal">Agregar</button>
                                            <script>
                                                // Obtener los selectores
                                                    var selector1 = document.getElementById("selector1-<?php echo $row['id'] ?>");
                                                    var selector2 = document.getElementById("selector2-<?php echo $row['id'] ?>-2");

                                                    // Obtener los valores de los selectores desde localStorage
                                                    var selector1Value = localStorage.getItem("selector1Value");
                                                    var selector2Value = localStorage.getItem("selector2Value");

                                                    // Restaurar los valores de los selectores si están almacenados en localStorage
                                                    if (selector1Value !== null) {
                                                    selector1.value = selector1Value;
                                                    }
                                                    if (selector2Value !== null) {
                                                    selector2.value = selector2Value;
                                                    }

                                                    // Guardar los valores de los selectores en localStorage al cambiar su valor
                                                    selector1.addEventListener("change", function() {
                                                    localStorage.setItem("selector1Value", selector1.value);
                                                    });
                                                    selector2.addEventListener("change", function() {
                                                    localStorage.setItem("selector2Value", selector2.value);
                                                    });

                                                    // Limpiar los valores de los selectores en localStorage al hacer clic en el botón de regresar
                                                    var botonRegresar = document.getElementById("boton-regresar");
                                                    botonRegresar.addEventListener("click", function() {
                                                    localStorage.removeItem("selector1Value");
                                                    localStorage.removeItem("selector2Value");
                                                    });
                                            </script>
                                        <!-- Modal para el menú -->
                                            <div class="modal fade" id="agregarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" style="max-width: 800px;" role="document">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Selecciona una opción</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <br>
                                                <div class="modal-body">
                                                <form action="procesar_formulario2.php" method="post">
                                                    <input type="hidden" name="opcion" value="">
                                                    <input type="hidden" name="cantidad" value="">
                                                    <input type="hidden" name="precio" value="">
                                                    <hr>     
                                                    <br>
                                                    <!-- Aquí puedes agregar tus opciones -->
                                                    <h3 class="title">Especiales por Temporada</h3>
                                                    <div class="grid-container">
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://cdn-icons-png.flaticon.com/512/3778/3778728.png" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('Cena Navidad', '1', '680')">
                                                            <p>Cena Navidad</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://cdn-icons-png.flaticon.com/512/3778/3778728.png" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('Menor Cena Navidad', '1', '480')">
                                                            <p>Menor Cena Navidad</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://cdn-icons-png.flaticon.com/512/3778/3778728.png" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('Cena Fin de Año', '1', '700')">
                                                            <p>Cena Fin de Año</p>
                                                        </div>

                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://cdn-icons-png.flaticon.com/512/3778/3778728.png" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('Menor Cena Fin de Año', '1', '480')">
                                                            <p>Menor Cena Fin de Año</p>
                                                        </div>
                                                    </div>
                                                    <hr>     
                                                    <br> 
                                                    <h3 class="title">Desayunos</h3>
                                                    <!-- Aquí puedes agregar tus opciones -->
                                                    <div class="grid-container">
                                                        <div class="grid-item">
                                                            <input id="boton-imagen" type="image" src="https://static.wixstatic.com/media/9ed84f_a627376c9c8143c49d68260b8e6b8817~mv2.jpg/v1/fill/w_981,h_654,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/9ed84f_a627376c9c8143c49d68260b8e6b8817~mv2.jpg" alt="Botón de imagen"
                                                             onclick="seleccionarOpcion('Desayuno Saludable (incluido)', '1', '0')">
                                                            <p>Desayuno saludable (incluido)</p>
                                                        </div>  
                                                        <div class="grid-item">
                                                            <input id="boton-imagen" type="image" src="https://static.wixstatic.com/media/9ed84f_a627376c9c8143c49d68260b8e6b8817~mv2.jpg/v1/fill/w_981,h_654,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/9ed84f_a627376c9c8143c49d68260b8e6b8817~mv2.jpg" alt="Botón de imagen"
                                                             onclick="seleccionarOpcion('Desayuno de la casa', '1', '125')">
                                                            <p>Desayuno de la casa</p>
                                                        </div>  
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://static.wixstatic.com/media/9ed84f_25f9ac12f2a349228afcca5c0a16602f~mv2.jpg/v1/fill/w_898,h_599,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/9ed84f_25f9ac12f2a349228afcca5c0a16602f~mv2.jpg" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('Chilaquiles', '1', '135')">
                                                            <p>Chilaquiles</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://static.wixstatic.com/media/9ed84f_150a653010414153adde773ef360752f~mv2.jpg/v1/fill/w_898,h_599,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/9ed84f_150a653010414153adde773ef360752f~mv2.jpg" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('Huevos con chorizo', '1', '125')">
                                                            <p>Huevos con chorizo</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://static.wixstatic.com/media/9ed84f_f88710b382044b549830012ed0954003~mv2.jpg/v1/fill/w_860,h_573,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/9ed84f_f88710b382044b549830012ed0954003~mv2.jpg" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('Huevos a la mexicana', '1', '120')">
                                                            <p>Huevos a la mexicana</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://static.wixstatic.com/media/9ed84f_f88710b382044b549830012ed0954003~mv2.jpg/v1/fill/w_860,h_573,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/9ed84f_f88710b382044b549830012ed0954003~mv2.jpg" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('Huevos con jamón', '1', '125')">
                                                            <p>Huevos con jamón</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://static.wixstatic.com/media/9ed84f_037b4a6ee65248089280893e9e34dd2c~mv2.jpg/v1/fill/w_859,h_573,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/9ed84f_037b4a6ee65248089280893e9e34dd2c~mv2.jpg" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('Huevos rancheros', '1', '115')">
                                                            <p>Huevos rancheros</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://static.wixstatic.com/media/9ed84f_79889370a0194600a4f01d9ee5aa20f0~mv2.jpg/v1/fill/w_898,h_599,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/9ed84f_79889370a0194600a4f01d9ee5aa20f0~mv2.jpg" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('Quesadillas', '1', '125')">
                                                            <p>Quesadillas</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://static.wixstatic.com/media/9ed84f_a0e0c415791a4cfe940fd0bcae996b0e~mv2.jpg/v1/fill/w_898,h_599,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/9ed84f_a0e0c415791a4cfe940fd0bcae996b0e~mv2.jpg" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('Enfrijoladas', '1', '125')">
                                                            <p>Enfrijoladas</p>
                                                        </div>

                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://cdn-icons-png.flaticon.com/512/2424/2424721.png" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('cocktail de frutas', '1', '75')">
                                                            <p>cocktail de frutas</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://cdn-icons-png.flaticon.com/512/2424/2424721.png" alt="Botón de imagen"    
                                                        onclick="seleccionarOpcion('plato frutas niño', '1', '45')">
                                                            <p>plato frutas niño</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://cdn-icons-png.flaticon.com/512/2424/2424721.png" alt="Botón de imagen"    
                                                        onclick="seleccionarOpcion('pan dulce', '1', '25')">
                                                            <p>pan dulce</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://cdn-icons-png.flaticon.com/512/2424/2424721.png" alt="Botón de imagen"    
                                                        onclick="seleccionarOpcion('pan integral salado', '1', '15')">
                                                            <p>pan integral salado</p>
                                                        </div>
                                                    </div>
                                                    <hr>     
                                                    <br>
                                                    <!-- Aquí puedes agregar tus opciones -->
                                                    <h3 class="title">Entradas</h3>
                                                    <div class="grid-container">
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://static.wixstatic.com/media/9ed84f_13b4b421a55348c98dd437ede2c5e3a9~mv2.jpg/v1/fill/w_859,h_573,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/9ed84f_13b4b421a55348c98dd437ede2c5e3a9~mv2.jpg" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('Tlacoyos del pueblo', '1', '80')">
                                                            <p>Tlacoyos del pueblo</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://static.wixstatic.com/media/9ed84f_428132ef3a2244128180643e8f8d9aee~mv2.jpg/v1/fill/w_859,h_573,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/9ed84f_428132ef3a2244128180643e8f8d9aee~mv2.jpg" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('Gusanos de maguey', '1', '310')">
                                                            <p>Gusanos de maguey</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://static.wixstatic.com/media/9ed84f_216bdba65ed342f0a593529adfe1b308~mv2.jpg/v1/fill/w_898,h_599,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/9ed84f_216bdba65ed342f0a593529adfe1b308~mv2.jpg" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('Chicatanas', '1', '280')">
                                                            <p>Chicatanas</p>
                                                        </div>

                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://cdn-icons-png.flaticon.com/512/2424/2424721.png" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('papas gajo', '1', '70')">
                                                            <p>papas gajo</p>
                                                        </div>
                                                    </div>
                                                    <hr>     
                                                    <br>    
                                                    <!-- Aquí puedes agregar tus opciones -->
                                                    <h3 class="title">Comidas/Cenas</h3>
                                                    <div class="grid-container">
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://static.wixstatic.com/media/9ed84f_5b82c5527d6b475e92273f002493a6be~mv2.jpg/v1/fill/w_859,h_573,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/9ed84f_5b82c5527d6b475e92273f002493a6be~mv2.jpg" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('Aguachile de hongos', '1', '110')">
                                                            <p>Aguachile de hongos</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://static.wixstatic.com/media/9ed84f_3b9fe4637e9749d384ca802406a0b6be~mv2.jpg/v1/fill/w_764,h_573,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/9ed84f_3b9fe4637e9749d384ca802406a0b6be~mv2.jpg" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('Ensalada de chorizo veggie', '1', '135')">
                                                            <p>Ensalada de chorizo veggie</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://static.wixstatic.com/media/9ed84f_c8daea2e88e344358d65bc2572d40c68~mv2.jpg/v1/fill/w_859,h_573,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/9ed84f_c8daea2e88e344358d65bc2572d40c68~mv2.jpg" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('Cocktail de hongos', '1', '95')">
                                                            <p>Cocktail de hongos</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://static.wixstatic.com/media/9ed84f_0f0dd142b79d46b7af82fe7fdab84271~mv2.jpg/v1/fill/w_859,h_573,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/9ed84f_0f0dd142b79d46b7af82fe7fdab84271~mv2.jpg" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('Carpaccio de Betabel', '1', '125')">
                                                            <p>Carpaccio de Betabel</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://static.wixstatic.com/media/9ed84f_5dcf6cd19d724688b9d89fe94cc4abfd~mv2.jpg/v1/fill/w_764,h_573,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/9ed84f_5dcf6cd19d724688b9d89fe94cc4abfd~mv2.jpg" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('Tacos al pastor veggie', '1', '120')">
                                                            <p>Tacos al pastor veggie</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://static.wixstatic.com/media/9ed84f_7992b7410fe6446abe98a6377ec27c54~mv2.jpg/v1/fill/w_764,h_573,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/9ed84f_7992b7410fe6446abe98a6377ec27c54~mv2.jpg" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('Tacos de pescado al pastor', '1', '145')">
                                                            <p>Tacos de pescado al pastor</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://static.wixstatic.com/media/9ed84f_a9ea19751461418281166859932a20b8~mv2.jpg/v1/fill/w_764,h_573,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/9ed84f_a9ea19751461418281166859932a20b8~mv2.jpg" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('Hot dog al pastor', '1', '70')">
                                                            <p>Hot dog al pastor</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://static.wixstatic.com/media/9ed84f_f376c1a28c9a4c0ab36ccf474b5a544c~mv2.jpg/v1/fill/w_730,h_548,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/9ed84f_f376c1a28c9a4c0ab36ccf474b5a544c~mv2.jpg" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('Hamburguesa porto', '1', '160')">
                                                            <p>Hamburguesa porto</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://static.wixstatic.com/media/9ed84f_3fcd1132475e4eeba0171de0037b53a6~mv2.jpg/v1/fill/w_859,h_573,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/9ed84f_3fcd1132475e4eeba0171de0037b53a6~mv2.jpg" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('Albóndigas veggie con Linguini en salsa poblana', '1', '148')">
                                                            <p>Albóndigas veggie con Linguini en salsa poblana</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://static.wixstatic.com/media/9ed84f_3fcd1132475e4eeba0171de0037b53a6~mv2.jpg/v1/fill/w_859,h_573,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/9ed84f_3fcd1132475e4eeba0171de0037b53a6~mv2.jpg" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('Albóndigas', '1', '93')">
                                                            <p>Albóndigas</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://static.wixstatic.com/media/9ed84f_5e58dd49968245a8879a985c04e46c6f~mv2.jpg/v1/fill/w_954,h_573,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/9ed84f_5e58dd49968245a8879a985c04e46c6f~mv2.jpg" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('Cecina Atlixquense', '1', '255')">
                                                            <p>Cecina Atlixquense</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://static.wixstatic.com/media/9ed84f_34d2c4f3f7d14a5988d2e2856649ab2b~mv2.jpg/v1/fill/w_859,h_573,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/9ed84f_34d2c4f3f7d14a5988d2e2856649ab2b~mv2.jpg" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('Volcán de chocolate Oaxaqueño', '1', '95')">
                                                            <p>Volcán de chocolate Oaxaqueño</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://cdn-icons-png.flaticon.com/512/2424/2424721.png" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('Tarta de higos', '1', '85')">
                                                            <p>Tarta de higos</p>
                                                        </div>
                                                        <!--New elements-->
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://cdn.icon-icons.com/icons2/38/PNG/512/ingredientsbunch_Bunhingredients_ingredientesmanoj_4689.png" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('Hamburguesa', '1', '93')">
                                                            <p>Hamburguesa</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://cdn.icon-icons.com/icons2/38/PNG/512/ingredientsbunch_Bunhingredients_ingredientesmanoj_4689.png" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('ORIENTAL', '1', '93')">
                                                            <p>ORIENTAL</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://cdn.icon-icons.com/icons2/38/PNG/512/ingredientsbunch_Bunhingredients_ingredientesmanoj_4689.png" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('chorizo', '1', '93')">
                                                            <p>chorizo</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://cdn.icon-icons.com/icons2/38/PNG/512/ingredientsbunch_Bunhingredients_ingredientesmanoj_4689.png" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('chuleta', '1', '93')">
                                                            <p>chuleta</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://cdn.icon-icons.com/icons2/38/PNG/512/ingredientsbunch_Bunhingredients_ingredientesmanoj_4689.png" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('contenedor', '1', '15')">
                                                            <p>contenedor</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://cdn.icon-icons.com/icons2/38/PNG/512/ingredientsbunch_Bunhingredients_ingredientesmanoj_4689.png" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('jamón', '1', '93')">
                                                            <p>jamón</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://cdn.icon-icons.com/icons2/38/PNG/512/ingredientsbunch_Bunhingredients_ingredientesmanoj_4689.png" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('pastor', '1', '93')">
                                                            <p>pastor</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://cdn.icon-icons.com/icons2/38/PNG/512/ingredientsbunch_Bunhingredients_ingredientesmanoj_4689.png" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('salchichas', '1', '93')">
                                                            <p>salchichas</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://cdn-icons-png.flaticon.com/512/2424/2424721.png" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('salchichas', '1', '83')">
                                                            <p>tofu plancha</p>
                                                        </div>


                                                        <!--<div class="grid-item">
                                                            <img src="">
                                                            <p></p>
                                                        </div>-->
                                                    </div>
                                                    <hr>     
                                                    <br>
                                                    <!-- Aquí puedes agregar tus opciones -->
                                                    <h3 class="title">Bebidas</h3>
                                                    <div class="grid-container">
                                                        
                                                        <div class="grid-item">
                                                            <input id="boton-imagen" type="image" src="https://static.wixstatic.com/media/9ed84f_2638d7e022d84f20bc91f099d12ac310~mv2.jpg/v1/fill/w_462,h_616,al_c,q_80,usm_0.66_1.00_0.01,enc_auto/9ed84f_2638d7e022d84f20bc91f099d12ac310~mv2.jpg" alt="Botón de imagen" 
                                                            onclick="seleccionarOpcion('COCKTAIL GIN-TORONJA', '1', '125')">
                                                            <p>COCKTAIL GIN-TORONJA</p>
                                                        </div>

                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://static.wixstatic.com/media/9ed84f_5eef649ee8b6423593b06ab388c0473d~mv2.jpg/v1/fill/w_462,h_616,al_c,q_80,usm_0.66_1.00_0.01,enc_auto/9ed84f_5eef649ee8b6423593b06ab388c0473d~mv2.jpg" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('COCKTAIL GIN-PEPINO', '1', '125')">
                                                            <p>COCKTAIL GIN-PEPINO</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://static.wixstatic.com/media/9ed84f_52cdd0433a3249c594ebce668d288f58~mv2.jpg/v1/fill/w_869,h_579,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/9ed84f_52cdd0433a3249c594ebce668d288f58~mv2.jpg" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('SMOOTHIES', '1', '50')">
                                                            <p>SMOOTHIES</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://static.wixstatic.com/media/9ed84f_df5d27daac6b4798af15575fa7591116~mv2.jpg/v1/fill/w_869,h_579,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/9ed84f_df5d27daac6b4798af15575fa7591116~mv2.jpg" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('SODA ITALIANA MINERAL', '1', '50')">
                                                            <p>SODA ITALIANA MINERAL</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://static.wixstatic.com/media/9ed84f_cd096f6627ca4b67a56edfc32b0edbdd~mv2.jpeg/v1/fill/w_640,h_487,al_c,q_80,enc_auto/9ed84f_cd096f6627ca4b67a56edfc32b0edbdd~mv2.jpeg" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('CERVEZA HERTOG (HOLANDESA)', '1', '250')">
                                                            <p>CERVEZA HERTOG (HOLANDESA)</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://static.wixstatic.com/media/9ed84f_cd096f6627ca4b67a56edfc32b0edbdd~mv2.jpeg/v1/fill/w_640,h_487,al_c,q_80,enc_auto/9ed84f_cd096f6627ca4b67a56edfc32b0edbdd~mv2.jpeg" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('CERVEZA LEFFE', '1', '90')">
                                                            <p>CERVEZA LEFFE</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://static.wixstatic.com/media/9ed84f_cd096f6627ca4b67a56edfc32b0edbdd~mv2.jpeg/v1/fill/w_640,h_487,al_c,q_80,enc_auto/9ed84f_cd096f6627ca4b67a56edfc32b0edbdd~mv2.jpeg" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('CERVEZA ALEMANA', '1', '180')">
                                                            <p>CERVEZA ALEMANA</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://static.wixstatic.com/media/9ed84f_cd096f6627ca4b67a56edfc32b0edbdd~mv2.jpeg/v1/fill/w_640,h_487,al_c,q_80,enc_auto/9ed84f_cd096f6627ca4b67a56edfc32b0edbdd~mv2.jpeg" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('STOUT  C5', '1', '130')">
                                                            <p>STOUT  C5</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://static.wixstatic.com/media/9ed84f_2dc2eb5ea16542d1a95ff0d3dd02d60e~mv2.jpg/v1/fill/w_869,h_579,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/9ed84f_2dc2eb5ea16542d1a95ff0d3dd02d60e~mv2.jpg" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('CERVEZA SAGA', '1', '85')">
                                                            <p>CERVEZA SAGA</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://static.wixstatic.com/media/9ed84f_2dc2eb5ea16542d1a95ff0d3dd02d60e~mv2.jpg/v1/fill/w_869,h_579,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/9ed84f_2dc2eb5ea16542d1a95ff0d3dd02d60e~mv2.jpg" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('CERVEZA SERDÁN', '1', '80')">
                                                            <p>CERVEZA SERDÁN</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://static.wixstatic.com/media/9ed84f_2dc2eb5ea16542d1a95ff0d3dd02d60e~mv2.jpg/v1/fill/w_869,h_579,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/9ed84f_2dc2eb5ea16542d1a95ff0d3dd02d60e~mv2.jpg" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('CERVEZA OSADIA', '1', '85')">
                                                            <p>CERVEZA OSADIA</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://cdn-icons-png.flaticon.com/512/2405/2405451.png" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('CERVEZA STOUT CASA FLORA', '1', '90')">
                                                            <p>CERVEZA STOUT CASA FLORA</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://cdn-icons-png.flaticon.com/512/1261/1261134.png" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('AGUA MINERAL', '1', '45')">
                                                            <p>AGUA MINERAL</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://cdn-icons-png.flaticon.com/512/1261/1261134.png" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('limonada', '1', '55')">
                                                            <p>limonada</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://cdn-icons-png.flaticon.com/512/1261/1261134.png" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('REFRESCO COCA-COLA 235ML', '1', '25')">
                                                            <p>REFRESCO COCA-COLA 235ML</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://cdn-icons-png.flaticon.com/512/1261/1261134.png" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('REFRESCO COCA-COLA 335ML', '1', '25')">
                                                            <p>REFRESCO COCA-COLA 335ML</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://cdn-icons-png.flaticon.com/512/1261/1261134.png" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('REFRESCO COCA-COLA ZERO', '1', '25')">
                                                            <p>REFRESCO COCA-COLA ZERO</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://cdn-icons-png.flaticon.com/512/1261/1261134.png" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('AGUA BONAFONT 235 ML', '1', '25')">
                                                            <p>AGUA BONAFONT 235 ML</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://cdn-icons-png.flaticon.com/512/1261/1261134.png" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('AGUA TONICA', '1', '45')">
                                                            <p>AGUA TONICA</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://cdn-icons-png.flaticon.com/512/1261/1261134.png" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('AGUA DE FRUTAS', '1', '45')">
                                                            <p>AGUA DE FRUTAS</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://cdn-icons-png.flaticon.com/512/1261/1261134.png" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('JUGO VERDE', '1', '55')">
                                                            <p>JUGO VERDE</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://cdn-icons-png.flaticon.com/512/1261/1261134.png" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('JUGO DE NARANJA', '1', '60')">
                                                            <p>JUGO DE NARANJA</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://cdn-icons-png.flaticon.com/512/2405/2405451.png" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('MIMOSA', '1', '80')">
                                                            <p>MIMOSA</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://cdn-icons-png.flaticon.com/512/2405/2405451.png" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('MEZCAL SHOT', '1', '90')">
                                                            <p>MEZCAL SHOT</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://cdn-icons-png.flaticon.com/512/2405/2405451.png" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('MEZCAL DESTILADO DE MOLE', '1', '971')">
                                                            <p>MEZCAL DESTILADO DE MOLE</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://cdn-icons-png.flaticon.com/512/2405/2405451.png" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('PROMO C5', '1', '250')">
                                                            <p>PROMO C5</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://cdn-icons-png.flaticon.com/512/2405/2405451.png" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('PROMO LICOR', '1', '150')">
                                                            <p>PROMO LICOR</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://cdn-icons-png.flaticon.com/512/2405/2405451.png" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('TEQUILA MAESTRO DOBEL COPA', '1', '130')">
                                                            <p>TEQUILA MAESTRO DOBEL COPA</p>
                                                        </div>

                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://cdn-icons-png.flaticon.com/512/2405/2405451.png" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('RON BACARDI BLANCO COPA', '1', '80')">
                                                            <p>RON BACARDI BLANCO COPA</p>
                                                        </div>

                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://cdn-icons-png.flaticon.com/512/2405/2405451.png" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('1800 CRISTALINO COPA', '1', '125')">
                                                            <p>1800 CRISTALINO COPA COPA</p>
                                                        </div>

                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://cdn-icons-png.flaticon.com/512/2405/2405451.png" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('DON JULIO REPOSADO COPA', '1', '90')">
                                                            <p>DON JULIO REPOSADO COPA COPA</p>
                                                        </div>

                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://cdn-icons-png.flaticon.com/512/2405/2405451.png" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('DON JULIO AÑEJO COPA', '1', '130')">
                                                            <p>DON JULIO AÑEJO COPA COPA</p>
                                                        </div>

                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://cdn-icons-png.flaticon.com/512/2405/2405451.png" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('JW ROJO COPA', '1', '90')">
                                                            <p>JW ROJO COPA</p>
                                                        </div>

                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://cdn-icons-png.flaticon.com/512/2405/2405451.png" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('JW NEGRO COPA', '1', '130')">
                                                            <p>JW NEGRO COPA</p>
                                                        </div>

                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://cdn-icons-png.flaticon.com/512/2405/2405451.png" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('VODKA COPA', '1', '90')">
                                                            <p>VODKA COPA</p>
                                                        </div>

                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://cdn-icons-png.flaticon.com/512/2405/2405451.png" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('LICOR 43 COPA', '1', '70')">
                                                            <p>LICOR 43 COPA</p>
                                                        </div>

                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://cdn-icons-png.flaticon.com/512/2405/2405451.png" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('MATUSALEN COPA', '1', '90')">
                                                            <p>MATUSALEN COPA</p>
                                                        </div>

                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://cdn-icons-png.flaticon.com/512/2405/2405451.png" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('TANQUERAY COPA', '1', '80')">
                                                            <p>TANQUERAY COPA</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://static.wixstatic.com/media/9ed84f_e54f88537909425392948c422c2132b0~mv2.jpg/v1/fill/w_869,h_579,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/9ed84f_e54f88537909425392948c422c2132b0~mv2.jpg" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('VINO ESPUMOSO TIERRA AZUL', '1', '525')">
                                                            <p>VINO ESPUMOSO TIERRA AZUL</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://static.wixstatic.com/media/9ed84f_e54f88537909425392948c422c2132b0~mv2.jpg/v1/fill/w_869,h_579,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/9ed84f_e54f88537909425392948c422c2132b0~mv2.jpg" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('VINO ESPUMOSO TIERRA AZUL COPA', '1', '90')">
                                                            <p>VINO ESPUMOSO TIERRA AZUL COPA</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://cdn-icons-png.flaticon.com/512/2405/2405451.png" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('JACK DANIELS COPA', '1', '90')">
                                                            <p>JACK DANIELS COPA</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://cdn-icons-png.flaticon.com/512/2405/2405451.png" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('JAGER MEISTER COPA', '1', '90')">
                                                            <p>JAGER MEISTER COPA</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://static.wixstatic.com/media/9ed84f_8ef963e0e60a4dcd9632f87badeb30ba~mv2.jpg/v1/fill/w_869,h_579,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/9ed84f_8ef963e0e60a4dcd9632f87badeb30ba~mv2.jpg" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('CAFÉ DE OLLA', '1', '30')">
                                                            <p>CAFÉ DE OLLA</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://static.wixstatic.com/media/9ed84f_88e2dff336c24fea98091ef589fa7579~mv2.jpg/v1/fill/w_869,h_579,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/9ed84f_88e2dff336c24fea98091ef589fa7579~mv2.jpg" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('CAPUCHINO', '1', '35')">
                                                            <p>CAPUCHINO</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://static.wixstatic.com/media/9ed84f_88e2dff336c24fea98091ef589fa7579~mv2.jpg/v1/fill/w_869,h_579,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/9ed84f_88e2dff336c24fea98091ef589fa7579~mv2.jpg" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('CARAJILLO', '1', '80')">
                                                            <p>CARAJILLO</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://cdn-icons-png.flaticon.com/512/2405/2405451.png" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('EXPRESO TONIC', '1', '65')">
                                                            <p>EXPRESO TONIC</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://static.wixstatic.com/media/9ed84f_88e2dff336c24fea98091ef589fa7579~mv2.jpg/v1/fill/w_869,h_579,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/9ed84f_88e2dff336c24fea98091ef589fa7579~mv2.jpg" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('CAFÉ AMERICANO', '1', '35')">
                                                            <p>CAFÉ AMERICANO</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://static.wixstatic.com/media/9ed84f_8ef963e0e60a4dcd9632f87badeb30ba~mv2.jpg/v1/fill/w_869,h_579,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/9ed84f_8ef963e0e60a4dcd9632f87badeb30ba~mv2.jpg" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('CAFÉ EXPRESO', '1', '35')">
                                                            <p>CAFÉ EXPRESO</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://cdn-icons-png.flaticon.com/512/2405/2405451.png" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('WHISKY CHIVAS 12 COPA CON MINERAL', '1', '125')">
                                                            <p>WHISKY CHIVAS 12 COPA CON MINERAL</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://cdn-icons-png.flaticon.com/512/2405/2405451.png" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('TEQUILA HORNITOS COPA', '1', '90')">
                                                            <p>TEQUILA HORNITOS COPA</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://cdn-icons-png.flaticon.com/512/1261/1261134.png" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('TE INFUSION', '1', '35')">
                                                            <p>TE INFUSION</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://cdn-icons-png.flaticon.com/512/2405/2405451.png" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('PRE VENTURA CAVA SEMI SEC RESERVA', '1', '700')">
                                                            <p>PRE VENTURA CAVA SEMI SEC RESERVA</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://cdn-icons-png.flaticon.com/512/2405/2405451.png" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('MIX NUECES', '1', '70')">
                                                            <p>MIX NUECES</p>
                                                        </div>
                                                        <!--New elements-->
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://cdn-icons-png.flaticon.com/512/2405/2405451.png" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('calixa monte xanic', '1', '850')">
                                                            <p>calixa monte xanic</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://cdn-icons-png.flaticon.com/512/2405/2405451.png" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('aldo chaparro', '1', '180')">
                                                            <p>aldo chaparro</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://cdn-icons-png.flaticon.com/512/2405/2405451.png" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('alvinte albariño', '1', '400')">
                                                            <p>alvinte albariño</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://cdn-icons-png.flaticon.com/512/2405/2405451.png" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('cerveza franziskaner', '1', '160')">
                                                            <p>cerveza franziskaner</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://cdn-icons-png.flaticon.com/512/2405/2405451.png" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('cerveza grand prestige', '1', '220')">
                                                            <p>cerveza grand prestige</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://cdn-icons-png.flaticon.com/512/2405/2405451.png" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('modelo especial', '1', '50')">
                                                            <p>modelo especial</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://cdn-icons-png.flaticon.com/512/2405/2405451.png" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('modelo negra', '1', '55')">
                                                            <p>modelo negra</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://cdn-icons-png.flaticon.com/512/2405/2405451.png" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('esteban martin 6 meses', '1', '480')">
                                                            <p>esteban martin 6 meses</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://cdn-icons-png.flaticon.com/512/2405/2405451.png" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('esteban martin 12 meses', '1', '625')">
                                                            <p>esteban martin 12 meses</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://cdn-icons-png.flaticon.com/512/2405/2405451.png" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('curacha', '1', '160')">
                                                            <p>curacha</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://cdn-icons-png.flaticon.com/512/2405/2405451.png" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('curacha', '1', '250')">
                                                            <p>Descorche por botella</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://cdn-icons-png.flaticon.com/512/2405/2405451.png" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('ensamble ojos negros', '1', '580')">
                                                            <p>ensamble ojos negros</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://cdn-icons-png.flaticon.com/512/2405/2405451.png" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('lateral', '1', '700')">
                                                            <p>lateral</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://cdn-icons-png.flaticon.com/512/2405/2405451.png" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('les granaches', '1', '650')">
                                                            <p>les granaches</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://cdn-icons-png.flaticon.com/512/2405/2405451.png" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('mantarraya', '1', '80')">
                                                            <p>mantarraya</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://cdn-icons-png.flaticon.com/512/2405/2405451.png" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('merlot la niña', '1', '400')">
                                                            <p>merlot la niña</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://cdn-icons-png.flaticon.com/512/2405/2405451.png" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('oak shiraz critobal', '1', '890')">
                                                            <p>oak shiraz critobal</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://cdn-icons-png.flaticon.com/512/2405/2405451.png" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('ponche con mezcal', '1', '50')">
                                                            <p>ponche con mezcal</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://cdn-icons-png.flaticon.com/512/2405/2405451.png" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('cristobal sangiovese', '1', '525')">
                                                            <p>cristobal sangiovese</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://cdn-icons-png.flaticon.com/512/2405/2405451.png" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('suavignon blanc', '1', '600')">
                                                            <p>suavignon blanc</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://cdn-icons-png.flaticon.com/512/2405/2405451.png" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('super lupe', '1', '140')">
                                                            <p>super lupe</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://cdn-icons-png.flaticon.com/512/2405/2405451.png" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('tablas', '1', '720')">
                                                            <p>tablas</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://cdn-icons-png.flaticon.com/512/2405/2405451.png" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('torrontes cristobal', '1', '500')">
                                                            <p>torrontes cristobal</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://cdn-icons-png.flaticon.com/512/2405/2405451.png" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('oak shiraz cristobal', '1', '890')">
                                                            <p>oak shiraz cristobal</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://cdn-icons-png.flaticon.com/512/2405/2405451.png" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('mezcal espadin maduro', '1', '505')">
                                                            <p>mezcal espadin maduro</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://cdn-icons-png.flaticon.com/512/2405/2405451.png" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('mezcal mescaranja', '1', '369')">
                                                            <p>mezcal mescaranja</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://cdn-icons-png.flaticon.com/512/2405/2405451.png" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('mezcal papalomet joven copa', '1', '95')">
                                                            <p>mezcal papalomet joven copa</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://cdn-icons-png.flaticon.com/512/2405/2405451.png" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('mezcal pichomel copa', '1', '80')">
                                                            <p>mezcal pichomel copa</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://cdn-icons-png.flaticon.com/512/2405/2405451.png" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('mezcal criollo mexicano joven 375 ml', '1', '449')">
                                                            <p>mezcal criollo mexicano joven 375 ml</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://cdn-icons-png.flaticon.com/512/2405/2405451.png" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('mezcal criollo mexicano joven copa', '1', '95')">
                                                            <p>mezcal criollo mexicano joven copa</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://cdn-icons-png.flaticon.com/512/2405/2405451.png" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('mezcal criollo mexicano joven 375 ml', '1', '449')">
                                                            <p>mezcal criollo mexicano joven 375 ml</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://cdn-icons-png.flaticon.com/512/2405/2405451.png" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('mezcal criollo mexicano joven copa', '1', '95')">
                                                            <p>mezcal criollo mexicano joven copa</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://cdn-icons-png.flaticon.com/512/2405/2405451.png" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('mezcal criollo mexicano joven 375 ml', '1', '566')">
                                                            <p>mezcal destilado de mole 375 ml</p>
                                                        </div>

                                                    </div>
                                                    <hr>     
                                                    <br>   
                                                    <h3 class="title">EXTRAS</h3>
                                                    <div class="grid-container">
                                                        
                                                        <div class="grid-item">
                                                            <input id="boton-imagen" type="image" src="https://cdn-icons-png.flaticon.com/512/985/985478.png" alt="Botón de imagen" 
                                                            onclick="seleccionarOpcion('Extra champiñones', '1', '18')">
                                                            <p>Extra champiñones</p>
                                                        </div>
                                                        <div class="grid-item">
                                                            <input id="boton-imagen" type="image" src="https://cdn-icons-png.flaticon.com/512/985/985478.png" alt="Botón de imagen" 
                                                            onclick="seleccionarOpcion('Extra huevo', '1', '18')">
                                                            <p>Extra huevo</p>
                                                        </div>
                                                        <div class="grid-item">
                                                            <input id="boton-imagen" type="image" src="https://cdn-icons-png.flaticon.com/512/985/985478.png" alt="Botón de imagen" 
                                                            onclick="seleccionarOpcion('Extra cecina', '1', '80')">
                                                            <p>Extra cecina</p>
                                                        </div>
                                                        <div class="grid-item">
                                                            <input id="boton-imagen" type="image" src="https://cdn-icons-png.flaticon.com/512/985/985478.png" alt="Botón de imagen" 
                                                            onclick="seleccionarOpcion('Extra chorizo', '1', '18')">
                                                            <p>Extra chorizo</p>
                                                        </div>
                                                        <div class="grid-item">
                                                            <input id="boton-imagen" type="image" src="https://cdn-icons-png.flaticon.com/512/985/985478.png" alt="Botón de imagen" 
                                                            onclick="seleccionarOpcion('Extra ingrediente', '1', '15')">
                                                            <p>Extra ingrediente</p>
                                                        </div>
                                                        

                                                    </div>
                                                    <hr>     
                                                    <br>

                                                    <h3 class="title">OTROS</h3>
                                                    <div class="grid-container">
                                                        
                                                        <div class="grid-item">
                                                            <input id="boton-imagen" type="image" src="data:image/png;base64,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" alt="Botón de imagen" 
                                                            onclick="seleccionarOpcion('toalla femenina', '1', '10')">
                                                            <p>toalla femenina</p>
                                                        </div>
                                                        <div class="grid-item">
                                                            <input id="boton-imagen" type="image" src="data:image/png;base64,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" alt="Botón de imagen" 
                                                            onclick="seleccionarOpcion('pasta dental grande', '1', '60')">
                                                            <p>pasta dental grande</p>
                                                        </div>
                                                        <div class="grid-item">
                                                            <input id="boton-imagen" type="image" src="data:image/png;base64,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" alt="Botón de imagen" 
                                                            onclick="seleccionarOpcion('depend', '1', '50')">
                                                            <p>depend</p>
                                                        </div>
                                                        <div class="grid-item">
                                                            <input id="boton-imagen" type="image" src="data:image/png;base64,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" alt="Botón de imagen" 
                                                            onclick="seleccionarOpcion('pasta denta chica', '1', '40')">
                                                            <p>pasta denta chica</p>
                                                        </div>
                                                        <div class="grid-item">
                                                            <input id="boton-imagen" type="image" src="data:image/png;base64,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" alt="Botón de imagen" 
                                                            onclick="seleccionarOpcion('crema', '1', '45')">
                                                            <p>crema</p>
                                                        </div>
                                                        <div class="grid-item">
                                                            <input id="boton-imagen" type="image" src="data:image/png;base64,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" alt="Botón de imagen" 
                                                            onclick="seleccionarOpcion('jabón zest', '1', '25')">
                                                            <p>jabón zest</p>
                                                        </div>
                                                        <div class="grid-item">
                                                            <input id="boton-imagen" type="image" src="data:image/png;base64,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" alt="Botón de imagen" 
                                                            onclick="seleccionarOpcion('jabón tepeyac, coral, lirio', '1', '20')">
                                                            <p>jabón tepeyac, coral, lirio</p>
                                                        </div>
                                                        <div class="grid-item">
                                                            <input id="boton-imagen" type="image" src="data:image/png;base64,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" alt="Botón de imagen" 
                                                            onclick="seleccionarOpcion('cepillo de dientes', '1', '35')">
                                                            <p>cepillo de dientes</p>
                                                        </div>
                                                        <div class="grid-item">
                                                            <input id="boton-imagen" type="image" src="data:image/png;base64,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" alt="Botón de imagen" 
                                                            onclick="seleccionarOpcion('rastrillo', '1', '30')">
                                                            <p>rastrillo</p>
                                                        </div>
                                                        <div class="grid-item">
                                                            <input id="boton-imagen" type="image" src="data:image/png;base64,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" alt="Botón de imagen" 
                                                            onclick="seleccionarOpcion('desodorante', '1', '90')">
                                                            <p>desodorante</p>
                                                        </div>
                                                        <div class="grid-item">
                                                            <input id="boton-imagen" type="image" src="data:image/png;base64,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" alt="Botón de imagen" 
                                                            onclick="seleccionarOpcion('crema de manos', '1', '45')">
                                                            <p>crema de manos</p>
                                                        </div>
                                                        <div class="grid-item">
                                                            <input id="boton-imagen" type="image" src="data:image/png;base64,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" alt="Botón de imagen" 
                                                            onclick="seleccionarOpcion('crema para peinar', '1', '100')">
                                                            <p>crema para peinar</p>
                                                        </div>
                                                        <div class="grid-item">
                                                            <input id="boton-imagen" type="image" src="data:image/png;base64,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" alt="Botón de imagen" 
                                                            onclick="seleccionarOpcion('esponja de baño', '1', '30')">
                                                            <p>esponja de baño</p>
                                                        </div>
                                                        <div class="grid-item">
                                                            <input id="boton-imagen" type="image" src="data:image/png;base64,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" alt="Botón de imagen" 
                                                            onclick="seleccionarOpcion('guayabera', '1', '890')">
                                                            <p>guayabera</p>
                                                        </div>
                                                        <div class="grid-item">
                                                            <input id="boton-imagen" type="image" src="" alt="Botón de imagen" 
                                                            onclick="seleccionarOpcion('agatlix', '1', '100')">
                                                            <p>agatlix</p>
                                                        </div>
                                                        <div class="grid-item">
                                                            <input id="boton-imagen" type="image" src="" alt="Botón de imagen" 
                                                            onclick="seleccionarOpcion('camisa arroparte', '1', '950')">
                                                            <p>camisa arroparte</p>
                                                        </div>

                                                    </div>
                                                    <hr>     
                                                    <br>   
                                        </form>
                                        <?php 
                                            }
                                        ?>
                                        <!-- Agrega más elementos aquí si es necesario -->
                                            </div>
                                                </div>
                                                </div>
                                        </div>
                                        </div>
                                        <!--FIN DEL MODAL-->
                                        </div>
                                        <script>
                                            function seleccionarOpcion(opcion, cantidad, precio) {
                                                document.querySelector('input[name="opcion"]').value = opcion;
                                                document.querySelector('input[name="cantidad"]').value = cantidad;
                                                document.querySelector('input[name="precio"]').value = precio;
                                                document.querySelector('form').submit();
                                            }
                                        </script>

                                        <style>
                                        .btn-group {
                                            display: flex;
                                            gap: 10px; /* Ajusta el valor de gap según el espacio que desees entre los botones */
                                        }
                                        </style>

                                        <div class="table-responsive mt-3">
                                        <br><br>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                <th>#</th>
                                                <th colspan="3">Concepto</th>
                                                <th>Cantidad</th>
                                                <th>Precio unitario</th>
                                                <th>Importe</th>
                                                <th colspan="1">Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            <script>
                                                var idToDelete = <?php echo $row['id']; ?>;
                                            </script>
                                            
                                            <?php
                                            while($row=mysqli_fetch_array($query2)){
                                            ?>
                                            <tr>
                                                <td><?php echo $row['id']?></td>
                                                <td colspan="3"><?php echo $row['nombre']?></td>
                                                <td><?php echo $row['cantidad']?></td>
                                                <td>$<?php echo $row['preciou']?>.00</td>
                                                <td>$<?php echo $row['preciou']?>.00</td>
                                                <td colspan="1">
                                                    <div class="btn-group d-flex justify-content-center">
                                                        <form id="eliminar-form-<?php echo $row['id']; ?>" action="procesar_eliminar2.php" method="post">
                                                            <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                                                            <button id="eliminar-btn-<?php echo $row['id']; ?>" type="button" class="btn btn-sm btn-danger" onclick="validarProceso(<?php echo $row['id']; ?>)"><i class="fa fa-times"></i></button>
                                                        </form>
                                                        <a href="#" onclick="showAlert(); return false;">
                                                            <button class="btn btn-sm btn-secondary"><i class="fa fa-pencil-square-o"></i></button>
                                                        </a>
                                                        <script>
                                                            function showAlert() {
                                                                Swal.fire({
                                                                    title: 'Operación restringida',
                                                                    text: 'No tienes permisos para realizar esta operación.',
                                                                    icon: 'warning',
                                                                    confirmButtonText: 'Aceptar'
                                                                });
                                                            }
                                                        </script>
                                                        <!--<a href="editarticlem2.php?id=<?php echo $row['id']; ?>">
                                                            <button class="btn btn-sm btn-secondary"><i class="fa fa-pencil-square-o"></i></button>
                                                        </a>-->
                                                    </div>
                                                </td>

                                                <script>
                                                    function validarProceso(idToDelete) {
                                                        Swal.fire({
                                                            title: 'VALIDE EL PROCESO CON COCINA',
                                                            showCancelButton: true,
                                                            confirmButtonText: 'Continuar',
                                                            cancelButtonText: 'Cancelar'
                                                        }).then((result) => {
                                                            if (result.isConfirmed) {
                                                                // Al confirmar, solicitar la contraseña directamente
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
                                                                        // Realizar la validación de la contraseña aquí
                                                                        return new Promise((resolve) => {
                                                                            if (password !== '020799') {
                                                                                Swal.showValidationMessage('La contraseña ingresada es incorrecta');
                                                                                resolve();
                                                                            } else {
                                                                                // Si la contraseña es correcta, enviar el formulario específico
                                                                                document.getElementById('eliminar-form-' + idToDelete).submit();
                                                                                resolve();
                                                                            }
                                                                        });
                                                                    },
                                                                    allowOutsideClick: () => !Swal.isLoading()
                                                                });
                                                            }
                                                        });
                                                    }
                                                </script>


                                            <style>
                                                .custom-total {
                                                    font-size: 24px; /* Tamaño de fuente más grande */
                                                    color: red; /* Color de texto personalizado */
                                                    /* Otros estilos personalizados según tus preferencias */
                                                }

                                            </style>

                                            </tr>
                                            <!-- Agrega más filas aquí si es necesario -->
                                            <?php 
                                            }
                                            ?>
                                            <br>
                                            <?php
                                                // Configuración de la conexión a la base de datos
                                                $servername = "localhost"; // Puedes cambiarlo si tu base de datos está en otro servidor
                                                $username = "root";
                                                $password = "";
                                                $database = "pruebar_demo";

                                                // Crear la conexión
                                                $tuConexion = new mysqli($servername, $username, $password, $database);

                                                // Verificar la conexión
                                                if ($tuConexion->connect_error) {
                                                    die("Conexión fallida: " . $tuConexion->connect_error);
                                                }

                                                $querySum = "SELECT SUM(CAST(preciou AS DECIMAL(10,2))) AS total_preciou FROM ordenmesa2";
                                                $resultSum = mysqli_query($tuConexion, $querySum);

                                                // Obtener el resultado de la suma total
                                                $rowSum = mysqli_fetch_assoc($resultSum);
                                                $total_preciou = $rowSum['total_preciou'];

                                                // Cerrar la conexión al final del script
                                                $tuConexion->close();
                                            ?>

                                                <td colspan="7" class="text-right font-weight-bold custom-total">Total:</td>
                                                <td colspan="1"  class="font-weight-bold custom-total">$<?php echo number_format($total_preciou, 2); ?></td>

                                                </tr>
                                                
                                            </tbody>
                                            </table>

                                            <style>
                                                #contenedor-botones {
                                                    text-align: right;
                                                }
                                            </style>

                                            <div id="contenedor-botones" style="text-align: right;">
                                                <div class="btn-group justify-content-end" role="group" aria-label="Botones">
                                                    <a href="pagarventam2.php">
                                                        <button class="btn btn-sm btn-success" style="font-family: 'Nombre de tu tipografía', sans-serif;">Proceder al pago</button>
                                                    </a>
                                                    <a href="generar_pdf2.php" target="_blank">
                                                        <button class="btn btn-sm btn-primary" style="font-family: 'Nombre de tu tipografía', sans-serif;">Imprimir Ticket</button>
                                                    </a>
                                                    <a href="mandarhabm2.php">
                                                        <button class="btn btn-sm btn-info" style="font-family: 'Nombre de tu tipografía', sans-serif;">Mandar a la habitación</button>
                                                    </a>
                                                    <a href="guardaticket2.php">
                                                        <button class="btn btn-sm btn-dark" style="font-family: 'Nombre de tu tipografía', sans-serif;">Dividir cuenta</button>
                                                    </a>
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