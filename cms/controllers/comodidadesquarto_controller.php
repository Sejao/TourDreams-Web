<?php


class ControllerComodidadesQuarto
{

     public function Inserir()
    {
        /*  Verifica se o método foi acionado por uma requisição de formulário
        POST.
        */
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $nomeComodidade = $_POST['txtnomecomodidade'];
          
            $comodidadesquarto_class = new ComodidadesQuarto();
            
            $comodidadesquarto_class->nomeComodidade=$nomeComodidade;
    
            $comodidadesquarto = $comodidadesquarto_class->Insert($comodidadesquarto_class);
            if ($comodidadesquarto == 'ok')
            {
                header('location:comodidadesquarto.php');
            }
            else
            {
                header('location:comodidadesquarto.php?erro');
            }
        }
    }

    public function Editar()
    {
        /*  Verifica se o método foi acionado por uma requisição de formulário
        POST.
        */
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            
            $nomeComodidade = $_POST['txtnomecomodidade'];
            $idComodidade = $_GET['idComodidade'];

            $comodidadesquarto_class = new ComodidadesQuarto();

            $comodidadesquarto_class->nomeComodidade=$nomeComodidade;
           
            $comodidadesquarto_class->idComodidade= $idComodidade;

            $comodidadesquarto= $comodidadesquarto_class->Update($comodidadesquarto_class);
            if ($comodidadesquarto == 'erro')
            {
                header('location:comodidadesquarto.php?erro');
            }
            else
            {
                header('location:comodidadesquarto.php');
            }
        }
    }

  public function Listar(){

      require_once('models/comodidadesquarto_class.php');
      $lstComodidadesQuarto = new ComodidadesQuarto();
      return $lstComodidadesQuarto->SelectComodidadesQuarto();

    }
    public function Excluir(){

      $idComodidade = $_GET['idComodidade'];

      $comodidadesquarto_class = new ComodidadesQuarto();
      $comodidadesquarto_class->idComodidade = $idComodidade;
      $result = $comodidadesquarto_class->Delete($comodidadesquarto_class);

      if($result = 'erro'){
        header('location:comodidadesquarto.php?erro');
      }else {
        header('location:comodidadesquarto.php?');
      }
    }

    public function Visualizar(){
      $idComodidade = $_GET['idComodidade'];

      require_once('models/comodidadesquarto_class.php');

      $comodidadesquarto_class = new ComodidadesQuarto();
      $comodidadesquarto_class->idComodidade=$idComodidade;
      $result = $comodidadesquarto_class->SelectById($comodidadesquarto_class);

      require_once("comodidadesquarto.php");


    }

    public function AtualizarRegistrar(){

      if($_SERVER['REQUEST_METHOD']=='POST'){
        $nomeComodidade=$_POST['txtnomecomodidade'];
       

        $idComodidade = $_GET['idComodidade'];
        $comodidadesquarto_class = new ComodidadesQuarto();

        $comodidadesquarto_class->nomeComodidade=$nomeComodidade;

        $comodidadesquarto_class->idComodidade=$idComodidade;
      
        $comodidadesquarto_class->Update($comodidadesquarto_class);
      }
    }

     
}
 ?>
