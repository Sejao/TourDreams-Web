<?php


class ControllerCategoriaFaq
{

     public function Inserir()
    {
        /*  Verifica se o método foi acionado por uma requisição de formulário
        POST.
        */
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
        
            $categoriaFaq = $_POST['txtcategoriafaq'];

            $categoriafaq_class = new CategoriaFaq();
            
           
            $categoriafaq_class->categoriaFaq=$categoriaFaq;
            

            $categoriafaq = $categoriafaq_class->Insert($categoriafaq_class);
            if ($categoriafaq == 'ok')
            {
                header('location:categoriafaq.php');
            }
            else
            {
                header('location:categoriafaq.php?erro');
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
            $categoriaFaq = $_POST['txtcategoriafaq'];
            $idCategoriaFaq = $_GET['idCategoriaFaq'];

            

            $categoriafaq_class = new CategoriaFaq();

            $categoriafaq_class->categoriaFaq=$categoriaFaq;
            $categoriafaq_class->idCategoriaFaq= $idCategoriaFaq;

            $categoriafaq = $categoriafaq_class->Update($categoriafaq_class);
            if ($categoriafaq == 'erro')
            {
                header('location:categoriafaq.php?erro');
            }
            else
            {
                header('location:categoriafaq.php');
                mysql_query($sql);
            }
        }
    }

  public function Listar(){

      require_once('models/categoriafaq_class.php');
      $lstCategoriaFaq = new CategoriaFaq();
      return $lstCategoriaFaq->SelectCategoriaFaq();

    }
    public function Excluir(){

      $idCategoriaFaq = $_GET['idCategoriaFaq'];

      $categoriafaq_class = new CategoriaFaq();
      $categoriafaq_class->idCategoriaFaq= $idCategoriaFaq;
      $result = $categoriafaq_class->Delete($categoriafaq_class);

      if($result = 'erro'){
        header('location:categoriafaq.php?erro');
      }else {
        header('location:categoriafaq.php?');
        mysql_query($sql);

      }
    }

    public function Visualizar(){
      $idCategoriaFaq = $_GET['idCategoriaFaq'];

      require_once('models/categoriafaq_class.php');

      $categoriafaq_class = new CategoriaFaq();
      $categoriafaq_class->idCategoriaFaq=$idCategoriaFaq;
      $result = $categoriafaq_class->SelectById($categoriafaq_class);

      require_once("categoriafaq.php");


    }
    
     
}
 ?>
