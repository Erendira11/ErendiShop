<?php 
  session_start();

  $varsesion = $_SESSION["id"];
  if($varsesion == null || $varsesion = ''){
    echo 'Usted no tiene precioProductoización';
    die();
  }

?>
<!DOCTYPE html>
<html lang="es-MX">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Comprar producto</title>
  <!-- CSS only -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>

<body>
 <!-- Inicio Navbar-->

<!-- Final Navbar-->
  <?php require_once '../../conexion/conexion.php'; ?>
  <div class="container mt-5">
  <?php 
      $id = $_GET['id'];

      $consulta = "SELECT producto.idProducto, producto.nomProducto, producto.precioProducto, producto.cantidadProducto, categoria.nomCategoria, color.nomColor FROM tienda.producto, tienda.color, tienda.categoria where producto.idProducto = '$id' and color.idColor = producto.idColor and producto.idCategoria = categoria.idCategoria";
      $resultado = mysqli_query($mysqli, $consulta);
      $fila = mysqli_fetch_array($resultado);
      ?>
        <div class="row">
        <div class="col-sm-12">
        <!--Inicio formulario--> 
            <form action="actualizar_blog.php" method="POST">

                <div class="form-group">
                    <input type="hidden" name="idProcuto" id="nomCategoria" class="form-control" value="<?php echo $fila["idProcuto"]; ?>">
                </div>

                <h5 class="card-title"><?php echo $fila["nomProducto"]; ?></h5>
                <h6 class="card-subtitle mb-2 text-muted">Precio $ <?php echo $fila["precioProducto"]; ?></h6>
                <h6 class="card-subtitle mb-2 text-muted">Existencias <?php echo $fila["cantidadProducto"]; ?></h6>
                <p class="card-text">Categoria: <?php echo $fila["nomCategoria"]; ?></p>

                    <br>
                 <!--Menu para seleccionar la color-->
                <label for="exampleFormControlSelect1">Elige el color</label>
                <select class="form-control" name="nomColor">
                  <option value="0">Seleccione la categoría:</option>
                  <?php
                    $consulta = "SELECT * FROM color";
                    $resultado = mysqli_query($mysqli, $consulta);
                    while ($valores = mysqli_fetch_array($resultado)) {
                      echo '<option value="'.$valores[idColor].'">'.$valores[nomColor].'</option>';
                    }
                  ?>
                </select>
                <!--Menu para seleccionar la color-->
                    <br>

                <div class="form-group">
                    <label for="cantidadComprar">Cantidad a comprar</label>
                    <input type="number" name="cantidadComprar" id="cantidadComprar" class="form-control" value="">
                </div>   
                <div class="form-group">
                <!--botón verde = success / azul = primary--> 
                    <input type="submit" value="Editar pulicacion" class="btn btn-success">
                </div>
            </form>
            <button type="button" class="btn btn-danger" onclick="window.location.href='index.php'">Cancelar</button>
        </div>
        </div>
    </div>
  <!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>