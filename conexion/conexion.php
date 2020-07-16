<?php
    $usuario = "erendira";
    $password = "erendira1996";
    $database = "tienda";
    $server = "localhost";
    $mysqli = mysqli_connect($server, $usuario, $password, $database);
     if(mysqli_connect_errno($mysqli)){
        echo "no me pude conectar ".mysqli_connect_error();
     }else{
       // echo "Yey! si me pude conectar";
     }
?>