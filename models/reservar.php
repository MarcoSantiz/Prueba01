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


                $insert_tarjet = "INSERT INTO tarjetas (id_cliente,  num_tarjeta, fecha, codigo, postal) VALUE ($id_cliente, '$tarjeta' ,'$fecha_vence', $codigo, $postal)";

                $datos_tarjet = mysqli_query($enlace, $insert_tarjet);
                if($datos_tarjet){
                
                    header("Location:../views/reservaciones.php");

                }

            }
        }
        
        
    }
    
    
}
?>