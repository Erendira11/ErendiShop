<?php 
  session_start();

  $varsesion = $_SESSION["id"];
  if($varsesion == null || $varsesion = ''){
    echo 'Usted no tiene autorización';
    die();
  }

?>
<?php 
 require_once '../../conexion/conexion.php';
 $id = $_GET['id'];
 $consulta = "DELETE FROM usuario WHERE idUsr = $id ";
 //$consulta = "UPDATE usuarios SET status_usr = 0, actualizado = now(), actualizadopor = '$user_log' WHERE id_usr = '$id'";
 mysqli_query($mysqli,$consulta);
 header("Location: ../../index.html");
?>