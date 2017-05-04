<?php
//Incluimos la pagina usuario
  include 'usuario.php';
  $usuario = new usuario();
  $actperfil=$usuario->ActualizarMiPerfil($_POST['email'], $_POST['nombre'], $_POST['apellidos'], $_POST['roles']);
  if ($actperfil==true) {
    //En header location, te lleva a la página que hemos puesto.
    //(Si actualizar perfil funciona, nos llevará a la página miperfil)
    header('Location: miperfil.php');
  }else {
    echo "Error al actualizar los datos<br><br>";
    echo "<a href='miperfil.php'>Volver a mi perfil</a>";
  }
 ?>
