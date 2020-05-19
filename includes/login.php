<?php
       session_start();
       include '../includes/conecta.php';
       $usuario = $_POST['user'];
       $password = md5($_POST['password']);
       // consulta para ingresar al sistema y determinar la variable de session
       $q = "SELECT * FROM Usuarios WHERE Nusuario = '$usuario' and Password = '$password'";
       if ($resultado = $conecta->query($q)) {
         while ($row = $resultado->fetch_array()) {
           $userok = $row['Nusuario'];
           $passwordok = $row['Password'];
         }
           $resultado->close();
         }
         $conecta->close();
           if (isset($usuario) && isset($password)) {
            if ($usuario == $userok && $password == $passwordok) {
                $_SESSION['loguin']= TRUE;
                $_SESSION['Usuario'] = $usuario;
                header("location:../catalogo.php");}
                else {
               header("location:../index.php");
              }
                } else {
      header("location:../index.php");
    }
    
 ?>
