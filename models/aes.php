<?php

//Metodo de encriptación
$method = 'aes-256-cbc';


//  Encripta el contenido de la variable, enviada como parametro.
 
 $encriptar = function ($valor) use ($method, $clave, $iv) {
     return openssl_encrypt ($valor, $method, $clave, false, $iv);
 };

 
//  Desencripta el texto recibido
 
 $desencriptar = function ($valor) use ($method, $clave, $iv) {
     $encrypted_data = base64_decode($valor);
     return openssl_decrypt($valor, $method, $clave, false, $iv);
 }; 

