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

$id=$_GET['id'];

$sql="SELECT * FROM ordenMesa5 WHERE id='$id'";
$query=mysqli_query($con,$sql);

$row=mysqli_fetch_array($query);

$sql="SELECT *  FROM ordenMesa5";
    $query=mysqli_query($con,$sql);

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Editar Artículo</title>
    <link rel="shortcut icon" href="https://static.wixstatic.com/media/9ed84f_b72e16d4242e4e97a54c4945ac674912~mv2.png/v1/fill/w_50,h_50,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/9ed84f_b72e16d4242e4e97a54c4945ac674912~mv2.png">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/style.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <!-- Bootstrap Stylesheets -->
	    <link rel="stylesheet" href="css/bootstrap.min.css">
	    <!-- Font Awesome Stylesheets -->
	    <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/responsive.css">
        <link rel="stylesheet" href="css/design.css">
        <link rel="stylesheet" href="css/estilo5.css">
        <link rel="stylesheet" href="css/estilo8.css">
        <link rel="stylesheet" href="css/estilotabla.css">
	    <!-- Template Main Stylesheets -->
	    <link rel="stylesheet" href="css/contact-form.css" type="text/css">	
        <!-- Add icon library -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <style>
            .logo-img {
            max-width: 50px; /* Ajusta el valor según tus necesidades */
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
                    <div class="row"> 
                        <div>
                                <div style="text-align: left;">
                                <a href="info_mesa5.php">
                                    <button class="btn info"><i class="fa1 fa fa-arrow-left"></i></button>
                                </a>
                                </div>
                                <form action="editartm5.php" method="POST" style="max-width:500px;margin:auto">
                                    <h1 style="text-align: center;"><b>Editar artículo</b></h1>
                                    <br>
                                    <hr>
                                    <input type="hidden" name="id" value="<?php echo $row['id']  ?>">
                                    <p>Descripción</p>
                                    <input type="int" class="form-control mb-3" id="nombre" name="nombre" placeholder="Descripción" value="<?php  echo $row['nombre']?>">
                                    <p>Cantidad</p>
                                    <input type="int" class="form-control mb-3" id="cantidad" name="cantidad" placeholder="Cantidad" value="<?php  echo $row['cantidad']?>">
                                    <p>Precio Unitario</p>
                                    <input type="int" class="form-control mb-3" id="preciou" name="preciou" placeholder="Precio Unitario" value="<?php  echo $row['preciou']?>">
                                    <hr>
                                    <br>
                                    <input type="submit" class="registerbtn" value="Aceptar">
                                </form>
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