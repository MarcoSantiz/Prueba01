<?php

$config = array(
    "digest_alg" => "sha512",
    "private_key_bits" => 4096,
    "private_key_type" => OPENSSL_KEYTYPE_RSA,
);

 // Crea la llave privada
 $res = openssl_pkey_new($config);

    
 openssl_pkey_export($res, $out);


 // Se crea la llave publica a partir de la llave privada
 $pubKey = openssl_pkey_get_details($res);

 // Se extrae la llave publica unicamente
 $pubKey = $pubKey["key"];


 $data = "hola mundo";

// Encripta data para y lo guarda en $encrypted
openssl_public_encrypt($data, $encrypted, $pubKey);

// Decifra a $encrypted usando la llave privada y la guarda en $decrypted
openssl_private_decrypt($encrypted, $decrypted, $out);

echo $decrypted;
?>