<?php
 session_start();
 include 'includes/conecta.php';
 $usuario = $_SESSION['Usuario'];
 if(!isset($usuario)){
   header("location:index.php");
 }
 // consulta para extraer los datos de el perfil
 $q= "SELECT * FROM Usuarios WHERE Nusuario = '".$usuario."'";
 $consulta = $conecta->query($q);
 $perfil = $consulta->fetch_array();
 if($perfil > 0){
   $user = $perfil;
 }
 // extraer los datos de el perfil a mostrar
 $id = $_GET['Id_Usuario'];
 $m = "SELECT * FROM Usuarios WHERE Id_Usuario = '$id'";
 $modificar = $conecta->query($m);
 $row = $modificar->fetch_array(MYSQLI_ASSOC);
 // consulta para modificar perfil en la base de datos
 if (isset($_POST['submit'])) {
  $id = $_POST['id'];
  $nombre = $conecta->real_escape_string($_POST['nombre']);
  $apellido1 = $conecta->real_escape_string($_POST['ApellidoP']);
  $apellido2 = $conecta->real_escape_string($_POST['ApellidoM']);
  $email = $conecta->real_escape_string($_POST['email']);
  $carrera = $conecta->real_escape_string($_POST['carrera']);
  $matricula = $conecta->real_escape_string($_POST['matricula']);
  $telefono = $conecta->real_escape_string($_POST['telefono']);
  $nuser = $conecta->real_escape_string($_POST['user']);
  $pass =md5($_POST['pass']);
  // sentencia o consulta de modificar
  $sql = "UPDATE Usuarios SET Nombre = '$nombre', ApallidoP = '$apellido1', ApellidoM = '$apellido2', Email= '$email', Id_Carrera = '$carrera', Matricula = '$matricula', Telefono = '$telefono', Nusuario = '$nuser', Password = '$pass' WHERE Id_Usuario = '$id'";
  $resultado = $conecta->query($sql);
   header("location:Perfil.php");
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
    <link rel="stylesheet" href="css/form.css">
    <title>Modificar Perfil de Usuario</title>
  </head>
  <body>
    <!-- incluir barra de navegacion -->
    <?php include 'includes/navbar.php'; ?>
    <!-- ventana modal cerrar sesion -->
    <?php include 'includes/modalcerrar.php';?>
  <!-- termina ventana modal -->
  <!-- inicia mi formulario de modificar -->
  <div class="container py-5 col-lg-10 col-md-10 col-sm-10">
    <div class="row">
      <div class="card">
         <div class="card-header">
            Modificar Usuario
         </div>
         <div class="card-bordy">
            <form  action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
              <div class="form-row">
                <input type="hidden" name="id" value="<?php echo $row['Id_Usuario'];?>">
                <div class="form-group col-md-4">
                  <label for="Nombre">Nombre</label>
                  <input type="text" name="nombre" class="form-control" value="<?php echo $row['Nombre'];?>" required>
                </div>
                <div class="form-group col-md-4">
                  <label for="ApellidoP">Apellido Paterno</label>
                  <input type="text" name="ApellidoP" class="form-control" value="<?php echo $row['ApallidoP'];?>" required>
                </div>
                <div class="form-group col-md-4">
                  <label for="ApellidoM">Apellido Materno</label>
                  <input type="text" name="ApellidoM" class="form-control" value="<?php echo $row['ApellidoM'];?>">
                </div>
                <div class="form-group col-md-4">
                  <label for="email">Email</label>
                  <input type="email" name="email" class="form-control" value="<?php echo $row['Email'];?>">
                </div>
                <div class="form-group col-md-4">
                  <label for="Carrera">Carrera</label>
                  <input type="text" name="carrera" class="form-control" value="<?php echo $row['Id_Carrera'];?>">
                </div>
                <div class="form-group col-md-4">
                  <label for="matricula">Matricula</label>
                  <input type="text" name="matricula" class="form-control" value="<?php echo $row['Matricula'];?>">
                </div>
                <div class="form-group col-md-4">
                  <label for="Telefono">Telefono</label>
                  <input type="tel" name="telefono" class="form-control" value="<?php echo $row['Telefono'];?>">
                </div>
                <div class="form-group col-md-4">
                  <label for="Usuario">Usuario</label>
                  <input type="text" name="user" class="form-control" value="<?php echo $row['Nusuario'];?>">
                </div>
                <div class="form-group col-md-4">
                  <label for="Pass">Password</label>
                  <input type="password" name="pass" class="form-control" value="<?php echo $row['Password'];?>">
                  <span class="icon-eye"></span>
                </div>
                  <input type="submit" name="submit" value="Modificar" class="btn btn-success btn-lg btn-block">
              </div>
            </form>
         </div>
          <div class="card-footer">Usuario: <?php echo $row['Id_Usuario'];?></div>
      </div>
    </div>

  </div>
  <script src="js/jquery3.4.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/pace.min.js"></script>
  </body>
</html>
