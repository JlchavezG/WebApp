<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>navbar</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/fontello.css">
    <link rel="stylesheet" href="css/pace.css">
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
                  <a class="nav-link" href="index.php"><span class="icon-home"> Inicio</span></a>
                  <span class="sr-only">(current)</span>
              </li>
              <li class="nav-item active">
                  <a class="nav-link" href="catalogo.php"><span class="icon-tags"> Catalogo</span></a>
              </li>
              <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle nav-link-active" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="icon-search"> Productos</span>
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="catalogo.php"><span class="icon-tag"> Todos los Productos</span></a>
                      <a class="dropdown-item" href="#"><span class="icon-code"> Desarrollo</span></a>
                      <a class="dropdown-item" href="#"><span class="icon-chart-pie"> Ofimatica</span></a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="buscar_productoNombre.php"><span class="icon-search"> Buscar productos</span></a>
                  </div>
              </li>
              <li class="nav-item active">
                 <a class="nav-link" href="#"><span class="icon-cog"> Soporte tecnico</span></a>
              </li>
          </ul>
          <ul class="navbar-nav ml-auto nav-flex-icons">
              <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="icon-user-3"></span>  <?php echo $_SESSION['Usuario'];?><span class="icon-ellipsis-vert">
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown"></span>
                     <a class="dropdown-item" href="perfil.php"><span class="icon-user-3"> Perfil</span></a>
                     <a class="dropdown-item" href="#"><span class="icon-wrench"> Configuracion</span></a>
                       <div class="dropdown-divider"></div>
                         <a class="dropdown-item" href="#" data-toggle="modal" data-target="#ModalCenter"><span class="icon-off"> Cerrar Sesion</span></a>
                       </div>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="carrito.php"><span class="icon-shopping-bag"> Compras </span><span class="badge badge-danger badge-pill"><?php
                    echo(empty($_SESSION['Carrito']))?0:count($_SESSION['Carrito']);

                 ?></span></a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="whatsapp:://send?text=Comparte%20este%20contenido%20en%20whatsapp%20con%20tus%20amigos%20y%20familiares%20https:/grupoda.mx">whatsapp<span class="icon-chat"></span></a>
              </li>
              <li class="nav-item active">
                 <a class="nav-link" href="#"><span class="icon-cubes"> Version 2.3</span></a>
              </li>
          </ul>
       </div>
    </nav>
    <!-- termina la barra de navegación -->
    <script src="js/jquery3.4.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/pace.min.js"></script>
  </body>
</html>
