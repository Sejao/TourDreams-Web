<?php

  class ControllerBuscaRapida{

    public function Buscar(){

      require_once('models/buscaRapida_class.php');

      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $destino = $_POST['txtDestino'];


        $buscaRapida_class = new BuscaRapida();
        $buscaRapida_class->destino = $destino;
        return $buscaRapida_class->SelectByDestino($buscaRapida_class);



    }
  }

}


 ?>
