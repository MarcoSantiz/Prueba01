<?php

session_start();
error_reporting(0);

$var_cliente = $_SESSION['usuario'];
$var_dir     = $_SESSION['dir'];
$var_tel     = $_SESSION['tel'];
$var_email   = $_SESSION['email'];
$var_pass   = $_SESSION['pass'];
$var_admin = $_SESSION['gerente'];


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
                <button class="btn btn-outline-secondary" type="button" disabled>Reservaciones</button>
                <button class="btn btn-outline-secondary" type="button" onclick="location.href='datos_cliente.php'">Datos del cliente</button>
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
        <form method="POST" action="http://localhost/hotel_sureste/models/reservar.php">
            <br>
            <div class="row">
                <!-- Dato habitacional -->
                <h4 class="text-center">Dato habitacional</h4>
                <br><br>
                <div class="col-md-2">
                    <div class="form-group">
                        <label>Fecha de instancia</label>
                        <input type="date" name="fecha" class="form-control" min="2021-09-29" max="2021-10-29" required>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <div class="input-group mb-3">

                            <label>Tipo de habitación</label>
                            <select class="form-select" name="habitacion" id="tipo_habit" onchange="cambio_habit()" required>
                                <option selected>Selecciona</option>
                                <option value="Suite">Suite</option>
                                <option value="Cuarto doble">Cuarto doble</option>
                                <option value="Cuarto sencillo">Cuarto sencillo</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        
                        <label id="label_habit">Numero de...</label>  
                        <select class="form-select" name="num_habitacion" id="num_habitacion" required>
                        
                        </select>
                        
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        
                        <label>Personas que se alojaran</label>
                        <input type="number" name="personas" class="form-control" min="1" max="6" required>
                    </div>
                </div>

            </div>
            <br><br>
            <!-- Datos personales -->
            <h4 class="text-center">Datos personales</h4>
            <br><br>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Nombre del cliente</label>
                        <?php
                         if($var_cliente != null | $var_cliente != ''){
                            echo "<input type=\"text\" name=\"cliente\" class=\"form-control\" placeholder=\"Nombre completo\" value=\"$var_cliente\" required>";

                         }else{
                            echo "<input type=\"text\" name=\"cliente\" class=\"form-control\" placeholder=\"Nombre completo\" required>";
                         }
                        
                        ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Dirección</label>
                        <?php
                        
                        if($var_dir != null | $var_dir != ''){
                            echo "<input type=\"text\" name=\"dir\" class=\"form-control\" placeholder=\"Ciudad, colonia y calle\" value=\"$var_dir\" required>";
                            
                         }else{
                            echo "<input type=\"text\" name=\"dir\" class=\"form-control\" placeholder=\"Ciudad, colonia y calle\" required>";
                         }
                        

                        ?>
                    </div>
                </div>
            </div>
            <br><br>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Telefono</label>
                        <?php
                         if($var_tel != null | $var_tel != ''){
                            echo "<input type=\"text\" name=\"tel\" class=\"form-control\" placeholder=\"10 digitos\" value=\"$var_tel\" required>";

                         }else{
                            echo "<input type=\"text\" name=\"tel\" class=\"form-control\" placeholder=\"10 digitos\" required>";

                         }

                        ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Correo electronico</label>
                        <?php
                         if($var_email != null | $var_email != ''){
                            echo "<input type=\"email\" name=\"email\" class=\"form-control\" placeholder=\"ejemplo@gmail.com\"  value=\"$var_email\" required>";
                         }else{
                            echo "<input type=\"email\" name=\"email\" class=\"form-control\" placeholder=\"ejemplo@gmail.com\" required>";
                            
                         }

                        ?>
                    </div>
                </div>
                <div class="col-md-3">
                    <label>Contraseña de acceso</label>
                    <div class="input-group"> 
                        
                        <?php
                        
                        if($var_pass != null | $var_pass != ''){
                            echo "<input type=\"password\" name=\"pass\" class=\"form-control\" id=\"input_pass\" value=\"$var_pass\">";
                        }else{
                            echo "<input type=\"password\" name=\"pass\" class=\"form-control\" id=\"input_pass\">";
                            
                        }
                        ?>
                        <button class="btn btn-outline-secondary" type="button" id="btn_show" onclick=" show_pass()" >Ver</button>

                        
                    </div>

                </div>
            </div>

            <br><br>
            <!-- Método de págo -->
            <h4 class="text-center">Método de págo</h4>
            <h6 class="text-center">Tarjeta de crédito o débito</h6>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Número de tarjeta</label>
                        <input type="text" name="tarjeta" class="form-control" placeholder="16 digitos" required>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label>Fecha de vencimiento</label>
                        <input type="text" name="fecha_vence" class="form-control" placeholder="MM/AA" required>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label>Código de seguridad</label>
                        <input type="number" name="codigo" class="form-control" placeholder="123" required>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label>Código postal</label>
                        <input type="number" name="postal" class="form-control" placeholder="29950" required>
                    </div>
                </div>
            </div>
            <br><br>

            <!-- Boton de hacer reservación -->
            <div class="row">
                <div class="col">
                    <input type="submit" value="Hacer reservación" class="btn btn-success" id="btn_reservacion">
                </div>
            </div>
        </form>
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