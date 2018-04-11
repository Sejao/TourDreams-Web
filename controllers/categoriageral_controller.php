<?php


class ControllerCategoriaGeral
{

    public function Visualizar(){

      require_once('models/categoriageral_class.php');

      $categoriageral_class = new CategoriaGeral();
      return $categoriageral_class->SelectCategoria();

      require_once("faleconosco.php");


    }
    
    public function VisualizarPergunta($idCategoria){

      require_once('models/categoriageral_class.php');
        
       

      $pergunta = new CategoriaGeral();
        $pergunta->idCategoria = $idCategoria;
      return $pergunta->SelectPergunta();

      require_once("faleconosco.php");


    }

}

?>