<?php
session_start();

$email = $_POST['email'];
$pass = $_POST['pass'];

$_SESSION['usuario'] = $email;
$_SESSION['pass'] = $pass;

header("Location:../views/datos_cliente.php"); 

?>