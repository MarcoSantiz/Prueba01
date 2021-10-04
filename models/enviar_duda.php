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
    
    
    // Se crea un token como clave para cifrar y descifrar
    $clave = bin2hex(random_bytes(64));

    
    $method = 'aes-256-cbc';

    // Vector de Inicialización  ___ Se genera una diferente con $getIV()

    $getIV = function () use ($method) {
        return base64_encode(openssl_random_pseudo_bytes(openssl_cipher_iv_length($method)));
    };

    $iv = $getIV($method); //Este IV se alamacena en la bd

    include("aes.php");

    $info_encriptado =  $encriptar($duda);
    



    $insert = "INSERT INTO mensajes (cliente, tel, email, mensaje) VALUES ('$cliente', '$tel', '$email','$info_encriptado')";

    $datos_insert = mysqli_query($enlace, $insert);
    
    $id_mensaje = 0;

    if($datos_insert){

        $consulta_id = "SELECT LAST_INSERT_ID()";
        $id_consult = mysqli_query($enlace, $consulta_id);

        foreach ($id_consult as $key){
            $id_mensaje = $key['LAST_INSERT_ID()'];
        }
        $insert_claves = "INSERT INTO claves_aes (id_mensaje, iv, clave) VALUES ($id_mensaje, '$iv', '$clave')";
        $clave_insert = mysqli_query($enlace, $insert_claves);

        if($clave_insert){
            header("Location:../views/contacto.php");
        }
    }

}


?>