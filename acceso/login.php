<?php
require_once '../conexion/conexion.php';
print_r($_POST);
$email = $_POST['email'];
$password = $_POST['password'];
//se reciben las variables del archivo index
$consulta = "SELECT * FROM usuario WHERE emailUsr = '$email'";
      $resultado = mysqli_query($mysqli, $consulta);
      $fila= mysqli_fetch_array($resultado);
      $respuesta = '';
      if(sizeof($fila) > 0){
          if($fila["contrasenaUsr"] == $password){
              session_start();
              $_SESSION["id"] = $fila["idUsr"];
              $_SESSION["nombre"] = $fila["nomUsr"];
              $_SESSION["email"] = $fila["emailUsr"];
              $_SESSION["status"] = $fila["estatusUsr"];
              $respuesta = 1;
          }else{
            $respuesta = "La contraseña no coincide";
          }
        }else{
            $respuesta = "Usuario no encontrado";  
      }
      
      if($respuesta==1){
        header('Location: ../modulos/usuario/index.php');
      }else{
        header('Location: ../index.html'); 
      }

?>