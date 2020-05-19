<?php
session_start();
include 'includes/config.php';
include 'includes/carrito.php';
// variable de mensaje de accion
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Carrito de Compra</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/fontello.css">
    <link rel="stylesheet" href="css/pace.css">
  </head>
  <body>
    <?php include 'includes/navbar.php'; ?>
    <?php include 'includes/modalcerrar.php';?>
    <br>
    <div class="container">
        <h3><span class="icon-shopping-basket"></span> Bienvenido a tu carrito de compra <?php echo $_SESSION['Usuario']; ?></h3>
        <?php if(!empty($_SESSION['Carrito'])) { ?>
        <table class="table table-responsive-lg table-striped">
              <thead class="thead-dark">
                 <tr>
                    <th scope="col" class="text text-center">Descripción</th>
                    <th scope="col" class="text text-center">Cantidad</th>
                    <th scope="col" class="text text-center">Precio</th>
                    <th scope="col" class="text text-center">Total</th>
                    <th class="text text-center">Acciones</th>
                 </tr>
              </thead>
              <tbody>
                <?php $total = 0; ?>
                <?php foreach($_SESSION['Carrito'] as $indice=>$productos){ ?>
                <tr>
                    <td><?php echo $productos['NOMBRE'];?></td>
                    <td class="text text-center"><?php echo $productos['CANTIDAD'];?></td>
                    <td class="text text-center">MNX <?php echo number_format($productos['PRECIO'],2);?></td>
                    <td class="text text-center"><?php echo number_format($productos['PRECIO']*$productos['CANTIDAD'],2);?></td>
                    <td class="text text-center">
                      <form action="" method="post">
                         <input type="hidden" name="id" value="<?php echo openssl_encrypt($productos['ID'],COD,KEY);?>">
                         <button type="submit" class="btn btn-danger btn-sm" name="btn_carrito" value="Eliminar"><span class="icon-trash"></Span> Eleminar</button>
                         </td>
                    </form>
                </tr>
                <?php $total=$total+($productos['PRECIO']*$productos['CANTIDAD']);?>
                <?php } ?>
                <tr>
                  <td colspan="4" align="right"><h3>Total</h3></td>
                  <td align="right"><h3>MNX <?php echo number_format($total,2);?></h3></td>
                </tr>
              </tbody>
        </table>
        <div class="container">
                    <div class="alert alert-primary" role="alert">
                        Confirmación de compra
                     </div>
                     <form action="confirmar.php" method="post">
                       <div class="form-group py-2">
                          <input type="email" name="email" id="email" class="form-control" placeholder="Email para confirmaciín de pago" required>
                          <small class="text-muted">Por favor coloca el email de contacto para enviar la confirmación de la compra</small>
                          <button type="submit" name="btn_carrito" class="btn btn btn-outline-success btn-lg btn-block" value="Confirmar">Confirmar Pedido</button>
                       </div>
                     </form>
                </div>
      <?php } else { ?>
        <div class="alert alert-warning text-center">
           <span class="icon-cart"></span> Aun no hay productos en el carrito de compra
        </div>
      <?php } ?>
      <?php echo $accion; ?>
     </div>
        <script src="js/jquery3.4.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/pace.min.js"></script>
  </body>
</html>
