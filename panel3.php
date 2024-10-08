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

    $sql="SELECT *  FROM mesas, users";
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
            
            <div class="container">
                <div class="sidebar">
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
                        <li><a href="nuevaorden.php">Nueva Orden</a></li>
                        <li><a href="#">Órdenes pendientes</a></li>
                        <li><a href="#">Opción 3</a></li>
                        <li><a href="#">Opción 4</a></li>
                        <a href="logout.php" onclick="salir()">Cerrar sesión<i class="fas fa-share"></i></a>
                        <script>
                        function salir() {
                        alert("¿Está seguro de que desea salir?");
                        }
                        </script>
                    </ul>
                </div>


                <!-- CONTENIDO PRINCIPAL DE LA PÁGINA -->
                <div class="max-w-75">
                    <!-- aquí puedes agregar el contenido que quieras, por ejemplo: -->
                    <table>
                        <?php
                        $counter = 1;
                        while($row=mysqli_fetch_array($query)){
                            if($counter % 4 == 1){
                                // Abrir nueva hilera
                                        echo '<tr>';
                                    }
                                ?>
                            <td>
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $row['nombre']?></h5>
                                        <p class="card-text">Estado: <?php echo $row['estado']?></p>
                                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#myModal2_<?php echo $row['id'] ?>" data-nombre-mesa="<?php echo $row['nombre']?>">Info</a>
                                        <!--Modal de informacion mesa-->
                                        <div class="modal fade" id="myModal2_<?php echo $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modal-formulario-titulo" aria-hidden="true">
                                            <div class="modal-dialog" role="document" style="max-width: 80%;">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h2 class="modal-title" id="gestionMesasModalLabel"><b><?php echo $row['nombre']?></b></h2>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>   
                                                </div>
                                                <br>
                                                <div class="modal-body">
                                                    <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="selector1">Tipo:</label>
                                                            <select class="form-control" name="selector1" id="selector1">
                                                                <option value="">Seleccione una opción</option>
                                                                <option value="comensal">Comensal</option>
                                                                <option value="habitación">Habitación</option>
                                                            </select>
                                                            </div>

                                                            <div class="form-group" id="select2_container" style="display:none;">
                                                            <label for="selector2">Opción:</label>
                                                            <select class="form-control" name="selector2" id="selector2">
                                                                <option value="">Seleccione una opción</option>
                                                                <option value="CunadeMoises">Cuna de Moises</option>
                                                                <option value="Dalia">Dalia</option>
                                                                <option value="Bugambilia">Bugambilia</option>
                                                                <option value="Tulipan">Tulipan</option>
                                                                <option value="Jazmín">Jazmín</option>
                                                                <option value="Violeta">Violeta</option>
                                                                <option value="Lily">Lily</option>
                                                                <option value="Girasol">Girasol</option>
                                                                <option value="Margarita">Margarita</option>
                                                                <option value="NocheBuena">Noche Buena</option>
                                                            </select>
                                                        </div>

                                                        <script>
                                                        var select1 = document.getElementById("selector1");
                                                        var select2_container = document.getElementById("select2_container");

                                                        select1.addEventListener("change", function() {
                                                            if (select1.value === "habitación") {
                                                            select2_container.style.display = "block";
                                                            } else {
                                                            select2_container.style.display = "none";
                                                            }
                                                        });
                                                        </script>
                                                        <button class="btn btn-primary">Cliente frecuente</button>
                                                    </div>
                                                           
                                                    <div class="col-md-6">
                                                        <p>Empleado: <?php echo $row['username']?></p>
                                                        <button onclick="addRow()" class="btn success"><i class="fa1 fa fa-plus"></i>Agregar</button>
                                                    </div>
                                                     
                                                    <table class="table">
                                                    <thead>
                                                        <tr>
                                                        <th>Cantidad</th>
                                                        <th>Concepto</th>
                                                        <th>Importe</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="table-body">
                                                        <tr>
                                                        <td><input type="text" class="form-control" name="col1[]" /></td>
                                                        <td><input type="text" class="form-control" name="col2[]" /></td>
                                                        <td><input type="text" class="form-control" name="col3[]" /></td>
                                                        </tr>
                                                    </tbody>
                                                    </table>
                                                    <button class="btn btn-danger">Finalizar orden</button>
                                                    <script>
                                                    function addRow() {
                                                    var tableBody = document.getElementById("table-body");
                                                    var newRow = document.createElement("tr");
                                                    newRow.innerHTML = `
                                                        <td><input type="text" class="form-control" name="col1[]" /></td>
                                                        <td><input type="text" class="form-control" name="col2[]" /></td>
                                                        <td><input type="text" class="form-control" name="col3[]" /></td>
                                                    `;
                                                    tableBody.appendChild(newRow);
                                                    }
                                                    </script>


                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                            </div>
                                        <script>
                                            $(document).ready(function() {
                                            $('a[data-toggle="modal"]').on('click', function() {
                                                var nombreMesa = $(this).data('nombre-mesa');
                                                var modalId = $(this).data('target');
                                                $(modalId + ' .modal-title').html('<b>' + nombreMesa + '</b>');
                                            });
                                            });
                                        </script>
                                        <br><br>
                                        <a onclick="eliminar()" class="btn btn-danger">Eliminar</a>
                                        <script>
                                        function eliminar() {
                                            Swal.fire({
                                            title: '¿Estás seguro?',
                                            text: 'Esta acción no se puede deshacer',
                                            icon: 'warning',
                                            showCancelButton: true,
                                            confirmButtonColor: '#3085d6',
                                            cancelButtonColor: '#d33',
                                            confirmButtonText: 'Sí, eliminarlo',
                                            cancelButtonText: 'Cancelar'
                                            }).then((result) => {
                                            if (result.isConfirmed) {
                                                // Si el usuario hizo clic en el botón "Sí", ejecutar la acción
                                                // que deseas confirmar.
                                                Swal.fire({
                                                title: 'Mesa eliminada',
                                                icon: 'success'
                                                });
                                                window.location.href = '/pruebar_demo/eliminar_tarjeta.php?id=<?php echo $row['id'] ?>'
                                            } else {
                                                // Si el usuario hizo clic en el botón "Cancelar" o en cualquier otra
                                                // parte del modal, no hacer nada.
                                                console.log('Acción cancelada');
                                            }
                                            });
                                        }
                                        </script>
                                    </div>
                                </div>
                            </td>
                        <?php 
                            if($counter % 4 == 0){
                                // Cerrar hilera actual
                                echo '</tr>';
                            }
                            $counter++;
                        }
                        if($counter % 4 != 1){
                            // Cerrar última hilera si no está completa
                            echo '</tr>';
                        }
                        ?>
                    </table>
                </div>
            </div>

            
    </body>
    <!--Fin de la página-->
    <br><br>
    <footer class="footer">
            <p>Ocaso Terraza Atlixco, Todos los derechos reservados &copy; 2023</p>
    </footer>
</html>