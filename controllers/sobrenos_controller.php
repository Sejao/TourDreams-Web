<?php

  class Sobre{

    public function Select(){

      require_once('models/sobrenos_class.php');
      $listarSobre = new SobreNos();
      return $listarSobre->SelectSobre();


    }



  }




 ?>
