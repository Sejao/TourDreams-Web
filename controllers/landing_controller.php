<?php

  class ControllerLanding{

    public function ListarLanding(){

      require_once('models/landing_class.php');
      $lstLanding = new Landing();
      return $lstLanding->SelectLanding();
    }


  }



 ?>
