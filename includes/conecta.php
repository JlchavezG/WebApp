<?php
 $mensaje ="";
 $servidor = "localhost";
 $usuario = "root";
 $password = "";
 $bd = "webapp";
 $conecta = mysqli_connect($servidor,$usuario,$password,$bd);
 if ($conecta->connect_error) {
   die('Error al conectar la Base de datos de la WebApp'.$conecta->connect_error);
 }
 else {
   $mensaje.="<div class='alert alert-success alert-dismissible fade show' role='alert'>
          <strong>Genial!</strong> Bienvenido a nuestra aplicación online uem.
          <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
           <span aria-hidden='true'>&times;</span>
          </button>
   </div>";
 }
?>
