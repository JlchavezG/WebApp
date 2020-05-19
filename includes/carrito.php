<?php
  // inicio de sesion para el carrito de compra
  error_reporting(0);
  session_start();
  // mensaje de alerta para el carrito de compra
  $alerta = "";
  if (isset($_POST['btn_carrito'])) {
    switch ($_POST['btn_carrito']) {
      case 'Agregar':
           if(is_numeric(openssl_decrypt($_POST['id'],COD,KEY))){
             $ID = openssl_decrypt($_POST['id'],COD,KEY);
             $alerta.= "Ok ID correcto ".$ID;
           }
           else{
             $alerta.= "Error en el ID".$ID;
           }
           if(is_string(openssl_decrypt($_POST['nombre'],COD,KEY))) {
             $nom = openssl_decrypt($_POST['nombre'],COD,KEY);
             $alerta.= "Ok Nombre correcto ".$nom;
           }
           else{
             $alerta.= "El nombre de el producto no es correcto"; break;
           }
           if(is_numeric(openssl_decrypt($_POST['precio'],COD,KEY))) {
             $precio = openssl_decrypt($_POST['precio'],COD,KEY);
             $alerta.= "Ok Precio correcto ".$precio;
           }
           else{
             $alerta.= "El precio de el producto no es correcto"; break;
           }
           if(is_numeric(openssl_decrypt($_POST['numero'],COD,KEY))) {
             $cantidad = openssl_decrypt($_POST['numero'],COD,KEY);
             $alerta.= "Ok ID correcto ".$cantidad;
           }
           else{
             $alerta.= "La cantidad seleccionada en el producto no es correcta"; break;
           }
           if(!isset($_SESSION['Carrito'])){
             $productos = array(
               'ID'=>$ID,
               'NOMBRE'=>$nom,
               'CANTIDAD'=>$cantidad,
               'PRECIO'=>$precio
               );
               $_SESSION['Carrito'][0]= $productos;
               $alerta = "Producto Agregado al carrito";
           }
           else{
             $idProductos = array_column($_SESSION['Carrito'],"ID");
             if(in_array($ID,$idProductos)){
                 $accion.= "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                <strong>Ya seleccionaste el producto</strong> El Producto seleccionado ya esta en tu carrito.
                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                  <span aria-hidden='true'>&times;</span>
                                </button>
                            </div>";
                 // vaceamos el mensaje para que no aparesca la informacion de ID , NOMBRE , CANTIDAD , CORRECTOS
                 $alerta="";
             }else{
             $MasProductos = count($_SESSION['Carrito']);
             $productos = array(
               'ID'=>$ID,
               'NOMBRE'=>$nom,
               'CANTIDAD'=>$cantidad,
               'PRECIO'=>$precio
               );
               $_SESSION['Carrito'][$MasProductos]= $productos;
               $alerta = "Producto Agregado al carrito";
           }
         }
           // alerta para mostrar los productos dentro de el carrito
           // $alerta = print_r($_SESSION, true);
           //  se corta y se pasa la alerta al esle de el id $alerta = "Producto Agregado al carrito";
      break;
      case 'Eliminar':
            if(is_numeric(openssl_decrypt($_POST['id'],COD,KEY))){
            $ID = openssl_decrypt($_POST['id'],COD,KEY);
            foreach ($_SESSION['Carrito'] as $indice=>$productos) {
                if ($productos['ID']==$ID) {
                  unset($_SESSION['Carrito'][$indice]);
                  $accion.= "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                                 <strong>Se Elimino Producto</strong> El Producto seleccionado ya no esta en tu carrito.
                                 <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                   <span aria-hidden='true'>&times;</span>
                                 </button>
                             </div>";
                }
            }
            }else{
            $alerta.= "Error en el ID".$ID;
      }
        break;
  }
}
 ?>
