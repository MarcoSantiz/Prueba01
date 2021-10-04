<?php

//Metodo de encriptación
$method = 'aes-256-cbc';


// Vector de Inicialización  ___ Se genera una diferente con $getIV()

$getIV = function () use ($method) {
    return base64_encode(openssl_random_pseudo_bytes(openssl_cipher_iv_length($method)));
};
 

$valor_iv = $getIV($method);

$iv = base64_decode($valor_iv); // Este IV se alamacena en la bd




//  Encripta el contenido de la variable, enviada como parametro.
 
 $encriptar = function ($valor) use ($method, $clave, $iv) {
     return openssl_encrypt ($valor, $method, $clave, false, $iv);
 };

 
//  Desencripta el texto recibido
 
 $desencriptar = function ($valor) use ($method, $clave, $iv) {
     $encrypted_data = base64_decode($valor);
     return openssl_decrypt($valor, $method, $clave, false, $iv);
 }; 

