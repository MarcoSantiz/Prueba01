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
    $method = 'aes-256-cbc';

    if($consulta_ejec){

        $num_rows = mysqli_num_rows($consulta_ejec);

        if($num_rows != 0){

           
            $contador = 0; 
            foreach($consulta_ejec as $key){

                $id_mensaje = $key['id_mensaje'];
                $iv = "";
                $clave = "";


                $consult_claves = "SELECT * FROM claves_aes WHERE id_mensaje = $id_mensaje";
                $ejec_consulta = mysqli_query($enlace, $consult_claves);
                
                if($ejec_consulta){
                    $num_rows_claves = mysqli_num_rows($ejec_consulta); 
                    if($num_rows_claves != 0){
                        foreach($ejec_consulta as $key2){
                            $iv = $key2['iv'];
                            $clave = $key2['clave'];
                        }
                    }
                }


                include("aes.php");

                $mensaje_descifrado = $desencriptar($key['mensaje']);

                $contador += 1;
                $mensajes .= "
                <tr>
                <th scope=\"row\">".$contador."</th>
                <td>".$key['cliente']."</td> 
                <td>".$mensaje_descifrado."</td>
                </tr>";
            }
            
        }else{
            $mensajes = "<h6>No hay mensajes </h6>";
        }
        
    }
    

}


?>