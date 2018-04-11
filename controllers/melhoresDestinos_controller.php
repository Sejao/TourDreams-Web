<?php

  class ControllerMelhoresDestinos{

    public function ListarMelhoresDestinos(){

      require_once('models/melhoresDestinos_class.php');
      $lstMelhores = new Melhores();
      return $lstMelhores->SelectMelhores();


    }

    public function ListarUltimaReserva(){
        require_once('models/melhoresDestinos_class.php');
        $idCliente = $_SESSION['idCliente'];
        $lstUltimas = new Melhores();
        $lstUltimas->idCliente = $idCliente;
        return $lstUltimas->SelectUltimas();
    }

    public function ListarBaseadoPerfil(){
        require_once('models/melhoresDestinos_class.php');
        $idCliente = $_SESSION['idCliente'];
        $lstPerfil = new Melhores();
        $lstPerfil->idCliente = $idCliente;
        return $lstPerfil->SelectPerfil();
    }



  }



 ?>
