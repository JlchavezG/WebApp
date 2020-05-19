<?php
 session_start();
 include 'includes/conecta.php';
 $usuario = $_SESSION['Usuario'];
 if(!isset($usuario)){
   header("location:index.php");
 }
// consulta para extraer datos de perfil
$q = "SELECT * FROM Usuarios WHERE Nusuario = '".$usuario."'";
$consulta = $conecta->query($q);
$perfil = $consulta->fetch_array();
if($perfil > 0){
  $user = $perfil;
}
$conecta->close();
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/fontello.css">
    <link rel="stylesheet" href="css/pace.css">
    <title>Perfil</title>
  </head>
  <body>
    <!-- incluir barra de navegacion -->
    <?php include 'includes/navbar.php'; ?>
    <!-- ventana modal cerrar sesion -->
    <?php include 'includes/modalcerrar.php';?>
    <!-- termina ventana modal -->
    <!-- inicia apartado de informacion -->
   <div class="container py-5" id="perfil">
     <div class="row">
        <div class="col col-lg-6 col-md-12 col-sm-12">
          <div class="card">
            <div class="card-header">
                 <span class="icon-user-female"></span> Información de perfil
            </div>
            <div class="card-body">
              <h5 class="card-title">Nombre: <?php echo $user['Nombre']; ?></h5>
              <p class="card-text"><span class="icon-envelope-open"></span> Email: <?php echo $user['Email']; ?></p>
              <p class="card-text"><span class="icon-phone"></span> Telefono: <?php echo $user['Telefono']; ?></p>
              <p class="card-text"><span class="icon-book"></span> Carrera: <?php echo $user['Id_Carrera']; ?></p>
              <p class="card-text"><span class="icon-barcode"></span> Matricula: <?php echo $user['Matricula']; ?></p>
              <?php
                  $Tusuario = $user['TUsuario'];
                  if($Tusuario == 1){ $Tusuario = "Cliente";}
                  elseif($Tusuario == 2){ $Tusuario = "Sistemas";}
                  elseif($Tusuario == 3){ $Tusuario = "Administrador";}
                  else{"Invitado de Prueba";}
              ?>
              <p class="card-text">Usuario: <?php echo $Tusuario; ?></p>
            </div>
            <div class="card-footer text-muted"> Esta es tu información de perfil</div>
          </div>
        </div>
        <div class="col col-lg-6 col-md-12 col-sm-12">
          <div class="col-md-6 max-auto d-block">
            <img src="img/<?php echo $user['Img']?>" alt="imagen de perfil" class="rounded-circle">
          </div>
          <div class="m-5 text-center">
            <a href="modificar_perfil.php?Id_Usuario=<?php echo $user['Id_Usuario']; ?>" class="btn btn-success">Modificar</a>
            <a href="#" class="btn btn-info">Historial</a>
            <a href="javascript:imprSelect('perfil')" class="btn btn-secondary">Imprimir</a>
          </div>
        </div>
     </div>
   </div>
  <!-- termina apartado de informacion -->
    <script src="js/jquery3.4.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/pace.min.js"></script>
    <script>
      function imprSelect(perfil){
        var ficha = document.getElementById('perfil');
        var ventana = window.open('','popimpr');
        ventana.document.write(ficha.innerHTML);
        ventana.document.close();
        ventana.print();
        ventana.close();

      }
    </script>
  </body>
</html>
