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
            
            <div class="container">
                

                <!-- CONTENIDO PRINCIPAL DE LA PÁGINA -->
                <div class="max-w-75">
                    <div class="container">
                      <h1 style="text-align: center"><b>Introduzca los datos de la mesa a Editar/Actualizar</b></h1>
                      <br>
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

                    //
                    // Recupera el ID de la mesa seleccionada desde el formulario
                    $mesa_id = $_POST['mesa'];

                    // Busca la mesa en la base de datos
                    $sql = "SELECT * FROM mesas WHERE id='$mesa_id'";
                    $resultado = $conn->query($sql);

                    if ($resultado->num_rows == 1) {
                      $fila = $resultado->fetch_assoc();
                      $nombre = $fila["nombre"];
                      $capacidad = $fila["capacidad"];
                      $estado = $fila["estado"];
                      ?>
                      <!-- Muestra un formulario para editar los datos de la mesa -->
                      <form method='POST' action='actualizar_mesas2.php' class='flat-form'>
                      <div class='form-group'>
                        <label for='nombre'>Nombre:</label>
                        <input type='text' class='form-control' name='nombre' id='nombre' value='<?php echo $nombre; ?>' readonly>
                      </div>
                      <div class='form-group'>
                        <label for='capacidad'>Capacidad:</label>
                        <input type='number' class='form-control' name='capacidad' id='capacidad' value='<?php echo $capacidad; ?>' readonly>
                      </div>
                      <div class='form-group'>
                        <label for='estado'>Estado:</label>
                        <input type='text' class='form-control' name='estado' id='estado' value='<?php echo $estado; ?>' readonly>
                      </div>
                      <div class='form-group'>
                        <label for='tipo'>Tipo:</label>
                        <select name='tipo' id='tipo' required onchange="mostrarHabitaciones()">
                            <option value='#'>Seleccione una opción</option>
                            <option value='Comensal Foráneo' <?php echo ($estado == 'Comensal Foráneo') ? 'selected' : ''; ?>>Comensal Foráneo</option>
                            <option value='Habitación' <?php echo ($estado == 'Habitación') ? 'selected' : ''; ?>>Habitación</option>
                        </select>
                      </div>
                    <br>

                    <!-- AQUI COMIENZA LA FUNCIONALIDAD PARA OBTENCION DE HABITACIONES-->

                    <?php
                    /* Database credentials for 'prueba' database */
                    define('DB_SERVER', 'localhost');
                    define('DB_USERNAME', 'root');
                    define('DB_PASSWORD', '');
                    define('DB_NAME', 'prueba');

                    /* Attempt to connect to MySQL database */
                    $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

                    // Check connection
                    if ($link === false) {
                        die("ERROR: Could not connect to 'prueba' database. " . mysqli_connect_error());
                    }

                    // Realizar una consulta SQL para obtener las habitaciones válidas según las descripciones
                    $query = "SELECT DISTINCT habitacion, cliente FROM reservaciones WHERE habitacion IN ('Cuna de moisés', 'Dalia', 'Bugambilia', 'Tulipan', 'Jazmín', 'Violeta', 'Lily', 'Girasol', 'Margarita', 'Nochebuena')";
                    $result = mysqli_query($link, $query);

                    // Inicializar una variable para almacenar las opciones del selector
                    $options = "<option value='#'>Seleccione una opción</option>";

                    // Recorrer los resultados y agregar las habitaciones con el nombre del cliente al selector
                    while ($row = mysqli_fetch_assoc($result)) {
                        $habitacion = $row['habitacion'];
                        $cliente = $row['cliente'];
                        $optionText = "$habitacion - $cliente";
                        $options .= "<option value='$habitacion'>$optionText</option>";
                    }

                    // Cerrar la conexión a la base de datos
                    mysqli_close($link);
                    ?>

                    <div class='form-group'>
                        <label for='habitacion'>Habitación:</label>
                        <select name='habitacion' id='habitacion'>
                        <option value='#'>No aplica</option>
                            <?php echo $options; ?>
                        </select>
                    </div>

                    <div class='form-group'>
                        <label for='comensal'>Comensal:</label>
                        <input type='text' class='form-control' name='comensal' id='comensal' readonly>
                    </div>

                    <script>
                      function mostrarHabitaciones() {
                          var tipoSelector = document.getElementById('tipo');
                          var habitacionSelector = document.getElementById('habitacion');
                          
                          if (tipoSelector.value === 'Habitación') {
                              // Si se selecciona 'Habitación', habilita el segundo selector
                              habitacionSelector.disabled = false;
                          } else {
                              // Si se selecciona otra opción, deshabilita el segundo selector y establece 'No aplica'
                              habitacionSelector.disabled = true;
                              habitacionSelector.value = '#'; // Opción 'No aplica'
                          }
                      }
                      </script>

                      <script>
                          // Obtén una referencia al selector del input "habitacion" y al input "comensal"
                          var habitacionSelector = document.getElementById('habitacion');
                          var comensalInput = document.getElementById('comensal');

                          // Agrega un escuchador de eventos para detectar cambios en el input "habitacion"
                          habitacionSelector.addEventListener('change', function() {
                              // Obtiene el valor seleccionado en el input "habitacion"
                              var selectedOption = habitacionSelector.options[habitacionSelector.selectedIndex];
                              var comensalValue = selectedOption.text.split(' - ')[1]; // Obtiene el nombre del cliente

                              // Actualiza el valor del input "comensal"
                              comensalInput.value = comensalValue;
                          });
                      </script>






                    <!-- AQUI FINALIZA LA FUNCIONALIDAD PARA OBTENCION DE HABITACIONES-->
                    <div class='form-group'>
                        <label for='comentario'>Comentario:</label>
                        <input type='int' class='form-control' name='comentario' id='comentario'>
                    </div>
                      <input type='hidden' name='mesa_id' value='<?php echo $mesa_id; ?>'>
                      <br>
                      <button type='submit' class='btn btn-danger'>Aplicar cambios</button>
                    </form>
                    <?php 
                                        
                    } else {
                      echo "Mesa no encontrada.";
                    }
                    // Cierra la conexión
                    $conn->close();
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