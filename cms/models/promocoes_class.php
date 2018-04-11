<?php

  class Promocoes{
    public function __construct()
    {
        //Inclui o arquivo de conexão com o banco de dados.
        require_once('models/db_class.php');
        //Instancia a classe Mysql_db.
        $conexao_db = new Mysql_db;
        //Chama o método conectar para estabelecer a conexão com o BD.
        $conexao_db->conectar();
    }

    public function SelectPromocoes(){

      $sql ='select * from tbl_milhasrecompensa' ;
      $select = mysql_query($sql);

      $cont = 0;

      while ($rs=mysql_fetch_array($select)) {

        $listPromocoes[] = new Promocoes();

        $listPromocoes[$cont]->idMilhas = $rs['idRecompensa'];
        $listPromocoes[$cont]->valor = $rs['valorPontos'];
        $listPromocoes[$cont]->desconto = $rs['desconto'];

        $cont +=1;

      }

      return $listPromocoes;

    }

    public function Delete($promocoes){

      $sql = "DELETE FROM tbl_milhasrecompensa where idRecompensa=".$promocoes->idMilhas;

      if(mysql_query($sql)){
        return 'ok';
      }
      else {
        return 'erro';

      }


    }

    public function SelectById($promocoes){

      $sql = "select * from tbl_milhasrecompensa where idRecompensa=".$promocoes->idMilhas;

      $select = mysql_query($sql);

      if($rs=mysql_fetch_array($select)){

        $listar = new Promocoes();

        $listar->valor=$rs['valorPontos'];
        $listar->desconto=$rs['desconto'];

        return $listar;
      }

    }

    public function Update($promocoes){
      $sql ="UPDATE tbl_milhasrecompensa set valorPontos='".$promocoes->valor."', desconto='".$promocoes->desconto."'where idRecompensa=".$promocoes->idMilhas;
      mysql_query($sql);

      header('location:promocoes.php');
    }

  }

 ?>
