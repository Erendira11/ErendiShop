<?php 
  session_start();

  $varsesion = $_SESSION["id"];
  $user_log = $_SESSION["nombre"];
  $email_user = $_SESSION["email"];

    if($varsesion == null || $varsesion = ''){

      echo 'Usted no tiene autorización';

      header('Location: http://localhost/tiendaerendira/'); 
      

      die();
  
    }
  ?>