<?php


class ControllerComodidadesHotel
{

     public function Inserir()
    {
        /*  Verifica se o método foi acionado por uma requisição de formulário
        POST.
        */
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $nomeComodidade = $_POST['txtnomecmodidade'];
          
            $comodidadeshotel_class = new ComodidadesHotel();
            
            $comodidadeshotel_class->nomeComodidade=$nomeComodidade;
    
            $comodidadeshotel = $comodidadeshotel_class->Insert($comodidadeshotel_class);
            if ($comodidadeshotel == 'ok')
            {
                header('location:comodidadeshotel.php');
            }
            else
            {
                header('location:comodidadeshotel.php?erro');
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
            
            $nomeComodidade = $_POST['txtnomecmodidade'];
            $idComodidadeHotel = $_GET['idComodidadeHotel'];

            $comodidadeshotel_class = new ComodidadesHotel();

           $comodidadeshotel_class->nomeComodidade=$nomeComodidade;
           
          $comodidadeshotel_class->idComodidadeHotel= $idComodidadeHotel;

            $comodidadeshotel_class->Update($comodidadeshotel_class);
            header('location:comodidadeshotel.php');
            
        }
    }

  public function Listar(){

      require_once('models/comodidadeshotel_class.php');
      $lstComodidadesHotel = new ComodidadesHotel();
      return $lstComodidadesHotel->SelectComodidadesHotel();

    }
    public function Excluir(){

      $idComodidadeHotel = $_GET['idComodidadeHotel'];

       
      $comodidadeshotel_class = new ComodidadesHotel();
      $comodidadeshotel_class->idComodidadeHotel = $idComodidadeHotel;
      $result = $comodidadeshotel_class->Delete($comodidadeshotel_class);

    if($result = 'erro'){
        header('location:comodidadeshotel.php?erro');
      }else {
        header('location:comodidadeshotel.php?');
      }
        
    }

    public function Visualizar(){
      $idComodidadeHotel = $_GET['idComodidadeHotel'];

      require_once('models/comodidadeshotel_class.php');

      $comodidadeshotel_class = new ComodidadesHotel();
      $comodidadeshotel_class->idComodidadeHotel=$idComodidadeHotel;
      $result = $comodidadeshotel_class->SelectById($comodidadeshotel_class);

      require_once("comodidadeshotel.php");


    }

    

     
}
 ?>
