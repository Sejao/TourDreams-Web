<?php
class ControllerMoeda
{
    public function Inserir()
    {
        /*  Verifica se o método foi acionado por uma requisição de formulário
        POST.
        */
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $nome = $_POST['txtNome'];
            $valor = $_POST['txtValor'];
            $valor = str_replace(',', '.', $valor);
            $simbolo = $_POST['txtSimbolo'];

            $moeda_class = new Moeda();

            $moeda_class->nome=$nome;
            $moeda_class->valor=$valor;
            $moeda_class->simbolo=$simbolo;

            $moeda = $moeda_class->Insert($moeda_class);
            if ($moeda == 'erro')
            {
                header('location:moeda.php?erro');
            }
            else
            {
                header('location:moeda.php');
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
            $nome = $_POST['txtNome'];
            $valor = $_POST['txtValor'];
            $idMoeda = $_GET['idMoeda'];
            $simbolo = $_POST['txtSimbolo'];

            $valor = str_replace(',', '.', $valor);

            $moeda_class = new Moeda();

            $moeda_class->nome=$nome;
            $moeda_class->valor=$valor;
            $moeda_class->simbolo=$simbolo;
            $moeda_class->idMoeda=$idMoeda;

            $moeda = $moeda_class->Update($moeda_class);
            if ($moeda == 'erro')
            {
                header('location:moeda.php?erro');
            }
            else
            {
                header('location:moeda.php');
            }
        }
    }

    public function Listar()
    {
        require_once('models/moeda_class.php');
        $lstMoeda = new Moeda();
        return $lstMoeda->SelectAll();
    }

    public function Visualizar()
    {
        $idMoeda = $_GET['idMoeda'];
        $moeda_class = new Moeda();
        $moeda_class->idMoeda=$idMoeda;
        $resultado = $moeda_class->SelectById($moeda_class);

        require_once('moeda.php');
    }

    public function Excluir()
    {
        $idMoeda = $_GET['idMoeda'];
        $moeda_class = new Moeda();
        $moeda_class->idMoeda=$idMoeda;

        $moeda = $moeda_class->Delete($moeda_class);
        if ($moeda == 'erro')
        {
            header('location:moeda.php?erro');
        }
        else
        {
            header('location:moeda.php');
        }
    }
}
 ?>
