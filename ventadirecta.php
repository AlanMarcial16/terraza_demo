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
    $mesa_id = 1;
    // Crear la consulta SQL con la cláusula WHERE
    $sql="SELECT * FROM mesas WHERE id = $mesa_id";
    $query=mysqli_query($con,$sql);

    $sql2="SELECT *  FROM ventadirecta";
    $query2=mysqli_query($con,$sql2);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Venta Directa - Ocaso Terraza</title>
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
            
            <div class="container">
                
                <div class="row">

                <!-- Mostrar los detalles de la mesa en la página -->
                            <div style="text-align: left;">
                                <a href="panel.php">
                                    <button class="btn btn-primary"><i class="fa1 fa fa-arrow-left"></i></button>
                                </a>
                                <h1 class="title">Venta Directa</h1>
                            </div>
                                <br><br><br>
                                    <hr>
                                    <?php
                                        while($row=mysqli_fetch_array($query)){
                                    ?>
                                    <div class="col">
                                            <label for="selector1-<?php echo $row['id'] ?>">Tipo:</label>
                                            <input type="int" class="form-control" value="Venta Directa" readonly>
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
                                                                window.location.href = 'reiniciar_mesas.php';
                                                            }
                                                            });
                                                        }
                                                        })
                                                    
                                                        
                                                    }
                                            </script>
                                        </div>
                                        <div class="col">
                                            <label>Empleado</label>
                                            <input type="int" class="form-control" value="<?php echo $row['id'] ?>" readonly>
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
                                                <form action="procesar_venta.php" method="post">
                                                    <input type="hidden" name="opcion" value="">
                                                    <h3 class="title">Desayunos</h3>
                                                    <!-- Aquí puedes agregar tus opciones -->
                                                    <div class="grid-container">
                                                        <div class="grid-item">
                                                            <input id="boton-imagen" type="image" src="https://static.wixstatic.com/media/9ed84f_a627376c9c8143c49d68260b8e6b8817~mv2.jpg/v1/fill/w_981,h_654,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/9ed84f_a627376c9c8143c49d68260b8e6b8817~mv2.jpg" alt="Botón de imagen"
                                                             onclick="seleccionarOpcion('Desayuno saludable')">
                                                            <p>Desayuno saludable</p>
                                                        </div>  
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://static.wixstatic.com/media/9ed84f_25f9ac12f2a349228afcca5c0a16602f~mv2.jpg/v1/fill/w_898,h_599,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/9ed84f_25f9ac12f2a349228afcca5c0a16602f~mv2.jpg" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('Chilaquiles')">
                                                            <p>Chilaquiles</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://static.wixstatic.com/media/9ed84f_150a653010414153adde773ef360752f~mv2.jpg/v1/fill/w_898,h_599,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/9ed84f_150a653010414153adde773ef360752f~mv2.jpg" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('Huevos con chorizo')">
                                                            <p>Huevos con chorizo</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://static.wixstatic.com/media/9ed84f_f88710b382044b549830012ed0954003~mv2.jpg/v1/fill/w_860,h_573,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/9ed84f_f88710b382044b549830012ed0954003~mv2.jpg" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('Huevos a la mexicana')">
                                                            <p>Huevos a la mexicana</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://static.wixstatic.com/media/9ed84f_037b4a6ee65248089280893e9e34dd2c~mv2.jpg/v1/fill/w_859,h_573,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/9ed84f_037b4a6ee65248089280893e9e34dd2c~mv2.jpg" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('Huevos rancheros')">
                                                            <p>Huevos rancheros</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://static.wixstatic.com/media/9ed84f_79889370a0194600a4f01d9ee5aa20f0~mv2.jpg/v1/fill/w_898,h_599,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/9ed84f_79889370a0194600a4f01d9ee5aa20f0~mv2.jpg" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('Quesadillas')">
                                                            <p>Quesadillas</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://static.wixstatic.com/media/9ed84f_a0e0c415791a4cfe940fd0bcae996b0e~mv2.jpg/v1/fill/w_898,h_599,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/9ed84f_a0e0c415791a4cfe940fd0bcae996b0e~mv2.jpg" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('Enfrijoladas')">
                                                            <p>Enfrijoladas</p>
                                                        </div>
                                                    </div>
                                                    <hr>     
                                                    <br>
                                                    <!-- Aquí puedes agregar tus opciones -->
                                                    <h3 class="title">Entradas</h3>
                                                    <div class="grid-container">
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://static.wixstatic.com/media/9ed84f_13b4b421a55348c98dd437ede2c5e3a9~mv2.jpg/v1/fill/w_859,h_573,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/9ed84f_13b4b421a55348c98dd437ede2c5e3a9~mv2.jpg" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('Tlacoyos del pueblo')">
                                                            <p>Tlacoyos del pueblo</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://static.wixstatic.com/media/9ed84f_428132ef3a2244128180643e8f8d9aee~mv2.jpg/v1/fill/w_859,h_573,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/9ed84f_428132ef3a2244128180643e8f8d9aee~mv2.jpg" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('Gusanos de maguey')">
                                                            <p>Gusanos de maguey</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://static.wixstatic.com/media/9ed84f_216bdba65ed342f0a593529adfe1b308~mv2.jpg/v1/fill/w_898,h_599,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/9ed84f_216bdba65ed342f0a593529adfe1b308~mv2.jpg" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('Chicatanas')">
                                                            <p>Chicatanas</p>
                                                        </div>
                                                    </div>
                                                    <hr>     
                                                    <br>    
                                                    <!-- Aquí puedes agregar tus opciones -->
                                                    <h3 class="title">Comidas/Cenas</h3>
                                                    <div class="grid-container">
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://static.wixstatic.com/media/9ed84f_5b82c5527d6b475e92273f002493a6be~mv2.jpg/v1/fill/w_859,h_573,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/9ed84f_5b82c5527d6b475e92273f002493a6be~mv2.jpg" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('Aguachile de hongos')">
                                                            <p>Aguachile de hongos</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://static.wixstatic.com/media/9ed84f_3b9fe4637e9749d384ca802406a0b6be~mv2.jpg/v1/fill/w_764,h_573,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/9ed84f_3b9fe4637e9749d384ca802406a0b6be~mv2.jpg" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('Ensalada de chorizo veggie')">
                                                            <p>Ensalada de chorizo veggie</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://static.wixstatic.com/media/9ed84f_c8daea2e88e344358d65bc2572d40c68~mv2.jpg/v1/fill/w_859,h_573,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/9ed84f_c8daea2e88e344358d65bc2572d40c68~mv2.jpg" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('Cocktail de hongos')">
                                                            <p>Cocktail de hongos</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://static.wixstatic.com/media/9ed84f_0f0dd142b79d46b7af82fe7fdab84271~mv2.jpg/v1/fill/w_859,h_573,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/9ed84f_0f0dd142b79d46b7af82fe7fdab84271~mv2.jpg" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('Carpaccio de Betabel')">
                                                            <p>Carpaccio de Betabel</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://static.wixstatic.com/media/9ed84f_5dcf6cd19d724688b9d89fe94cc4abfd~mv2.jpg/v1/fill/w_764,h_573,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/9ed84f_5dcf6cd19d724688b9d89fe94cc4abfd~mv2.jpg" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('Tacos al pastor veggie')">
                                                            <p>Tacos al pastor veggie</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://static.wixstatic.com/media/9ed84f_7992b7410fe6446abe98a6377ec27c54~mv2.jpg/v1/fill/w_764,h_573,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/9ed84f_7992b7410fe6446abe98a6377ec27c54~mv2.jpg" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('Tacos de pescado al pastor')">
                                                            <p>Tacos de pescado al pastor</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://static.wixstatic.com/media/9ed84f_a9ea19751461418281166859932a20b8~mv2.jpg/v1/fill/w_764,h_573,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/9ed84f_a9ea19751461418281166859932a20b8~mv2.jpg" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('Hot dog al pastor')">
                                                            <p>Hot dog al pastor</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://static.wixstatic.com/media/9ed84f_f376c1a28c9a4c0ab36ccf474b5a544c~mv2.jpg/v1/fill/w_730,h_548,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/9ed84f_f376c1a28c9a4c0ab36ccf474b5a544c~mv2.jpg" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('Hamburguesa porto')">
                                                            <p>Hamburguesa porto</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://static.wixstatic.com/media/9ed84f_3fcd1132475e4eeba0171de0037b53a6~mv2.jpg/v1/fill/w_859,h_573,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/9ed84f_3fcd1132475e4eeba0171de0037b53a6~mv2.jpg" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('Albóndigas veggie con Linguini en salsa poblana')">
                                                            <p>Albóndigas veggie con Linguini en salsa poblana</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://static.wixstatic.com/media/9ed84f_5e58dd49968245a8879a985c04e46c6f~mv2.jpg/v1/fill/w_954,h_573,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/9ed84f_5e58dd49968245a8879a985c04e46c6f~mv2.jpg" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('Cecina Atlixquense')">
                                                            <p>Cecina Atlixquense</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://static.wixstatic.com/media/9ed84f_34d2c4f3f7d14a5988d2e2856649ab2b~mv2.jpg/v1/fill/w_859,h_573,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/9ed84f_34d2c4f3f7d14a5988d2e2856649ab2b~mv2.jpg" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('Volcán de chocolate Oaxaqueño')">
                                                            <p>Volcán de chocolate Oaxaqueño</p>
                                                        </div>
                                                        <div class="grid-item">
                                                            <img src="">
                                                            <p></p>
                                                        </div>
                                                    </div>
                                                    <hr>     
                                                    <br>
                                                    <!-- Aquí puedes agregar tus opciones -->
                                                    <h3 class="title">Bebidas</h3>
                                                    <div class="grid-container">
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://static.wixstatic.com/media/9ed84f_2638d7e022d84f20bc91f099d12ac310~mv2.jpg/v1/fill/w_462,h_616,al_c,q_80,usm_0.66_1.00_0.01,enc_auto/9ed84f_2638d7e022d84f20bc91f099d12ac310~mv2.jpg" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('COCKTAIL GIN-TORONJA')">
                                                            <p>COCKTAIL GIN-TORONJA</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://static.wixstatic.com/media/9ed84f_5eef649ee8b6423593b06ab388c0473d~mv2.jpg/v1/fill/w_462,h_616,al_c,q_80,usm_0.66_1.00_0.01,enc_auto/9ed84f_5eef649ee8b6423593b06ab388c0473d~mv2.jpg" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('COCKTAIL GIN-PEPINO')">
                                                            <p>COCKTAIL GIN-PEPINO</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://static.wixstatic.com/media/9ed84f_52cdd0433a3249c594ebce668d288f58~mv2.jpg/v1/fill/w_869,h_579,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/9ed84f_52cdd0433a3249c594ebce668d288f58~mv2.jpg" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('SMOOTHIES')">
                                                            <p>SMOOTHIES</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://static.wixstatic.com/media/9ed84f_df5d27daac6b4798af15575fa7591116~mv2.jpg/v1/fill/w_869,h_579,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/9ed84f_df5d27daac6b4798af15575fa7591116~mv2.jpg" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('SODA ITALIANA MINERAL')">
                                                            <p>SODA ITALIANA MINERAL</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://static.wixstatic.com/media/9ed84f_cd096f6627ca4b67a56edfc32b0edbdd~mv2.jpeg/v1/fill/w_640,h_487,al_c,q_80,enc_auto/9ed84f_cd096f6627ca4b67a56edfc32b0edbdd~mv2.jpeg" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('CERVEZA HERTOG (HOLANDESA)')">
                                                            <p>CERVEZA HERTOG (HOLANDESA)</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://static.wixstatic.com/media/9ed84f_cd096f6627ca4b67a56edfc32b0edbdd~mv2.jpeg/v1/fill/w_640,h_487,al_c,q_80,enc_auto/9ed84f_cd096f6627ca4b67a56edfc32b0edbdd~mv2.jpeg" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('CERVEZA LEFFE')">
                                                            <p>CERVEZA LEFFE</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://static.wixstatic.com/media/9ed84f_cd096f6627ca4b67a56edfc32b0edbdd~mv2.jpeg/v1/fill/w_640,h_487,al_c,q_80,enc_auto/9ed84f_cd096f6627ca4b67a56edfc32b0edbdd~mv2.jpeg" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('CERVEZA ALEMANA')">
                                                            <p>CERVEZA ALEMANA</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://static.wixstatic.com/media/9ed84f_cd096f6627ca4b67a56edfc32b0edbdd~mv2.jpeg/v1/fill/w_640,h_487,al_c,q_80,enc_auto/9ed84f_cd096f6627ca4b67a56edfc32b0edbdd~mv2.jpeg" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('STOUT  C5')">
                                                            <p>STOUT  C5</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://static.wixstatic.com/media/9ed84f_2dc2eb5ea16542d1a95ff0d3dd02d60e~mv2.jpg/v1/fill/w_869,h_579,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/9ed84f_2dc2eb5ea16542d1a95ff0d3dd02d60e~mv2.jpg" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('CERVEZA SAGA')">
                                                            <p>CERVEZA SAGA</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://static.wixstatic.com/media/9ed84f_2dc2eb5ea16542d1a95ff0d3dd02d60e~mv2.jpg/v1/fill/w_869,h_579,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/9ed84f_2dc2eb5ea16542d1a95ff0d3dd02d60e~mv2.jpg" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('CERVEZA OSADIA')">
                                                            <p>CERVEZA OSADIA</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://e7.pngegg.com/pngimages/549/453/png-clipart-distilled-beverage-whiskey-beer-wine-bottle-shop-alcohol-distilled-beverage-logo.png" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('CERVEZA STOUT CASA FLORA')">
                                                            <p>CERVEZA STOUT CASA FLORA</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://e7.pngegg.com/pngimages/549/453/png-clipart-distilled-beverage-whiskey-beer-wine-bottle-shop-alcohol-distilled-beverage-logo.png" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('AGUA MINERAL')">
                                                            <p>AGUA MINERAL</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://e7.pngegg.com/pngimages/549/453/png-clipart-distilled-beverage-whiskey-beer-wine-bottle-shop-alcohol-distilled-beverage-logo.png" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('REFRESCO COCA-COLA 235ML')">
                                                            <p>REFRESCO COCA-COLA 235ML</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://e7.pngegg.com/pngimages/549/453/png-clipart-distilled-beverage-whiskey-beer-wine-bottle-shop-alcohol-distilled-beverage-logo.png" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('REFRESCO COCA-COLA 335ML')">
                                                            <p>REFRESCO COCA-COLA 335ML</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://e7.pngegg.com/pngimages/549/453/png-clipart-distilled-beverage-whiskey-beer-wine-bottle-shop-alcohol-distilled-beverage-logo.png" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('AGUA BONAFONT 235 ML')">
                                                            <p>AGUA BONAFONT 235 ML</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://e7.pngegg.com/pngimages/549/453/png-clipart-distilled-beverage-whiskey-beer-wine-bottle-shop-alcohol-distilled-beverage-logo.png" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('AGUA TONICA')">
                                                            <p>AGUA TONICA</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://e7.pngegg.com/pngimages/549/453/png-clipart-distilled-beverage-whiskey-beer-wine-bottle-shop-alcohol-distilled-beverage-logo.png" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('AGUA DE FRUTAS')">
                                                            <p>AGUA DE FRUTAS</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://e7.pngegg.com/pngimages/549/453/png-clipart-distilled-beverage-whiskey-beer-wine-bottle-shop-alcohol-distilled-beverage-logo.png" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('JUGO VERDE')">
                                                            <p>JUGO VERDE</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://e7.pngegg.com/pngimages/549/453/png-clipart-distilled-beverage-whiskey-beer-wine-bottle-shop-alcohol-distilled-beverage-logo.png" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('MIMOSA')">
                                                            <p>MIMOSA</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://e7.pngegg.com/pngimages/549/453/png-clipart-distilled-beverage-whiskey-beer-wine-bottle-shop-alcohol-distilled-beverage-logo.png" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('MEZCAL SHOT')">
                                                            <p>MEZCAL SHOT</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://e7.pngegg.com/pngimages/549/453/png-clipart-distilled-beverage-whiskey-beer-wine-bottle-shop-alcohol-distilled-beverage-logo.png" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('PROMO C5')">
                                                            <p>PROMO C5</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://e7.pngegg.com/pngimages/549/453/png-clipart-distilled-beverage-whiskey-beer-wine-bottle-shop-alcohol-distilled-beverage-logo.png" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('PROMO LICOR')">
                                                            <p>PROMO LICOR</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://e7.pngegg.com/pngimages/549/453/png-clipart-distilled-beverage-whiskey-beer-wine-bottle-shop-alcohol-distilled-beverage-logo.png" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('TEQUILA MAESTRO DOBEL COPA')">
                                                            <p>TEQUILA MAESTRO DOBEL COPA</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://static.wixstatic.com/media/9ed84f_e54f88537909425392948c422c2132b0~mv2.jpg/v1/fill/w_869,h_579,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/9ed84f_e54f88537909425392948c422c2132b0~mv2.jpg" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('VINO ESPUMOSO TIERRA SUR')">
                                                            <p>VINO ESPUMOSO TIERRA SUR</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://e7.pngegg.com/pngimages/549/453/png-clipart-distilled-beverage-whiskey-beer-wine-bottle-shop-alcohol-distilled-beverage-logo.png" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('JACK DANIELS COPA')">
                                                            <p>JACK DANIELS COPA</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://e7.pngegg.com/pngimages/549/453/png-clipart-distilled-beverage-whiskey-beer-wine-bottle-shop-alcohol-distilled-beverage-logo.png" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('JAGER MEISTER COPA')">
                                                            <p>JAGER MEISTER COPA</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://static.wixstatic.com/media/9ed84f_8ef963e0e60a4dcd9632f87badeb30ba~mv2.jpg/v1/fill/w_869,h_579,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/9ed84f_8ef963e0e60a4dcd9632f87badeb30ba~mv2.jpg" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('CAFÉ DE OLLA')">
                                                            <p>CAFÉ DE OLLA</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://static.wixstatic.com/media/9ed84f_88e2dff336c24fea98091ef589fa7579~mv2.jpg/v1/fill/w_869,h_579,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/9ed84f_88e2dff336c24fea98091ef589fa7579~mv2.jpg" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('CAPUCHINO')">
                                                            <p>CAPUCHINO</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://e7.pngegg.com/pngimages/549/453/png-clipart-distilled-beverage-whiskey-beer-wine-bottle-shop-alcohol-distilled-beverage-logo.png" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('EXPRESO TONIC')">
                                                            <p>EXPRESO TONIC</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://static.wixstatic.com/media/9ed84f_88e2dff336c24fea98091ef589fa7579~mv2.jpg/v1/fill/w_869,h_579,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/9ed84f_88e2dff336c24fea98091ef589fa7579~mv2.jpg" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('CAFÉ AMERICANO')">
                                                            <p>CAFÉ AMERICANO</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://static.wixstatic.com/media/9ed84f_8ef963e0e60a4dcd9632f87badeb30ba~mv2.jpg/v1/fill/w_869,h_579,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/9ed84f_8ef963e0e60a4dcd9632f87badeb30ba~mv2.jpg" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('CAFÉ EXPRESO')">
                                                            <p>CAFÉ EXPRESO</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://e7.pngegg.com/pngimages/549/453/png-clipart-distilled-beverage-whiskey-beer-wine-bottle-shop-alcohol-distilled-beverage-logo.png" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('WHISKY CHIVAS 12 COPA CON MINERAL')">
                                                            <p>WHISKY CHIVAS 12 COPA CON MINERAL</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://e7.pngegg.com/pngimages/549/453/png-clipart-distilled-beverage-whiskey-beer-wine-bottle-shop-alcohol-distilled-beverage-logo.png" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('TEQUILA HORNITOS COPA')">
                                                            <p>TEQUILA HORNITOS COPA</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://e7.pngegg.com/pngimages/549/453/png-clipart-distilled-beverage-whiskey-beer-wine-bottle-shop-alcohol-distilled-beverage-logo.png" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('TE INFUSION')">
                                                            <p>TE INFUSION</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="https://e7.pngegg.com/pngimages/549/453/png-clipart-distilled-beverage-whiskey-beer-wine-bottle-shop-alcohol-distilled-beverage-logo.png" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('PRE VENTURA CAVA SEMI SEC RESERVA')">
                                                            <p>PRE VENTURA CAVA SEMI SEC RESERVA</p>
                                                        </div>
                                                        <div class="grid-item">
                                                        <input id="boton-imagen" type="image" src="" alt="Botón de imagen" 
                                                        onclick="seleccionarOpcion('MIX NUECES')">
                                                            <p>MIX NUECES</p>
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
                                            function seleccionarOpcion(opcion) {
                                                document.querySelector('input[name="opcion"]').value = opcion;
                                                document.querySelector('form').submit();
                                            }
                                        </script>
                                        
                                        <div class="table-responsive mt-3">
                                        <br><br>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                <th>#</th>
                                                <th>Concepto</th>
                                                <th>Cantidad</th>
                                                <th>Precio unitario</th>
                                                <th>Importe</th>
                                                <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            while($row=mysqli_fetch_array($query2)){
                                            ?>
                                            <tr>
                                                <td><?php echo $row['id']?></td>
                                                <td><?php echo $row['nombre']?></td>
                                                <td>2</td>
                                                <td>$100.00</td>
                                                <td>$200.00</td>
                                                <td>
                                                    <form id="eliminar-form" action="procesar_eliminarventa.php" method="post">
                                                    <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                                                    <!--<button id="eliminar-btn" type="button" class="btn btn-sm btn-danger" onclick="confirmar()">Eliminar</button>-->
                                                    <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                                </form>
                                                <script>
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
                                                            cancelButtonColor: 'grey'
                                                        }).then((result) => {
                                                            if (result.isDenied) {
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
                                                                        if (password !== '020799') {
                                                                            Swal.showValidationMessage('La contraseña ingresada es incorrecta');
                                                                        }
                                                                    },
                                                                    allowOutsideClick: () => !Swal.isLoading()
                                                                }).then((result) => {
                                                                    if (result.isConfirmed) {
                                                                        Swal.fire({
                                                                            title: 'Contraseña confirmada',
                                                                            icon: 'success'
                                                                        });
                                                                        // Si el usuario confirma con su contraseña, enviar el formulario
                                                                        document.getElementById('eliminar-form').submit();
                                                                    }
                                                                });
                                                            }
                                                        })
                                                    }
                                                </script>
                                                </td>
                                            </tr>
                                            <!-- Agrega más filas aquí si es necesario -->
                                            <?php 
                                            }
                                            ?>
                                                <td colspan="4" class="text-right font-weight-bold">Total:</td>
                                                <td class="font-weight-bold">$280.00</td>
                                                <td></td>
                                                </tr>
                                                
                                            </tbody>
                                            </table>
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