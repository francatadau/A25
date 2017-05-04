<?php
  include 'seguridad.php';
  $sesion = new seguridad();
  if (isset($_SESSION['usuario'])==false) {
    header('Location: index.php');
  }else {
?>
  <!DOCTYPE html>
  <html>
    <head>
      <meta charset="utf-8">
      <title>Mi perfil</title>
    </head>
    <body>
      <form action="actualizar.php" method="post">
        <?php
          include 'usuario.php';
          $usuario = new usuario();
          $perfil=$usuario->MiPerfil($_SESSION['usuario']);
          foreach ($perfil as $fila) {
            echo "<input type='text' name='email' value='".$fila['email']."' readonly><br><br>";
            echo "<input type='text' name='nombre' value='".$fila['nombre']."'><br><br>";
            echo "<input type='text' name='apellidos' value='".$fila['apellidos']."'><br><br>";
            echo "<input type='text' name='rol' value='".$fila['rol']."' readonly><br><br>";
          }
         ?>
         <select class="" name="roles">
          <option value="CAMBIAR ROL">CAMBIAR ROL</option>
           <?php
           $roles=$usuario->Roles();
           foreach ($roles as $fila) {
             echo "<option value='".$fila['rol']."' name='".$fila['rol']."'>".$fila['rol']."</option>";
           }
            ?>
         </select>
         <br><br>
         <input type="submit" name="actualizar" value="Actualizar">
      </form>

    </body>
  </html>
  <?php
}
 ?>
