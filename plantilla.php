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
    <title>Plantilla</title>
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
    <script src="js/jquery3.4.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/pace.min.js"></script>
  </body>
</html>
