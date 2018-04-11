<?php
class ControllerFaleConosco
{
//Método Novo insere novo registro
    public function Inserir()
    {
        /*  Verifica se o método foi acionado por uma requisição de formulário
        POST.
        */
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $categoria = $_POST['slcCategoria'];
            $nome = $_POST['txtNome'];
            $email = $_POST['txtEmail'];
            $telefone = $_POST['txtTelefone'];
            $msg = $_POST['txtFeedback'];

            switch ($categoria)
            {
                case 'geral':
                    $categoria = 1;
                    break;
                case 'conta':
                    $categoria = 2;
                    break;
                case 'reservas':
                    $categoria = 3;
                    break;
                case 'feedback':
                    $categoria = 4;
                    break;
            }

            $faleconosco_class = new FaleConosco();

            $faleconosco_class->idCategoriaFormulario=$categoria;
            $faleconosco_class->nome=$nome;
            $faleconosco_class->email=$email;
            $faleconosco_class->telefone=$telefone;
            $faleconosco_class->mensagem=$msg;


            $faleconosco_class->Insert($faleconosco_class);
            if ($faleconosco == 'erro')
            {
                header('location:faleconosco.php?erro');
            }
            else
            {
                header('location:faleconosco.php?ok');
            }
        }
    }

    public function Select(){

      require_once('models/faleconosco_class.php');
      $listarFaleconosco = new FaleConosco();
      return $listarFaleconosco->SelectFale();

    }


}
 ?>
