<?php

class ControllerInformacao{
    
  public function Listar(){

      require_once('models/informacao_class.php');
      $lstInformacao = new Informacao();
      return $lstInformacao->SelectInformacao();

    }
}



?>