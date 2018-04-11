<?php

  class ControllerPromocoes
  {
    public function Select(){

      require_once('models/promocoes_class.php');
      $listar_promocoes = new Promocoes();
      return $listar_promocoes->SelectPromocoes();


    }

  }



 ?>
