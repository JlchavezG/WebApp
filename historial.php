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
   // consulta para el historial
   $historia = "SELECT * FROM Ventas WHERE Usuario = '".$usuario."'";
   $ejecuta = $conecta->query($historia);
   $lineas = $ejecuta->num_rows;
   // consulta para tener el total de compras por usuario
   $query = "SELECT Total FROM Ventas WHERE Usuario = '".$usuario."'";
   $query_run = $conecta->query($query);
   $qty= 0;
   while ($num = $query_run->fetch_assoc()) {
   $qty += $num['Total'];
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
    <title>Historial de Compras de usuario</title>
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
    <div class="container py-4">
       <h2 class="text text-center"><span class="icon-clock"></span>Bienvenido a tu Historial de Compras <?php echo $usuario; ?></h2>
    </div>
    <?php  if($lineas > 0) { ?>
    <div class="container">
      <table class="table table-striped table-hover">
                 <thead>
                     <tr>
                         <th scope="col"><span class="icon-calendar"></span> Fecha</th>
                         <th scope="col"><span class="icon-mail"></span> Email de Notificación</th>
                         <th scope="col">Total</th>
                         <th scope="col">Token de Venta</th>
                         <th scope="col">Estatus</th>
                     </tr>
                 </thead>
                 <tbody>
                   <?php while($historial = $ejecuta->fetch_assoc()){
                     $fechaoriginal = $historial['Fecha'];
                     $fecchaf = date("d-m-Y", strtotime($fechaoriginal));
                      ?>
                      <tr>
                        <td><?php echo $fecchaf; ?></td>
                        <td><?php echo $historial['Correo']; ?></td>
                        <td><?php echo number_format($historial['Total'],2); ?></td>
                        <td><a href="qr/<?php echo $historial['Token'].'.png'; ?>" target="_blank" class="badge badge-pill badge-success"><?php echo $historial['Token']; ?></a></td>
                        <td><?php echo $historial['Estatus']; ?></td>
                      </tr>
                   <?php } ?>
                   <tr>
                       <td colspan="2" align="right">Total de Compras:</td>
                       <td><?php echo number_format($qty,2); ?></td>
                   </tr>
                 </tbody>
      </table>
      <div class="card">
          <div class="card-header">
               Opciones
          </div>
          <div class="card-body">
              <span class="icon-print"></span> Imprimir Historial | <span class="icon-up"></span> Nivel de Usuario:
          </div>
      </div>
    </div>
  <?php } else {?>
  <div class="container">
     <div class="alert alert-danger">
          <p class="text text-center"><span class="icon-calendar"></span> Aun no tienes historial de compras dentro de la aplicación. Puedes realizar tu primera compra <a href="catalogo.php" class="link-item" >Aqui</a></p>
     </div>
  </div>
  <?php } ?>
    <script src="js/jquery3.4.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/pace.min.js"></script>
  </body>
</html>
