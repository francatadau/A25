<?php
include 'db.php';
/**
 *
 */
class usuario extends db
{
  function __construct()
  {
    parent::__construct();
  }
  //funcion insertar usuario en la base de datos
  function insertarUsuario($nombre, $apellidos, $email, $pass){
    $sql="INSERT INTO usuarios (id, usuario, nombre, apellidos, email, rol, pass)
          VALUES (NULL, '".$email."', '".$nombre."', '".$apellidos."', '".$email."', 'USER', '".sha1($pass)."')";
    //Realizamos la consulta
    $resultado=$this->realizarConsulta($sql);
    if($resultado!=false){
      //Sacamos por pantalla todos los usuarios ordenados descendentemente
      $sql="SELECT * from usuarios ORDER BY id DESC";
      $resultado=$this->realizarConsulta($sql);
      if($resultado!=false){
        return $resultado->fetch_assoc();
      }else{
        return null;
      }
    }else{
      return null;
    }
  }
  function LoginUsuario($email){
    //Construimos la consulta
    $sql="SELECT * from usuarios WHERE usuario='".$email."'";
    //Realizamos la consulta
    $resultado=$this->realizarConsulta($sql);
    if($resultado!=false){
      if($resultado!=false){
        return $resultado->fetch_assoc();
      }else{
        return null;
      }
    }else{
      return null;
    }
  }
  function MiPerfil($usuario){
    $sql="SELECT * from usuarios WHERE usuario='".$usuario."'";
    $resultado=$this->realizarConsulta($sql);
    if($resultado!=null){
      //Creamos la tabla
      $tabla=[];
      while($fila=$resultado->fetch_assoc()){
        $tabla[]=$fila;
      }
      return $tabla;
    }else{
      return null;
    }
  }
  public function ActualizarMiPerfil($usuario, $nombre, $apellidos, $rol)
  {
    $sql="UPDATE usuarios SET nombre='" .$nombre ."', apellidos='" .$apellidos ."', rol= '".$rol."' WHERE usuario='" .$usuario ."'";
    $actualizarperfil=$this->realizarConsulta($sql);
    if ($actualizarperfil=!false) {
      return true;
    }else {
      return false;
    }
  }
  function Comprobaremail($email){
    $sql="SELECT email from usuarios WHERE email='".$email."'";
    //Realizamos la consulta
    $resultado=$this->realizarConsulta($sql);
    if($resultado!=null){
      if ($resultado->num_rows>0) {
        return null;
      }else {
        return 1;
      }
    }else{
      return null;
    }
  }
  function Roles(){
      //Sacamos por pantalla todos los roles
      $sql="SELECT * from roles";
      //Realizamos la consulta
      $resultado=$this->realizarConsulta($sql);
      if($resultado!=null){
        //Creamos la tabla
        $tabla=[];
        while($fila=$resultado->fetch_assoc()){
          $tabla[]=$fila;
        }
        return $tabla;
      }else{
        return null;
      }
    }
}
 ?>
