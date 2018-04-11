<?php


class ControllerMilhas
{

     public function Inserir()
    {
        /*  Verifica se o método foi acionado por uma requisição de formulário
        POST.
        */
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $valorPontos = $_POST['txtvalorpontos'];
            $desconto = $_POST['txtdesconto'];
            $desconto = str_replace(',', '.', $desconto);

            $milhas_class = new Milhas();
            
            $milhas_class->valorPontos=$valorPontos;
            $milhas_class->desconto=$desconto;
            

            $milhas = $milhas_class->Insert($milhas_class);
            if ($milhas == 'ok')
            {
                header('location:milhas.php');
            }
            else
            {
                header('location:milhas.php?erro');
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
            $desconto = $_POST['txtdesconto'];
            $valorPontos = $_POST['txtvalorpontos'];
            $idRecompensa = $_GET['idRecompensa'];

            $valorPontos = str_replace(',', '.', $valorPontos);

            $milhas_class = new Milhas();

            $milhas_class->valorPontos=$valorPontos;
            $milhas_class->desconto=$desconto;
            $milhas_class->idRecompensa= $idRecompensa;

            $milhas= $milhas_class->Update($milhas_class);
            if ($milhas == 'erro')
            {
                header('location:milhas.php?erro');
            }
            else
            {
                header('location:milhas.php');
            }
        }
    }

  public function Listar(){

      require_once('models/milhas_class.php');
      $lstMilhas = new Milhas();
      return $lstMilhas->SelectMilhas();

    }
    public function Excluir(){

      $idRecompensa = $_GET['idRecompensa'];

      $milhas_class = new Milhas();
      $milhas_class->idRecompensa = $idRecompensa;
      $result = $milhas_class->Delete($milhas_class);

      if($result = 'erro'){
        header('location:milhas.php?erro');
      }else {
        header('location:milhas.php?');
      }
    }

    public function Visualizar(){
      $idRecompensa = $_GET['idRecompensa'];

      require_once('models/milhas_class.php');

      $milhas_class = new Milhas();
      $milhas_class->idRecompensa=$idRecompensa;
      $result = $milhas_class->SelectById($milhas_class);

      require_once("milhas.php");


    }

    public function AtualizarRegistrar(){

      if($_SERVER['REQUEST_METHOD']=='POST'){
        $valorPontos=$_POST['txtvalorpontos'];
        $desconto=$_POST['txtdesconto'];

        $idRecompensa = $_GET['idRecompensa'];
        $milhas_class = new Milhas();

        $milhas_class->valorPontos=$valorPontos;
        $milhas_class->desconto=$desconto;
        $milhas_class->idRecompensa=idRecompensa;
      
        $milhas_class->Update($milhas_class);
      }
    }

     
}
 ?>
