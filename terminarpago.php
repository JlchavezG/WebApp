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
   if (isset($_POST['Ccompra'])) {
    // generar la clave aleatoria
    $caracteres ="123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz-.#!";
    for ($i=0; $i < 10 ; $i++) {
      $token = substr(str_shuffle($caracteres),0,10);
    }
    // recuperar datos para insertar la venta
    $llave = $conecta->real_escape_string($_POST['key']);
    $fecha = $conecta->real_escape_string($_POST['fecha']);
    $cliente = $conecta->real_escape_string($_POST['usuario']);
    $email = $conecta->real_escape_string($_POST['correo']);
    $total = $conecta->real_escape_string($_POST['total']);
    $estadoC = $conecta->real_escape_string($_POST['estatus']);
    // verificar que el id de pago no se repita
    $Pagonuevo = "SELECT * FROM Ventas WHERE Token = '$token'";
    $nuevo = $conecta->query($Pagonuevo);
    if ($nuevo ->num_rows > 0) {
      $alerta.="<div class='alert alert-danger alert-dismissible fade show' role='alert'>
        <strong>Ya existe registro de la compra</strong> El Id de compra ya se encuentra en la base de datos de la aplicación verificala por Favor.
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
        </div>";
    }
    // insertar en bd la veta 
    else {
    $registro = "INSERT INTO Ventas(ClaveVenta,Token,Fecha,Usuario,Correo,Total,Estatus)VALUES('$llave','$token','$fecha','$cliente','$email','$total','$estadoC')";
    $inserta = $conecta->query($registro);
    $alerta.="<div class='alert alert-success alert-dismissible fade show' role='alert'>
      <strong>Compra Exitosa</strong> Ya puedes descargar tu comprobante de compra.
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
      </button>
    </div>";
    unset($_SESSION['Carrito']);
   }
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
    <title>Terminar Compra</title>
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
      <?php echo $alerta; ?>
    </div>
    <script src="js/jquery3.4.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/pace.min.js"></script>
  </body>
</html>
