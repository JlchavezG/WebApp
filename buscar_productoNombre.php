<?php
// validar la sesion para restringir el acceso
session_start();
include 'includes/conecta.php';
include 'includes/config.php';
// incluimos el archivo carrito php
include 'includes/carrito.php';
$usuario = $_SESSION['Usuario'];
if(!isset($usuario)){
   header("location:index.php");
}
// consulta para la busqueda de los prorductos
$where = " ";
if(!empty($_POST)){
  $valor = $_POST['valor'];
   if(!empty($valor)){
      $where = "WHERE Nombre LIKE '%$valor%'";
   }
}
// consulta para extrar datos de producto
$query = "SELECT * FROM Productos $where ORDER BY Nombre";
$resultado = $conecta->query($query);
$numero = $resultado->num_rows;
// cerrar base de datos
$conecta->close();
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/fontello.css">
    <link rel="stylesheet" href="css/pace.css">
    <link rel="stylesheet" href="css/form.css">
    <title>Busqueda de productos</title>
  </head>
  <body>
  <!-- incluir barra de navegacion -->
  <?php include 'includes/navbar.php'; ?>
    <!-- alerta de coneccion -->
  <?php  echo $mensaje;?>
    <!-- termina alerta de conexion -->
    <!-- ventana modal cerrar sesion -->
    <?php include 'includes/modalcerrar.php';?>
    <div class="modal fade" id="ModalCenter" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalCenterTitle">Cerrar Sesión</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <div class="modal-body">¿Deceas cerrar tu sesion actual? <?php echo $_SESSION['Usuario'];?></div>
           <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                 <a href="includes/csession.php" class="btn btn-danger"><span class="icon-off"> Cerrar Sesión</span></a>
           </div>
        </div>
    </div>
    </div>
  <!-- termina ventana modal -->
  <!-- inicia nuestra seccion de busqueda -->
      <div class="container">
        <?php echo $accion; ?>
        <?php if($alerta!= ""){ ?>
        <div class="alert alert-success">
          <!-- cambiamos la variable de alerta contenida en carrito.php -->
          <?php echo $alerta; ?>
           <a href="carrito.php" class="badge badge-success"><span class="icon-basket-3"></span> Ver Carrito</a>
        </div>
        <?php } ?>
        <div class="card">
           <div class="card-body col-lg-12 col-md-12 col-sm-12">
              <div class="col-md-12">
                  <p>Buscar producto</p>
                   <!-- formulario para busqueda -->
                       <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
                           <div class="form-row">
                                <div>
                                     <input type="text" name="valor" id="valor" placeholder="Nombre de producto">
                                     <input type="submit" name="buscar" value="Buscar" class="btn btn-success">
                                </div>
                           </div>
                       </form>
                   <!-- termina formulario para busqueda -->
              </div>
           </div>
        </div>
      </div><br>
      <div class="container container-fluid">
        <div class="card">
           <div class="card-body">
             <!-- comienza la tabla para mostrar productos -->
                 <table class="table table-striped table-hover border border-dark">
                   <thead>
                        <tr class="thead-dark">
                           <th scope="col">Nombre</th>
                           <th scope="col">Descripción</th>
                           <th scope="col">Precio</th>
                           <th scope="col">Imagen</th>
                           <th scope="col">Acciones</th>
                        </tr>
                   </thead>
                   <tbody>
                        <?php while($row = $resultado->fetch_assoc()) { ?>
                     <tr>
                          <td><?php echo $row['Nombre']; ?></td>
                          <td><?php echo $row['Descripcion']; ?></td>
                          <td>MXN <?php echo number_format($row['Precio'],2); ?></td>
                          <td><img src="img/<?php echo $row['Imagen']; ?>" class="imgcatalogo"></td>
                          <td><form name="piezas" action="" method="post">
                            <input type="hidden" name="id" value="<?php echo openssl_encrypt($row['Id_Producto'],COD,KEY)?>">
                            <input type="hidden" name="nombre" value="<?php echo openssl_encrypt($row['Nombre'],COD,KEY)?>">
                            <input type="hidden" name="precio" value="<?php echo openssl_encrypt($row['Precio'],COD,KEY)?>">
                            <input type="hidden" name="numero" value="<?php echo openssl_encrypt(1,COD,KEY)?>">
                            <div align="right">
                                <button type="submit" name="btn_carrito" value="Agregar" class="btn btn-success btn-sm"><span class="icon-basket"></span> Agregar al carrito</button>
                            </div></td>
                          </form>
                     </tr>
                   <?php } ?>
                   </tbody>
                 </table>
             <!-- termina la tabla para mostrar productos -->
           </div>
        </div>
      </div>
  <!-- termina nuestra seccion de busqueda -->
    <script src="js/jquery3.4.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/pace.min.js"></script>
  </body>
</html>
