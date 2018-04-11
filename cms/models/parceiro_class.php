<?php

  class Parceiro{

    public function __construct()
    {
        //Inclui o arquivo de conexão com o banco de dados.
        require_once('models/db_class.php');
        //Instancia a classe Mysql_db.
        $conexao_db = new Mysql_db;
        //Chama o método conectar para estabelecer a conexão com o BD.
        $conexao_db->conectar();
    }

    public function SelectParceiro(){

      $sql = 'select  p.idParceiro, p.cnpj, p.nomeParceiro, p.descricao, l.login, l.idLogin
        from tbl_parceiro as p
        inner join tbl_login as l
        on p.idLogin = l.idLogin';
      $select = mysql_query($sql);

      $cont = 0;


      while ($rs=mysql_fetch_array($select)) {

        $listParceiro[] = new Parceiro();

        $listParceiro[$cont]->idParceiro = $rs['idParceiro'];
        $listParceiro[$cont]->cnpj = $rs['cnpj'];
        $listParceiro[$cont]->nome = $rs['nomeParceiro'];
        $listParceiro[$cont]->descricao=$rs['descricao'];
        $listParceiro[$cont]->login = $rs['login'];
        $listParceiro[$cont]->idLogin = $rs['idLogin'];

        $cont +=1;
      }
       return $listParceiro;
    }

    public function Delete($parceiro){
      $sql = "DELETE FROM tbl_parceiro where idParceiro=".$parceiro->idParceiro.";";
      if(mysql_query($sql)){
        return 'ok';
      }
      else {
        return 'erro';

      }
    }

    public function SelectById($parceiro){
      $sql = "select p.nomeParceiro, p.cnpj, p.emailParceiro, s.senha,p.idLogin
              from tbl_parceiro as p
              inner join tbl_login as s
              on p.idLogin = s.idLogin WHERE idParceiro=".$parceiro->idParceiro;
      $select = mysql_query($sql);

      if($rs=mysql_fetch_array($select)){

        $listar = new Parceiro();

        $listar->nome=$rs['nomeParceiro'];
        $listar->cnpj=$rs['cnpj'];
        $listar->email=$rs['emailParceiro'];
        $listar->senha=$rs['senha'];
        $listar->idLogin=$rs['idLogin'];
        return  $listar;
      }


    }

    public function Update($parceiro){

      $sql = "UPDATE tbl_login set senha='".$parceiro->senha."' WHERE idLogin=".$parceiro->idLogin;
      //echo ($sql);
      mysql_query($sql);
      $sql = "UPDATE tbl_parceiro set cnpj='".$parceiro->cnpj."', nomeParceiro='".$parceiro->nome."', emailParceiro='".$parceiro->email."'Where idParceiro= ".$parceiro->idParceiro;
      //echo ($sql);
      mysql_query($sql);


      header('location:gerenciamentoparceiros.php');

    }

  }



 ?>
