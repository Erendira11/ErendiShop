<?php

session_start();

$varsesion = $_SESSION["id"];
$user_log = $_SESSION["nombre"];

if($varsesion == null || $varsesion = ''){
  echo 'Usted no tiene autorización';
  die();
}


    require_once '../../conexion/conexion.php';

    print_r($_POST);

    $id = $_POST['id_usr'];
    $nombre = $_POST['nombre'];
    $apPaterno = $_POST['apPaterno'];
    $apMaterno = $_POST['apMaterno'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $password = $_POST['password'];
    
    $consulta = "UPDATE usuario SET nomUsr = '$nombre',apPaternoUsr = '$apPaterno',apMaternoUsr = '$apMaterno', telUsr='$telefono', emailUsr='$correo', contrasenaUsr='$password', fechaCreacionUsr = now() WHERE idUsr = '$id'";
    mysqli_query($mysqli, $consulta);
    header("Location: index.php");
?>