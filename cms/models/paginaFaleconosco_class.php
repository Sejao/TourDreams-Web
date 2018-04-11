<?php

  class PaginaFaleConosco{

    public function __construct()
    {
        //Inclui o arquivo de conexão com o banco de dados.
        require_once('models/db_class.php');
        //Instancia a classe Mysql_db.
        $conexao_db = new Mysql_db;
        //Chama o método conectar para estabelecer a conexão com o BD.
        $conexao_db->conectar();
    }

    public function EditarContato(){
      $sql="update tbl_imagem set caminhoImagem='".$this->caminhoImagemContato."' where idImagem=205";
      //echo ($sql);
      mysql_query($sql) or dir(mysql_error());
    }
    public function EditarFaq(){
      $sql="update tbl_imagem set caminhoImagem='".$this->caminhoImagemFaq."' where idImagem=206";
      //echo ($sql);
      mysql_query($sql) or dir(mysql_error());
    }
    public function EditarDuvida(){
      $sql="update tbl_imagem set caminhoImagem='".$this->caminhoImagemDuvida."' where idImagem=207";
      //echo ($sql);
      mysql_query($sql) or dir(mysql_error());
    }
    public function EditarGeral(){
      $sql="update tbl_imagem set caminhoImagem='".$this->caminhoImagemGeral."' where idImagem=2";
    //  echo ($sql);
      mysql_query($sql) or dir(mysql_error());
    }
    public function EditarConta(){
      $sql="update tbl_imagem set caminhoImagem='".$this->caminhoImagemConta."' where idImagem=3";
      //echo ($sql);
      mysql_query($sql) or dir(mysql_error());
    }
    public function EditarReservas(){
      $sql="update tbl_imagem set caminhoImagem='".$this->caminhoImagemReservas."' where idImagem=4";
      //echo ($sql);
      mysql_query($sql) or dir(mysql_error());
    }
    public function EditarFeedback(){
      $sql="update tbl_imagem set caminhoImagem='".$this->caminhoImagemFeedback."' where idImagem=5";
      //echo ($sql);
      mysql_query($sql) or dir(mysql_error());
    }
    public function EditarBackground(){
      $sql="update tbl_imagem set caminhoImagem='".$this->caminhoImagemBackground."' where idImagem=208";
      //echo ($sql);
      mysql_query($sql) or dir(mysql_error());
    }


    public function SelectFale(){

      $sql = "select * from vw_paginafaleconosco;";

      $select = mysql_query($sql);

      if($rs=mysql_fetch_array($select)){
        $paginaFale_class = new PaginaFaleConosco();
        $paginaFale_class->contato=$rs['Contato'];
        $paginaFale_class->faq=$rs['FAQ'];
        $paginaFale_class->duvida=$rs['Duvida'];
        $paginaFale_class->geral=$rs['Geral'];
        $paginaFale_class->conta=$rs['Conta'];
        $paginaFale_class->reserva=$rs['Reserva'];
        $paginaFale_class->feedback=$rs['FeedBack'];

        $paginaFale_class->bg=$rs['Background'];

        return $paginaFale_class;
      }

    }


  }

 ?>
