<?php


  class ControllerReservas{


    public function Atutalizar(){

      require_once('models/reservas_class.php');
      $listarReservas = new Reservas();
      return $listarReservas->SelectReservas();


    }

  }

 ?>
