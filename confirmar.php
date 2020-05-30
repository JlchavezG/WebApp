<?php
   // sesion de usuario iniciada
   session_start();
   // incluir
   include 'includes/conecta.php';
   include 'includes/config.php';
   // incluimos el archivo carrito php
   include 'includes/carrito.php';
   $usuario = $_SESSION['Usuario'];
   if (!isset($usuario)) {
     header("location:index.php");
   }
   // cerrar conexion
   $conecta->close();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/fontello.css">
    <link rel="stylesheet" href="css/pace.css">
    <title>Confirmar Pago</title>
  </head>
  <body>
    <!-- iniciamos la barra de navegacion -->
    <?php include 'includes/navbar.php'; ?>
    <!-- termina la barra de navegación -->
    <!-- alerta de coneccion -->
     <?php  echo $mensaje;?>
    <!-- termina alerta de conexion -->
    <!-- ventana modal cerrar sesion -->
    <?php include 'includes/modalcerrar.php';?>
    <!-- termina ventana modal -->
    <?php
        if ($_POST) {
            $total=0;
            $UserId = session_id();
            $fecha = date('Y-m-d');
            $fechaF = date('d-m-Y');
            $Correo = $_POST['email'];
            $estatus ="Pendiente";
            foreach ($_SESSION['Carrito'] as $indice=>$productos) {
              $total = $total+($productos['PRECIO']*$productos['CANTIDAD']);
            }
        }
     ?>
     <?php if(!empty($_SESSION['Carrito'])) { ?>
     <div class="container">
        <div class="text text-center">
               <h4>Gracias por tu Compra: <?php echo $usuario; ?></h4>
        </div>
        <ul class="list-group">
              <li class="list-group-item active">Datos de tu Compra</li>
              <li class="list-group-item"><span class="icon-key"></span> Key de Compra: <?php echo $UserId; ?></li>
              <li class="list-group-item"><span class="icon-user"></span> Usuario: <?php echo $usuario; ?></li>
              <li class="list-group-item"><span class="icon-calendar-empty"></span> Fecha: <?php echo $fechaF; ?></li>
              <li class="list-group-item"><span class="icon-bell-1"></span> Email de Notificación: <?php echo $Correo; ?></li>
              <li class="list-group-item"><span class="icon-pencil-neg"></span> Estatus: <?php echo $estatus; ?></li>
              <li class="list-group-item"><?php echo "<h3> Total: ".number_format($total,2)." MNX</h3>";?></li>
          </ul>
          <div class="row">
                <div class="col">
                    <small class="text text-muted">Verifica que tus datos de compra sea correctos y dale click en terminar compra</small>
                </div>
                <div class="col">
                       <form name="compra" class="form-group" action="terminarpago.php" method="post">
                         <input type="hidden" name="key" value="<?php echo $UserId; ?>">
                         <input type="hidden" name="usuario" value="<?php echo $usuario; ?>">
                         <input type="hidden" name="fecha" value="<?php echo $fecha; ?>">
                         <input type="hidden" name="correo" value="<?php echo $Correo; ?>">
                         <input type="hidden" name="estatus" value="<?php echo $estatus; ?>">
                         <input type="hidden" name="total" value="<?php echo $total; ?>">
                         <input type="submit" name="Ccompra" value="Terminar compra" class="btn  btn-sm btn-block btn-success">
                       </form>
                </div>
         </div>
   <?php } else { ?>
    <div class="container py-3">
     <div class="alert alert-danger text-center">
        <span class="icon-cart"></span> Aun no confirmas ninguna compra
     </div>
     </div>
   <?php } ?>
    <script src="js/jquery3.4.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/pace.min.js"></script>
  </body>
</html>
