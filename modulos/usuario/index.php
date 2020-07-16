<?php 
  include "../sesion/sesion.php"
  ?>


<!DOCTYPE html>
<html lang="es-MX">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gestión de usuarios</title>
  <!-- CSS only -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
  <!-- Inicio Navbar para Cerrar sesión -->
    
  <?php include '../elementos/navbar.html'; ?>
<!-- Final Navbar-->
<!--Para establecer la conexión-->
<?php require '../../conexion/conexion.php'; 

?>
<!-- :) --->
<div class="container mt-5">
    <div class="row">
    <div class="col-sm-12">
  <div class="table-reponsive">
    <table class="table table-stripped">
    <thead>
      <tr>
        <th>Nombre</th>
        <th>Correo electrónico</th>
        <th>Teléfono</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>

      <?php 
      
      session_start();

        $varsesion = $_SESSION["id"];
        $user_log = $_SESSION["nombre"];
        $email_user = $_SESSION["email"];

      //Consulta a la base de datos donde mostramos todo lo que está dentro de la tabla usuarios
      $consulta = "SELECT * FROM usuario where idUsr = '$varsesion'";
      //Mandamos la consulta a la db mysql
      $resultado = mysqli_query($mysqli, $consulta);
      //Mientras hayan datos en la tabla usuario, seguira mostrando para abajo todos los registros
      while($fila = mysqli_fetch_array($resultado)){
      ?>
      <tr>
        <td><?php echo $fila["nomUsr"]; ?></td>
        <td><?php echo $fila["emailUsr"]; ?></td>
        <td><?php echo $fila["telUsr"]; ?></td>
        <td>
          <a href="detalle_usuarios.php?id=<?php echo $fila['idUsr']; ?>">Detalle</a>
          <a href="fedicion_usuarios.php?id=<?php echo $fila['idUsr']; ?>">Editar</a>
          <br>
          <a href="eliminar_usuarios.php?id=<?php echo $fila['idUsr']; ?>">Eliminar Cuenta</a>
      </td>
      </tr>
      <?php }  ?>
    </tbody>
    </table>
  </div>
  </div>
  </div>
  </div>
  <!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>