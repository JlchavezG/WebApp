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

    // Generar codigo Qr
    require 'phpqrcode/qrlib.php';
    //declaramos la carpeta a contener los codigos
    $dir = 'qr/';
    // validar si existe la carpeta d elo contrario crearla
    if (!file_exists($dir))
      mkdir($dir);
    //ruta y nombre del archivo a generar
    $filename = $dir.$token;
    //Parametros de Condiguración
	  $tamaño = 10; //Tamaño de Pixel
	  $level = 'M'; //Precisión Media
	  $framSize = 3; //Tamaño en blanco
	  $contenido =('llave de compra: '.$llave.' Fecha: '.$fecha.'Cliente:'.$cliente.' Email: '.$email.'Total de compra: '.$total. 'Estatus: '.$estadoC) ; //Texto
	  //Enviamos los parametros a la Función para generar código QR
  	QRcode::png($contenido, $filename, $level, $tamaño, $framSize);
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
 else {
 header("location:catalogo.php");
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
    <div class="container">
         <div class="row">
              <div class="col">
                <div class="card">
                      <h5 class="card-header"> <span class="icon-qrcode"></span> Codigo QR de la Compra</h5>
                      <div class="card-body">
                               <?php echo '<img src="'.$filename.'">';?>
                      </div>
                </div>
              </div>
              <div class="col">
                <div class="card">
                  <div class="card-header">
                    <h5>Datos de ls compra</h5>
                  </div>
                  <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><b>Codigo de venta:</b> <?php echo $token; ?></li>
                        <li class="list-group-item"><b>Fecha de compra:</b> <?php echo $fecha; ?></li>
                        <li class="list-group-item"><b>Email de confirmación:</b> <?php echo $email; ?></li>
                        <li class="list-group-item"><b>Usuario:</b> <?php echo $cliente; ?></li>
                        <li class="list-group-item"><b>Monto de la Compra:</b> MNX <?php echo number_format($total,2); ?></li>
                    </ul>
                  </div>
                </div><br>
                <div class="card">
                  <div class="card-header">
                    <h5>Opciones</h5>
                  </div>
                  <div class="card-body">
                         <span class="icon-print"></span>
                         <span class="icon-attach"></span>
                         <span class="icon-download"></span>
                  </div>
                </div>
              </div>
        </div>
     </div>
    <script src="js/jquery3.4.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/pace.min.js"></script>
  </body>
</html>
