<?php
session_start();

// error_reporting(0);

$var_cliente = $_SESSION['usuario'];
$var_admin = $_SESSION['gerente'];


if($var_cliente == null || $var_cliente == ''){
    header("Location:login.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../librerias/bootstrap-5.1.1-dist/css/bootstrap.min.css">
    <script src="../librerias/bootstrap-5.1.1-dist/js/bootstrap.min.js"></script>
    <script src="../librerias/jquery-3.6.0.min.js"></script>
    <script src="../controllers/control.js"></script>
    

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
                if($var_admin !== null || $var_admin != ''){
                    echo "<button class=\"btn btn-outline-secondary\" type=\"button\" onclick=\"location.href='administracion.php'\">Mensajes</button>";
                }
                if($var_cliente !== null || $var_cliente != ''){
                echo "<button class=\"btn btn-outline-secondary\" type=\"button\" onclick=\"location.href='../models/cerrar_sesion.php'\">Cerrar sesión</button>";
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
                <!-- Aqui se incrusta las tablas dinamicamente -->
                <?php

                include '../models/consultar_datos.php';
                echo $dato_habit;
                ?>
            </div>
        </div>

        <br><br>
        <!-- Información personal -->
        <div class="row">
            <h4 class="text-center">Información personal</h4>
            <br><br>
            <div class="col-md-5">
                <!-- Aqui se incrusta una tabla -->
                <?php

                echo $dato_person;

                ?>
            </div>
        </div>
        <br>
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