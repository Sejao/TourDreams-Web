<?php

  class ControllerPromocoes{

    public function Listar(){

      require_once('models/promocoes_class.php');
      $lstPromocoes = new Promocoes();
      return $lstPromocoes->SelectPromocoes();

    }

    public function Excluir(){

      $idMilhas = $_GET['idMilhas'];

      $promocoes_class = new Promocoes();
      $promocoes_class->idMilhas = $idMilhas;
      $result = $promocoes_class->Delete($promocoes_class);

      if($result == 'erro'){
        header('location:promocoes.php?erroEE');
      }else {
        header('location:promocoes.php?ok');
      }


    }

    public function Visualizar(){

      $idMilhas = $_GET['idMilhas'];

      require_once('models/promocoes_class.php');

      $promocoes_class = new Promocoes();
      $promocoes_class->idMilhas = $idMilhas;
      $result = $promocoes_class->SelectById($promocoes_class);

      require_once("promocoes.php");

    }

    public function AtualizarRegistrar(){

      if($_SERVER['REQUEST_METHOD']=='POST'){

        $valor = $_POST['txtquantidade'];
        $desconto=$_POST['txtmilhas'];

        $idMilhas=$_GET['idMilhas'];

        $promocoes_class = new Promocoes();

        $promocoes_class->valor=$valor;
        $promocoes_class->desconto=$desconto;
        $promocoes_class->idMilhas=$idMilhas;

        $promocoes_class->Update($promocoes_class);

      }


    }

  }


 ?>
