<?php

    class MelhoresDestinos{

      public function __construct()
      {
          //Inclui o arquivo de conexão com o banco de dados.
          require_once('models/db_class.php');
          //Instancia a classe Mysql_db.
          $conexao_db = new Mysql_db;
          //Chama o método conectar para estabelecer a conexão com o BD.
          $conexao_db->conectar();
      }


      public function SelectMelhoresDestinos(){

        $sql = "select * from tbl_imagem where idImagem = 178";
        $select = mysql_query($sql);
        if($rs=mysql_fetch_array($select)){

          $lstMelhores = new MelhoresDestinos();
          $lstMelhores->caminhoImagem=$rs['caminhoImagem'];

          
          return $lstMelhores;
        }

      }

      public function UpDateMelhores(){

        $sql = "update tbl_imagem set caminhoImagem ='".$this->caminhoImg."' where idImagem = 178;";
        mysql_query($sql) or die(mysql_error());


      }


    }
 ?>
