<?php 
  session_start();

  $varsesion = $_SESSION["id"];
  if($varsesion == null || $varsesion = ''){
    echo 'Usted no tiene autorización';
    die();
  }

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
  <?php require_once '../../conexion/conexion.php'; ?>
  <div class="table-reponsive">
    <table class="table table-stripped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Apellido paterno</th>
        <th>Apellido Materno</th>
        <th>Teléfono</th>
        <th>Correo Electrónico</th>
        <th>Password</th>
        <th>Estatus</th>
      </tr>
    </thead>
    <tbody>
      <?php 
      $id = $_GET['id'];
      $consulta = "SELECT * FROM usuario WHERE idUsr = $id";
      $resultado = mysqli_query($mysqli, $consulta);
      $fila = mysqli_fetch_array($resultado);
      ?>
      <tr>
        <td><?php echo $fila["idUsr"]; ?></td>
        <td><?php echo $fila["nomUsr"]; ?></td>
        <td><?php echo $fila["apPaternoUsr"]; ?></td>
        <td><?php echo $fila["apMaternoUsr"]; ?></td>
        <td><?php echo $fila["telUsr"]; ?></td>
        <td><?php echo $fila["emailUsr"]; ?></td>
        <td><?php echo $fila["contrasenaUsr"]; ?></td>
        <td><?php 

        if($fila["estatusUsr"] == 1):
            echo 'Activo';
        else:
            echo 'Inactivo';
        endif ;
        ?></td>

        <td><a href="index.php">Regresar a la tabla principal</a></td>
      </tr>
    </tbody>
    </table>
  </div>
  <!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>