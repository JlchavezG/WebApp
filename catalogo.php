<?php
   session_start();
   include 'includes/conecta.php';
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
    <title>Inicio del Sistema</title>
  </head>
  <body>
    <!-- iniciamos la barra de navegacion -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark lighten-1 navbar-static-top">
      <a class="navbar-brand" href="#">IscjlchavezG</a>
       <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
         aria-expanded="false" aria-laber="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
       </button>
       <div class="callapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                  <a class="nav-link" href="#"><span class="icon-home"> Inicio</span></a>
                  <span class="sr-only">(current)</span>
              </li>
              <li class="nav-item active">
                  <a class="nav-link" href="#"><span class="icon-attention-circled"> Acerca de</span></a>
              </li>
              <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="icon-coffee"> Productos</span>
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="#"><span class="icon-beer"> Bebidas</span></a>
                      <a class="dropdown-item" href="#"><span class="icon-food"> Comida</span></a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#"><span class="icon-truck"> Más Productos</span></a>
                  </div>
              </li>
              <li class="nav-item active">
                 <a class="nav-link" href="#"><span class="icon-cog"> Soporte Tecnico</span></a>
              </li>
          </ul>
          <ul class="navbar-nav ml-auto nav-flex-icons">
              <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="icon-user-1"></span><?php echo $_SESSION['Usuario'];?>
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                     <a class="dropdown-item" href="#"><span class="icon-gauge"> Perfil</span></a>
                     <a class="dropdown-item" href="#"><span class="icon-wrench"> Configuracion</span></a>
                       <div class="dropdown-divider"></div>
                         <a class="dropdown-item" href="#" data-toggle="modal" data-target="#ModalCenter"><span class="icon-off"> Cerrar Sesion</span></a>
                       </div>
              </li>
              <li class="nav-item active">
                 <a class="nav-link" href="#"><span class="icon-cubes"> Version 1.1</span></a>
              </li>
              <li class="nav-item active">
                 <a class="nav-link" href="#">+<span class="icon-basket"></span></a>
              </li>
              <li class="nav-link" href="#"><span class="icon-facebook"></span></li>
              <li class="nav-link" href="#"><span class="icon-twitter-1"></span></li>
              <li class="nav-link" href="#"><span class="icon-github"></span></li>
          </ul>
       </div>
    </nav>
    <!-- termina la barra de navegación -->
    <!-- alerta de coneccion -->
     <?php  echo $mensaje;?>
    <!-- termina alerta de conexion -->
    <!-- ventana modal cerrar sesion -->
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
<section>
<!-- inicia tarjetas 1 --><br>
<div class="container">
  <div class="row">
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
              <button type="button" name="btn_carrito" class="btn btn-success">Mandar a <span class="icon-basket"></span></button>
            </div>
          </div>
    </div>
  </div>
    <?php } ?>
 </div>
</div>
<!-- termina tarjetas -->
</section>
    <script src="js/jquery3.4.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
