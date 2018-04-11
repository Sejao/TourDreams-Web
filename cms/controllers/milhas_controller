<?php


class ControllerParceiro
{

  public function Listar(){

      require_once('models/parceiro_class.php');
      $lstParceiro = new Parceiro();
      return $lstParceiro->SelectParceiro();

    }
    public function Excluir(){

      $idParceiro = $_GET['idParceiro'];

      $parceiro_class = new Parceiro();
      $parceiro_class->idParceiro = $idParceiro;
      $result = $parceiro_class->Delete($parceiro_class);

      if($result = 'erro'){
        header('location:gerenciamentoparceiros.php?erro');
      }else {
        header('location:gerenciamentoparceiros.php?ok');
      }
    }

    public function Visualizar(){
      $idParceiro = $_GET['idParceiro'];

      require_once('models/parceiro_class.php');

      $parceiro_class = new Parceiro();
      $parceiro_class->idParceiro=$idParceiro;
      $result = $parceiro_class->SelectById($parceiro_class);

      require_once("gerenciamentoparceiros.php");


    }

    public function AtualizarRegistrar(){

      if($_SERVER['REQUEST_METHOD']=='POST'){
        $nome=$_POST['txtnome'];
        $cnpj=$_POST['txtcnpj'];
        $email=$_POST['txtemail'];
        $senha=$_POST['txtsenha'];

        $idParceiro = $_GET['idParceiro'];
        $idLogin = $_GET['idLogin'];

        $parceiro_class = new Parceiro();

        $parceiro_class->nome=$nome;
        $parceiro_class->cnpj=$cnpj;
        $parceiro_class->email=$email;
        $parceiro_class->senha=$senha;

        $parceiro_class->idParceiro=$idParceiro;
        $parceiro_class->idLogin=$idLogin;
      
        $parceiro_class->Update($parceiro_class);
      }
    }

}
 ?>
