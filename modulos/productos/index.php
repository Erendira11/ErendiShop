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
  <title>Tienda</title>
  <!-- CSS only -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
    <!-- Inicio Navbar para Cerrar sesión -->
    <?php include '../elementos/navbar.html'; ?>
<!-- Final Navbar-->
<?php require_once '../../conexion/conexion.php'; ?>
<div class="row row-cols-1 row-cols-md-3">
    <?php 
      $consulta = "SELECT producto.idProducto, producto.nomProducto, producto.precioProducto, producto.cantidadProducto, categoria.nomCategoria, color.nomColor 
      FROM tienda.producto, tienda.color, tienda.categoria where producto.estatusProducto = 1 and color.idColor = producto.idColor and producto.idCategoria = categoria.idCategoria";
      $resultado = mysqli_query($mysqli, $consulta);
      while($fila = mysqli_fetch_array($resultado)){
    ?>
  <div class="col mb-4">
    <div class="card" style="width: 18rem;">
    <div class="card-body">
        <h5 class="card-title"><?php echo $fila["nomProducto"]; ?></h5>
        <h6 class="card-subtitle mb-2 text-muted">Precio $ <?php echo $fila["precioProducto"]; ?></h6>
        <h6 class="card-subtitle mb-2 text-muted">Existencias <?php echo $fila["cantidadProducto"]; ?></h6>
        <p class="card-text">Categoria: <?php echo $fila["nomCategoria"]; ?></p>
        <p class="card-text">Color <?php echo $fila["nomColor"]; ?></p>
        <a href="comprar.php?id=<?php echo $fila['idProducto']; ?>" class="card-link">Comprar</a>
    </div>
    </div>
  </div>
  <?php }  ?> 

<!--</div>

  <div class="table-reponsive">
    <table class="table table-stripped">
    <thead>
      <tr>
        <th>Nombre del producto</th>
        <th>Precio</th>
        <th>Existencias</th>
        <th>Categoria</th>
        <th>Color</th>
      </tr>
    </thead>

    <tbody>
     <?php 
      //$consulta = "SELECT producto.idProducto, producto.nomProducto, producto.precioProducto, producto.cantidadProducto, categoria.nomCategoria, color.nomColor 
      //FROM tienda.producto, tienda.color, tienda.categoria where producto.estatusProducto = 1 and color.idColor = producto.idColor and producto.idCategoria = categoria.idCategoria";
      //$resultado = mysqli_query($mysqli, $consulta);
      //while($fila = mysqli_fetch_array($resultado)){
      ?>
      <tr>
        <td></td>
        <td><?php echo $fila["precioProducto"]; ?></td>
        <td><?php echo $fila["cantidadProducto"]; ?></td>
        <td><?php echo $fila["nomCategoria"]; ?></td>
        <td><?php echo $fila["nomColor"]; ?></td>
        <td><a href="detalle_blog.php?id=<?php echo $fila['id_blog']; ?>">Detalle</a></td>
        <td><a href="eliminar_blog.php?id=<?php echo $fila['id_blog']; ?>">Eliminar</a></td>
        <td><a href="edicion_blog.php?id=<?php echo $fila['id_blog']; ?>">Editar</a></td>

      </tr>
      <?php //}  ?>
    </tbody>
    </table>
  </div>
   JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>