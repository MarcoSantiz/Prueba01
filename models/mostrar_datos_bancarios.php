<?php

$cliente = $_POST['cliente'];
$llave_privada = $_POST['llave_privada'];




$enlace = mysqli_connect("localhost", "root", "", "hotel_sureste");

if(!$enlace){
    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
    exit;
}else{

    
    $consultar_tarj = "SELECT * FROM tarjetas WHERE id_cliente = (SELECT id_cliente FROM clientes WHERE cliente = '$cliente' LIMIT 1) LIMIT 1";
    $datos_consult = mysqli_query($enlace, $consultar_tarj);
    
    $num_tarjeta_encript = "";
    $fecha_vence_encript = "";
    $codigo_encript = "";
    $postal = "";

    foreach($datos_consult as $key){
        $num_tarjeta_encript = $key['num_tarjeta'];
        $fecha_vence_encript = $key['fecha'];
        $codigo_encript = $key['codigo'];
        $postal = $key['postal'];

      
       
    }

    $num_tarjeta_encript = base64_decode($num_tarjeta_encript);
    $fecha_vence_encript = base64_decode($fecha_vence_encript);
    $codigo_encript = base64_decode($codigo_encript);

      // Descifra todos los datos
    openssl_private_decrypt($num_tarjeta_encript, $decrypted_tarjeta, $llave_privada);
    openssl_private_decrypt($fecha_vence_encript, $decrypted_fecha, $llave_privada);
    openssl_private_decrypt($codigo_encript, $decrypted_codigo, $llave_privada);

    $miArray = array("tarjeta"=>$decrypted_tarjeta, "fecha"=>$decrypted_fecha, "codigo"=>$decrypted_codigo, "postal"=>$postal);
    echo json_encode($miArray);

    
    

}

?>