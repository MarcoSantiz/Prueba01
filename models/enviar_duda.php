<?php

$cliente    = $_POST['cliente'];
$tel        = $_POST['tel'];
$email      = $_POST['email'];
$duda       = $_POST['duda'];


$enlace = mysqli_connect("localhost", "root", "", "hotel_sureste");

if(!$enlace){
    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
    exit;
}else{
    
    $insert = "INSERT INTO mensajes (cliente, tel, email, mensaje) VALUES ('$cliente', '$tel', '$email','$duda')";

    $datos_insert = mysqli_query($enlace, $insert);
    if($datos_insert){
       header("Location:../views/contacto.php");
    }

}


?>