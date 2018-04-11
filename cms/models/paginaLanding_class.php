<?php

  class Landing{
    public function __construct()
    {
        //Inclui o arquivo de conexão com o banco de dados.
        require_once('models/db_class.php');
        //Instancia a classe Mysql_db.
        $conexao_db = new Mysql_db;
        //Chama o método conectar para estabelecer a conexão com o BD.
        $conexao_db->conectar();
    }

    public function SelectLading(){

      $sql = "select * from tbl_imagem where idImagem = 177";
      $select = mysql_query($sql);
      if ($rs=mysql_fetch_array($select)) {

          $lstLanding = new Landing();
          $lstLanding->caminhoImagem=$rs['caminhoImagem'];

          return $lstLanding;
      }



    }

    public function UpDateLanding(){


        $sql = "update tbl_imagem set caminhoImagem = '".$this->caminhoImg."' where idImagem=177;";
        mysql_query($sql) or die(mysql_error());




    }

  }



 ?>
