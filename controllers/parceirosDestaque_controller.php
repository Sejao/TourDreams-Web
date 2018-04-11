<?php

  class ControllerParceiroDestaque{


    public function Listar(){

      require_once('models/parceirosDestaque_class.php');
      $lstParceiro = new ParceiroDestaque();
      return $lstParceiro->SelectParceiroDestaque();

    }

    public function Buscar(){



        $idParceiro = $_POST['sltBusca'];

        require_once('models/parceirosDestaque_class.php');
        $parceirosDestaque_class=new ParceiroDestaque();

        $parceirosDestaque_class->idParceiro=$idParceiro;

        $result = $parceirosDestaque_class->SelectBusca($parceirosDestaque_class);

        require_once("parceiros.php");

      }




  }


 ?>
