<?php
   session_start();
   include 'includes/conecta.php';
   include 'includes/config.php';
   // incluimos el archivo carrito php
   include 'includes/carrito.php';
   $usuario = $_SESSION['Usuario'];
   if (!isset($usuario)) {
     header("location:index.php");
   }
   // consulta para extraer datos de productos
   $query = "SELECT * FROM Productos ORDER BY Id_Producto";
   $ejecuta = $conecta->query($query);
   $numero = $ejecuta->num_rows;
   $conecta->close();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/fontello.css">
    <link rel="stylesheet" href="css/pace.css">
    <title>Inicio del Sistema</title>
  </head>
  <body>
    <!-- incluir barra de navegacion -->
    <?php include 'includes/navbar.php'; ?>
    <!-- alerta de coneccion -->
     <?php  echo $mensaje;?>
    <!-- termina alerta de conexion -->
    <!-- ventana modal cerrar sesion -->
    <?php include 'includes/modalcerrar.php';?>
    <!-- alerta de agregar producto toas -->
<section>
<!-- inicia tarjetas 1 --><br>
<div class="container">
  <!-- validación para mostrar el mensaje uando no este vacio -->
  <!-- alerta de accion de producto ya seleccionado -->
  <?php echo $accion; ?>
  <?php if($alerta!= ""){ ?>
  <div class="alert alert-success">
    <!-- cambiamos la variable de alerta contenida en carrito.php -->
    <?php echo $alerta; ?>
     <a href="carrito.php" class="badge badge-success"><span class="icon-basket-3"></span> Ver Carrito</a>
  </div>
  <?php } ?>
  <div class="col-lg-12 col-md-12 col-sm-12">
    <h4>Todas las Categorias de Producto:</h4>
  </div>
  <div class="row">
    <!-- ciclo para extrar los productos -->
    <?php while($row = $ejecuta->fetch_assoc()){ ?>
    <div class="card mb-3" style="max-width: 540px;">
       <div class="row no-gutters">
          <div class="col-md-4">
            <img src="img/<?php echo $row['Imagen']; ?>" class="card-img" alt="...">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title"><?php echo $row['Nombre'];?></h5>
              <p class="card-text">Descripcion: <?php echo $row['Descripcion'];?></p>
              <p class="card-text"><small class="text-muted">Precio: <?php echo $row['Precio'];?></small></p>
               <div class="col-lg-12">
                 <!-- colocar el formulario en hidden -->
                 <form name="piezas" action="" method="post">
                   <input type="text" name="id" value="<?php echo openssl_encrypt($row['Id_Producto'],COD,KEY)?>">
                   <input type="text" name="nombre" value="<?php echo openssl_encrypt($row['Nombre'],COD,KEY)?>">
                   <input type="text" name="precio" value="<?php echo openssl_encrypt($row['Precio'],COD,KEY)?>">
                   <input type="text" name="numero" value="<?php echo openssl_encrypt(1,COD,KEY)?>">
                   <div align="right">
                       <button type="submit" name="btn_carrito" value="Agregar" class="btn btn-success"><span class="icon-basket"></span> Agregar al carrito</button>
                   </div>
                 </form>
               </div>
            </div>
          </div>
    </div>
  </div>
    <?php } ?>
    <!-- termina el ciclo para extraer los productos -->
 </div>
</div>
<!-- termina tarjetas -->
</section>
<!-- comienza nustra paginación -->
<?php include 'includes/footer.php'; ?>
<script>
  $(document).ready(function(){
       $('.toast').toast('show')
  });
</script>
    <script src="js/jquery3.4.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/pace.min.js"></script>
  </body>
</html>
