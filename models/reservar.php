<?php

// Dato habitacional
$fecha      = $_POST['fecha'];
$habitacion = $_POST['habitacion'];
$numero     = $_POST['num_habitacion'];
$personas   = $_POST['personas'];
// Dato personal

$cliente    = $_POST['cliente'];
$dir        = $_POST['dir'];
$tel        = $_POST['tel'];
$email      = $_POST['email'];
$pass       = $_POST['pass'];
// Dato bancario
$tarjeta     = $_POST['tarjeta'];
$fecha_vence = $_POST['fecha_vence'];
$codigo      = $_POST['codigo'];
$postal      = $_POST['postal'];



$enlace = mysqli_connect("localhost", "root", "", "hotel_sureste");

if(!$enlace){
    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
    exit;
}else{
    
    $config = array(
        "digest_alg" => "sha512",
        "private_key_bits" => 4096,
        "private_key_type" => OPENSSL_KEYTYPE_RSA,
    );


    // Crea la llave privada
    $res = openssl_pkey_new($config);

    
    openssl_pkey_export($res, $out);

    $archivo = fopen('llave_privada.txt','a+');
    fputs($archivo, $out); 
    fclose($archivo); 



    // Se crea la llave publica a partir de la llave privada
    $pubKey = openssl_pkey_get_details($res);

    // Se extrae la llave publica unicamente
    $pubKey = $pubKey["key"];


    // Encripta el numero de la tarjeta, la fecha de vencimiento y el código
    openssl_public_encrypt($tarjeta, $tarjeta_encript, $pubKey);
    openssl_public_encrypt($fecha_vence, $fecha_encript, $pubKey);
    openssl_public_encrypt($codigo, $codigo_encript, $pubKey);


    $tarjeta_encript = base64_encode($tarjeta_encript);
    $fecha_encript = base64_encode($fecha_encript);
    $codigo_encript = base64_encode($codigo_encript);


    $ObjectName = new DateTime($fecha);
    $date = $ObjectName->format("Y-m-d");
    
     
    
    // Encontrar id de habitación
    $actualizar = "UPDATE habitaciones SET disponible=0 WHERE tipo = '$numero'";
    $datos = mysqli_query($enlace, $actualizar);
    
    if($datos){

       

        $consultar_habit = "SELECT id_habitacion FROM habitaciones WHERE tipo = '$numero'";
        $datos_consult = mysqli_query($enlace, $consultar_habit);
        
        foreach($datos_consult as $key){
            $numero = $key['id_habitacion'];
        }
        if($numero != null){
            

            $insert = "INSERT INTO clientes (cliente, dir, tel, email, pass, fecha_estancia, id_habitacion, personas) VALUES ('$cliente', '$dir', '$tel', '$email', $pass, '$date', $numero , $personas)";

            $datos_insert = mysqli_query($enlace, $insert);

            if($datos_insert){

                $consultar_id = "SELECT MAX(id_cliente) FROM clientes WHERE cliente = '$cliente'";
                $dato_id = mysqli_query($enlace, $consultar_id);
                
                $id_cliente = 0;

                foreach($dato_id as $key){
                    $id_cliente = $key['MAX(id_cliente)'];
                }


                $insert_clave = "INSERT INTO claves_rsa (id_cliente, public) VALUES ($id_cliente, '$pubKey') ";
                $clave_insert = mysqli_query($enlace, $insert_clave);
                if($clave_insert){


                    $insert_tarjet = "INSERT INTO tarjetas (id_cliente,  num_tarjeta, fecha, codigo, postal) VALUE ($id_cliente, '$tarjeta_encript' ,'$fecha_encript', '$codigo_encript', $postal)";

                    $datos_tarjet = mysqli_query($enlace, $insert_tarjet);
                    if($datos_tarjet){
                    
                        $enlace = "llave_privada.txt"; 
                        header ("Content-Disposition: attachment; filename=".$enlace); 
                        header ("Content-Type: application/octet-stream"); 
                        header ("Content-Length: ".filesize($enlace)); 
                        readfile($enlace);
                        

                    }


                }





                

            }
        }
        
        
    }
    
    
}
?>