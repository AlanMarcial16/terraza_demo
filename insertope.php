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
                <div class="row"> 
                            <div>
                            <div style="text-align: right;">
                            <script>
                                    var options2 = {
                                        weekday: 'long',
                                        year: 'numeric',
                                        month: 'long',
                                        day: 'numeric'
                                    };

                                    var date = new Date().toLocaleDateString('es-ES', options2);
                                    var formattedDate = date.replace(/^\w/, (c) => c.toUpperCase());
                                    var styledDate = "<strong>" + formattedDate + "</strong>";
                                    
                                    document.write(styledDate);
                                </script>
                            </div>
                            <h1 style="text-align: center;"><b>Caja Chica</b></h1>
                            <div style="text-align: right;">
                                <a href="cajaint.php">
                                    <button class="btn info">Ver panel</button>
                                </a>
                            </div>
                            <br>
                            <form action="insertaop.php" method="POST" style="max-width:500px;margin:auto">
                                    <h1 class="h1">Ingrese la siguiente información</h1>
                                    <hr>
                                    <p>Tipo</p>
                                    <select class="form-control mb-3" id="tipodeoperacion" name="tipodeoperacion" placeholder="Introduzca el tipo de operación" onchange="" required>
                                        <option value="" selected>Selecciona una opcion</option>
                                        <option value="Entrada">Entrada</option>
                                        <option value="Salida">Salida</option>
                                    </select>
                                    <p>Descripción</p>
                                    <input type="int" class="form-control mb-3" name="descripcion" placeholder="Introduzca la descripción de la operación" required>
                                    <!--<p>Cantidad</p>
                                    <input type="int" class="form-control mb-3" name="cantidad" id="cantidad" placeholder="Introduzca la cantidad" onkeypress="return event.charCode>=48 && event.charCode<=57" required>
                                    <hr>
                                    <h4>Datos del comprobante</h4>
                                    <br>-->
                                    <p>Tipo de comprobante</p>
                                    <select class="form-control mb-3" name="tipocomprobante" placeholder="Introduzca el tipo de operación" required>
                                        <option value="Ticket">Ticket</option>
                                        <option value="Voucher">Voucher</option>
                                        <option value="Recibo">Recibo</option>
                                    </select>
                                    <!--<p>Código del comprobante</p>
                                    <input type="int" class="form-control mb-3" name="codigo" placeholder="Introduzca el código del comprobante" required>-->                         
                                    <p>Introduzca el importe</p>
                                    
                                    <input type="int" class="form-control mb-3" id="importesalida" name="importesalida" placeholder="Importe Salida" >
                                    <input type="int" class="form-control mb-3" id="importeentrada" name="importeentrada" placeholder="Importe Entrada" >
                                    <hr>
                                    <!--<script>
                                    function test(){
                                        $.ajax({url:"obtotal.php", success:function(result){
                                        $("th").text(result);}
                                    })
                                    } 
                                    </script>-->
                                    <input type="submit" class="registerbtn">
                            </form>
                            <script>
                                let opciones  = document.getElementById("tipodeoperacion")
                                let caja1 = document.getElementById("importeentrada")
                                let caja2 = document.getElementById("importesalida")
                                
                                opciones.addEventListener("change", () => {
                                    let eleccion = opciones.options[opciones.selectedIndex].text
                                    
                                    if(eleccion === "Salida") {
                                    caja1.style.display = "none"
                                    } else {
                                    caja1.style.display = "inline"
                                    }

                                    if(eleccion === "Entrada") {
                                    caja2.style.display = "none"
                                    } else {
                                    caja2.style.display = "inline"
                                    }

                                })
                            </script>
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