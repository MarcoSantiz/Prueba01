<?php
session_start();

$email = $_POST['email'];
$pass = $_POST['pass'];

$enlace = mysqli_connect("localhost", "root", "", "hotel_sureste");

if(!$enlace){
    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
    exit;
}else{


    $consultar = "SELECT * FROM clientes WHERE email = '$email' AND pass = '$pass'";
    $datos_consult = mysqli_query($enlace, $consultar);
    $num_rows = mysqli_num_rows($datos_consult);
    if($num_rows != 0){
        
        foreach($datos_consult as $key){
            $_SESSION['id_usuario'] = $cliente = $key['id_cliente'];
            $_SESSION['usuario'] = $cliente = $key['cliente'];
            $_SESSION['dir'] = $dir = $key['dir'];
            $_SESSION['tel'] = $tel = $key['tel'];
            $_SESSION['email'] = $email = $key['email'];
            $_SESSION['pass'] = $pass = $key['pass'];
        }
        header("Location:../views/datos_cliente.php"); 

    }


    if($num_rows == 0){
        $consultar_admin = "SELECT * FROM administradores WHERE email = '$email' AND pass = '$pass'";
        $datos_consult_admin = mysqli_query($enlace, $consultar_admin);
        if($datos_consult_admin){
            $num_rows_admin = mysqli_num_rows($datos_consult_admin);
            if($num_rows_admin != 0){

                foreach($datos_consult_admin as $key){
                    $_SESSION['id_usuario'] = $cliente = $key['id_administrador'];
                    $_SESSION['usuario'] = $cliente = $key['nombre'];
                    $_SESSION['gerente'] = $cliente = $key['nombre'];
                    $_SESSION['email'] = $dir = $key['email'];
                    $_SESSION['pass'] = $pass = $key['pass'];
                    $_SESSION['tel'] = $tel = $key['tel'];
                    $_SESSION['cargo'] = $pass = $key['cargo'];

                }
            }
        }
        header("Location:../views/administracion.php"); 
    }




}



?>