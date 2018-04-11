<?php

  class SobreNos{



    public function __construct()
    {
        //Inclui o arquivo de conexão com o banco de dados.
        require_once('models/db_class.php');
        //Instancia a classe Mysql_db.
        $conexao_db = new Mysql_db;
        //Chama o método conectar para estabelecer a conexão com o BD.
        $conexao_db->conectar();
    }

    public function SelectSobre(){

      $sql = "select * from vw_paginasobrenos";
      $select = mysql_query($sql);

      if($rs=mysql_fetch_array($select)) {

        $listSobre = new SobreNos();
        $listSobre->descricaoSuperior=$rs['descricaoSuperior'];
        $listSobre->missao=$rs['missao'];
        $listSobre->visao=$rs['visao'];
        $listSobre->valores=$rs['valores'];
        $listSobre->anoUm=$rs['anoUm'];
        $listSobre->anoDois=$rs['anoDois'];
        $listSobre->anoTres=$rs['anoTres'];
        $listSobre->descricaoUm=$rs['descricaoUm'];
        $listSobre->descricaoDois=$rs['descricaoDois'];
        $listSobre->descricaoTres=$rs['descricaoTres'];
        $listSobre->imgmissao=$rs['campoMissao'];
        $listSobre->imgvisao=$rs['campoVisao'];
        $listSobre->imgvalores=$rs['campoValores'];
        $listSobre->imgempresa=$rs['empresa'];


        return $listSobre;

      }

    }

    public function Editar(){



      //Update tbl_imagem
      $sql = "update tbl_paginasobre set descricaoSuperior='".$this->descricaoSuperior."',
       missao= '".$this->descricaoMissao."', visao ='".$this->descricaoVisao."', valores='".$this->descricaoValores."',
        anoUm='".$this->anoUm."', anoDois='".$this->anoDois."',anoTres='".$this->anoTres."',
       descricaoUm='".$this->descricaoAnoUm."', descricaoDois='".$this->descricaoAnoDois."',
        descricaoTres='".$this->descricaoAnoTres."' where idPaginaSobre = 1;";



     mysql_query($sql) or die(mysql_error());
  //  echo ($sql);
    header('location:paginaSobrenos.php');


    }

    public function EditarMissao(){

      $sql="update tbl_paginasobre set caminhoImagem ='".$this->caminhoImagemMissao."' where idImagem = 187";
      //mysql_query($sql) or dir(mysql_error());
      echo ($sql);
    }
    public function EditarVisao(){


      $sql = "update tbl_imagem set caminhoImagem='".$this->caminhoImagemVisao."' where idImagem = 189";
      echo ($sql);
      //mysql_query($sql) or die(mysql_error());

    }
    public function EditarValores(){
      $sql = "Update tbl_imagem set caminhoImagem='".$this->caminhoImagemValores."' where idImagem = 188";
      echo ($sql);
      // mysql_query($sql) or dir(mysql_error());

    }
    public function EditarEmpresa(){

      $sql = "update tbl_imagem set caminhoImagem'".$this->caminhoImagemEmpresa."' where idImagem = 185";
      echo ($sql);
      // mysql_query($sql) or dir(mysql_error());

    }

  }



 ?>
