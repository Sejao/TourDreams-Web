<?php

  class ParceiroDestaque{



    public function __construct()
    {
        //Inclui o arquivo de conexão com o banco de dados.
        require_once('models/db_class.php');
        //Instancia a classe Mysql_db.
        $conexao_db = new Mysql_db;
        //Chama o método conectar para estabelecer a conexão com o BD.
        $conexao_db->conectar();
    }

    public function SelectParceiroDestaque(){

      $sql = "select p.idParceiro, p.nomeParceiro,  i.caminhoImagem
              from tbl_parceiro as p
              inner join tbl_imagem as i
              on p.idImagem = i.idImagem LIMIT 5;";

      $select = mysql_query($sql);
      $cont = 0;

      while ($rs=mysql_fetch_array($select)) {
        $listParceiro[] = new ParceiroDestaque();

        $listParceiro[$cont]->nome = $rs['nomeParceiro'];
        $listParceiro[$cont]->idParceiro = $rs['idParceiro'];
        $listParceiro[$cont]->imagem = $rs['caminhoImagem'];

        $cont +=1;
      }
      return $listParceiro;

    }


    public function SelectBusca($parceiroDestaque){

      $sql = 'select * from tbl_parceiro where idParceiro ="'.$parceiroDestaque->idParceiro.'"';

      $select = mysql_query($sql);
      if($rs=mysql_fetch_array($select)){
        $resultado = new ParceiroDestaque();

        $resultado ->nomeParceiro = $rs['nomeParceiro'];
        $resultado ->idParceiro = $rs['idParceiro'];
        return $resultado;


      }

    }

  }


 ?>
