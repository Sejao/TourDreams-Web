<?php


class ControllerFaq
{

     public function Inserir()
    {
        /*  Verifica se o método foi acionado por uma requisição de formulário
        POST.
        */
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $pergunta = $_POST['txtpergunta'];
            $resposta = $_POST['txtresposta'];
            $idCategoriaFaq = $_POST['txtcategoria'];

            $faq_class = new Faq();
            
            $faq_class->pergunta=$pergunta;
            $faq_class->resposta=$resposta;
            $faq_class->idCategoriaFaq=$idCategoriaFaq;
            

            $faq = $faq_class->Insert($faq_class);
            if ($faq == 'ok')
            {
                header('location:faq.php');
            }
            else
            {
                header('location:faq.php?erro');
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
            $pergunta = $_POST['txtpergunta'];
            $resposta = $_POST['txtresposta'];
            $idCategoriaFaq = $_POST['txtcategoria'];
            $idFaq = $_GET['idFaq'];

            

            $faq_class = new Faq();

            $faq_class->pergunta=$pergunta;
            $faq_class->resposta=$resposta;
            $faq_class->idCategoriaFaq=$idCategoriaFaq;
            $faq_class->idFaq= $idFaq;

            $faq = $faq_class->Update($faq_class);
            if ($faq == 'erro')
            {
                header('location:faq.php?erro');
            }
            else
            {
                header('location:faq.php');
                mysql_query($sql);
            }
        }
    }

  public function Listar(){

      require_once('models/faq_class.php');
      $lstFaq = new Faq();
      return $lstFaq->SelectFaq();

    }
    public function Excluir(){

      $idFaq = $_GET['idFaq'];

      $faq_class = new Faq();
      $faq_class->idFaq= $idFaq;
      $result = $faq_class->Delete($faq_class);

      if($result = 'erro'){
        header('location:faq.php?erro');
      }else {
        header('location:faq.php?');
        mysql_query($sql);

      }
    }

    public function Visualizar(){
      $idFaq = $_GET['idFaq'];

      require_once('models/faq_class.php');

      $faq_class = new Faq();
      $faq_class->idFaq=$idFaq;
      $result = $faq_class->SelectById($faq_class);

      require_once("faq.php");


    }
    
     
}
 ?>
