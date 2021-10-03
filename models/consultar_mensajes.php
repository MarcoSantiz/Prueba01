<?php

session_start();


$var_admin = $_SESSION['gerente'];

if($var_admin == null || $var_admin == ''){
    header("Location:login.php");
}



$enlace = mysqli_connect("localhost", "root", "", "hotel_sureste");

if(!$enlace){
    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
    exit;

}else{

    $consulta = "SELECT * FROM mensajes";
    $consulta_ejec= mysqli_query($enlace, $consulta);
    $mensajes = "";
    if($consulta_ejec){

        $num_rows = mysqli_num_rows($consulta_ejec);
        if($num_rows != 0){
           
            $contador = 0; 
            foreach($consulta_ejec as $key){
                
                $contador += 1;
                $mensajes .= "
                <tr>
                <th scope=\"row\">".$contador."</th>
                <td>".$key['cliente']."</td> 
                <td>".$key['mensaje']."</td>
                <td><button type=\"button\" class=\"btn btn-success\">Ver</button></td>
                </tr>";
            }
            
        }else{
            $mensajes = "<h6>No hay mensajes </h6>";
        }
        
    }
    

}


?>