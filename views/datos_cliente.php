<?php
session_start();

error_reporting(0);

$varsesion = $_SESSION['usuario'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../librerias/bootstrap-5.1.1-dist/css/bootstrap.min.css">
    <script src="../librerias/bootstrap-5.1.1-dist/js/bootstrap.min.js"></script>

    <title>Hotel Sureste</title>
</head>

<body class="">

    <!-- Barra de navegación -->
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">

            <form class="container-fluid justify-content-start">
                <a class="navbar-brand" href="http://localhost/hotel_sureste/">
                    <img src="../imagenes/logo.PNG" alt="" width="200" height="100">
                </a>
                <button class="btn btn-outline-secondary" type="button" onclick="location.href='reservaciones.php'">Reservaciones</button>
                <button class="btn btn-outline-secondary" type="button" disabled>Datos del cliente</button>
                <button class="btn btn-outline-secondary" type="button" onclick="location.href='contacto.php'">Contacto</button>
                <?php 
                
                if($varsesion !== null || $varsesion != ''){
                echo "<button class=\"btn btn-outline-secondary\" type=\"button\" onclick=\"location.href='models/cerrar_sesion.php'\">Cerrar sesión</button>";
                }
                
                ?>

            </form>
        </div>

    </nav>




    <div class="container">
        <!-- Información habitacional -->
        <div class="row">
            <h4 class="text-center">Información habitacional</h4>
            <br><br>
            <div class="col-md-5">
                <table class="table">

                    <tbody>
                        <tr>

                            <td>Fecha de instancia</td>
                            <td id="fecha">28/09/2021</td>

                        </tr>
                        <tr>

                            <td>Tipo de habitación</td>
                            <td id="tipo_habit">Suite</td>

                        </tr>
                        <tr>

                            <td>Personas que se alojan</td>
                            <td id="Personas">5</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <br><br>
        <!-- Información personal -->
        <div class="row">
            <h4 class="text-center">Información personal</h4>
            <br><br>
            <div class="col-md-5">
                <table class="table">

                    <tbody>
                        <tr>

                            <td>Nombre del cliente</td>
                            <td id="nombre"><?php echo $_SESSION['usuario'] ?></td>

                        </tr>
                        <tr>

                            <td>Correo</td>
                            <td id="correo">chuzzgomez18@gmail.com</td>

                        </tr>
                        <tr>

                            <td>Teléfono</td>
                            <td id="telefono">9191178737</td>
                        </tr>
                        <tr>

                            <td>Tarjeta bancaria</td>
                            <td id="tarjeta">*************0421</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col">
                <button type="button" class="btn btn-danger" id="fin_reservacion">Terminar reservación</button>
            </div>
        </div>
        <br>
    </div>


    <!-- Aqui comienza el Footer -->
    <footer class="footer bg-dark">
        <div class="container-fluid">
            <div class="row">
                <div class="col">

                    <h4 class="text-white">HOTEL SURESTE</h4>
                    <ul>
                        <li><a class="text-white" href="#">Cookies</a></li>
                        <li><a class="text-white" href="#">Política de privacidad</a></li>
                        <li><a class="text-white" href="#">Aviso legal</a></li>
                        <li><a class="text-white" href="#">Términos y condiciones</a></li>
                    </ul>

                </div>
                <div class="col">

                    <h4 class="text-white">SIGUENOS EN</h4>
                    <ul>
                        <li><a class="text-white" href="#">Facebook</a></li>
                        <li><a class="text-white" href="#">Instagram</a></li>
                        <li><a class="text-white" href="#">Pinterest</a></li>
                        <li><a class="text-white" href="#">Twitter</a></li>
                        <li><a class="text-white" href="#">WhatsApp</a></li>
                    </ul>
                </div>
                <div class="col">
                    <ul>
                        <br>
                        <li>
                            <p class="text-white">Hotel Sureste. © 2021</p>
                        </li>
                        <li><a class="text-white" href="#">www.HotelSureste.com</a></li><br>
                        <li>
                            <p class="text-white">Desarrollado por Equipo 5, 7A IDyGS </p>
                        </li>
                    </ul>
                </div>

                <div class="col">
                    <ul><br>
                        <li>
                            <h5 class="text-white">Gracias por su estancia. ¡Vuelva pronto!</h5>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

</body>
<link rel="stylesheet" href="../librerias/estilos/estilos.css">

</html>