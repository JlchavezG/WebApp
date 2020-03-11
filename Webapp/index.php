<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login | ManagerCloud</title>
    <!-- Estilos Css3 -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/fontello.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/pace.css">
  </head>
  <body>
    <div class="container py-5">
         <div class="row">
               <div class="col-md-12">
		               <div class="col-md-12 text-center mb-5">
                         <img src="img/firma.png">
		               </div>
                   <div class="row">
                         <div class="col-md-6 mx-auto">
                              <div class="card rounded-0 rounded" id="login-form">
                                   <div class="card-header">
                                      <h3 class="mb-0 text-center">Login IscjlchavezG</h3>
                                   </div>
                                   <div class="card-body">
                                      <form class="form" name="login" action="includes/login.php" id="formLogin" method="POST" autocomplete="off">
                                      <div class="form-group">
                                        <input type="text" class="form-control form-control-lg rounded-0" name="user" placeholder="Usuario" id="user" required>
                                      </div>
                                      <div class="form-group">
                                        <input type="password" class="form-control form-control-lg rounded-0" name="password" placeholder="Password" id="pwd" required>
                                      </div>
                                      <div class="row">
                                         <div class="col">
                                           <div class="custom-control custom-switch">
                                               <input type="checkbox" class="custom-control-input" id="ver" onclick="verpass(this);">
                                               <label class="custom-control-label" for="ver">Ver Password</label>
                                            </div>
                                         </div>
                                         <div class="col">
                                                <a href="#" class="nav-link" data-toggle="modal" data-target="#registroModal">¿Aun no tines cuenta?</a>
                                         </div>
                                       </div>
                                      <button type="submit" class="btn btn-success btn-lg btn-block" id="btnLogin">Ingresar</button>
                                      </form>
                                 </div>
                            </div>
                    <!-- Termina Login-->
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- inicia ventana modal de registro de usuario -->
    <div class="modal fade" id="registroModal" tabindex="-1" role="dialog" aria-labelledby="registroModalLabel" aria-hidden="true">
       <div class="modal-dialog" role="document">
           <div class="modal-content">
              <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Registro de Usuario</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
                 </button>
              </div>
              <div class="modal-body">
              <form name="Fregistro" action="registro.php" method="POST">
                <div class="form-group">
                   <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre" required>
                </div>
                <div class="form-group">
                   <input type="text" class="form-control" name="apellidop" id="apellidop" placeholder="Apellido Paterno" required>
                </div>
                <div class="form-group">
                   <input type="text" class="form-control" name="apellidom" id="apellidom" placeholder="Apellido Materno" required>
                </div>
                <div class="form-group">
                   <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
                </div>
                <div class="form-group">
                   <select class="form-control" name="carrera" id="carrera" required>
                     <option value="">Selecciona una carrera</option>

                       <option value="">Selecciona carrera</option>
                     
                   </select>
                </div>
                <div class="form-group">
                   <input type="text" class="form-control" name="matricula" id="matricula" placeholder="Matricula" required>
                </div>
                <div class="form-group">
                   <input type="tel" class="form-control" name="telefono" id="telefono" placeholder="Telefono" required>
                </div>
                <div class="form-group">
                   <input type="text" class="form-control" name="usuario" id="usuario" placeholder="Nombre de usuario" required>
                </div>
                <div class="form-group">
                   <input type="password" class="form-control" name="pass" id="pass" placeholder="Password" required>
                </div>
                <div class="form-group">
                   <input type="password" class="form-control" name="cpass" id="cpass" placeholder="Confirma tu password" required>
                </div>
      </div>
      <div class="modal-footer">
           <div class="custom-control custom-switch">
               <input type="checkbox" class="custom-control-input" name="checkbox" id="checkbox" onclick="habilitar();">
               <label for="checkbox" class="custom-control-label" for ="checkbox">Acepto Terminos y condiciones</label>
           </div>
           <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
           <input type="submit" class="btn btn-success" value="Regisrar" name="submit" disabled ="disabled">
      </form>
      </div>
    </div>
  </div>
</div>
  <!-- termina venta modal de registo -->
    <script>
         function verpass(cb) {
             if(cb.checked)
               $('#pwd').attr("type","text");
               else
               $('#pwd').attr("type","password");
         }
         function habilitar(){
           document.Fregistro.submit.disabled = !document.Fregistro.checkbox.checked;
         }
    </script>
    <script src="js/jquery3.4.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/pace.min.js"></script>
  </body>
</html>
