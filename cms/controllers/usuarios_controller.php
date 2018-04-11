<?php


class ControllerUsuario
{

  public function Listar(){

      require_once('models/usuario_class.php');
      $lstUsuario = new Usuario();
      return $lstUsuario->SelectAll();

    }
    public function Excluir(){

      $idUsuario = $_GET['idUsuario'];

      $usuario_class = new Usuario();
      $usuario_class->idUsuario = $idUsuario;
      $result = $usuario_class->Delete($usuario_class);

      if($result = 'erro'){
        header('location:gerenciamentousuarios.php?erro');
      }else {
        header('location:gerenciamentousuarios.php?ok');
      }
    }

    public function Visualizar(){
      $idUsuario = $_GET['idUsuario'];
      require_once('models/usuario_class.php');


    }

}
 ?>
