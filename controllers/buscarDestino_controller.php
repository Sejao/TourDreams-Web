<?php


  class ControllerBuscarDestino{

    public function Buscar(){

      require_once('models/buscarDestino_class.php');

      if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $buscarDestino = $_POST['txtBuscarDestino'];

        $buscarDestino_class = new BuscarDestino();
        $buscarDestino_class->destino = $buscarDestino;
        return $buscarDestino_class ->SelectByDestino($buscarDestino_class);

      }


    }


  }


 ?>
