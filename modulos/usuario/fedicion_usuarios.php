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
    <?php 
      $id = $_GET['id'];
      $consulta = "SELECT * FROM usuario WHERE idUsr = $id";
      $resultado = mysqli_query($mysqli, $consulta);
      $fila = mysqli_fetch_array($resultado);
      ?>
    <div class="container mt-5">
        <div class="row">
        <div class="col-sm-12">
        <!--Inicio formulario--> 
            <form action="actualizar_usuarios.php" method="POST">

                <div class="form-group">
                    <input type="hidden" name="id_usr" id="nombre" class="form-control" value="<?php echo $fila["idUsr"]; ?>">
                </div>
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Ingresa tu nombre" value="<?php echo $fila["nomUsr"]; ?>">
                </div>

                <div class="form-group">
                    <label for="nombre">Apellido Paterno</label>
                    <input type="text" name="apPaterno" id="apPaterno" class="form-control" placeholder="Ingresa tu apellido paterno" value="<?php echo $fila["apPaternoUsr"]; ?>">
                </div>

                <div class="form-group">
                    <label for="nombre">Apellido Materno</label>
                    <input type="text" name="apMaterno" id="apPaterno" class="form-control" placeholder="Ingresa tu apellido materno" value="<?php echo $fila["apMaternoUsr"]; ?>">
                </div>

                <div class="form-group">
                    <label for="telefono">Teléfono</label>
                    <input type="tel" name="telefono" id="telefono" class="form-control" placeholder="Ingresa tu teléfono" value="<?php echo $fila["telUsr"]; ?>">
                </div>

                <div class="form-group">
                    <label for="correo">Correo electrónico</label>
                    <input type="email" name="correo" id="correo" class="form-control" placeholder="Ingresa tu correo" value="<?php echo $fila["emailUsr"]; ?>">
                </div>

                <div class="form-group">
                    <label for="password">Contraseña</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Ingresa tu contraseña" value="<?php echo $fila["contrasenaUsr"]; ?>">
                </div>

                <div class="form-group">
                <!--botón verde = success / azul = primary--> 
                    <input type="submit" value="Registra a tu usuario" class="btn btn-success">
                </div>
            </form>
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