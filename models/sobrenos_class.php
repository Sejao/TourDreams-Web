<?php

    class SobreNos{

      public function __construct(){

        require_once('models/db_class.php');
        $conexao_db = new Mysql_db;
        $conexao_db->conectar();

      }

      public function SelectSobre(){

        $sql = "select * from vw_paginasobrenos";
        $select  =mysql_query($sql);

        if ($rs=mysql_fetch_array($select)) {

          $listar = new SobreNos();
          $listar->descricaoSuperior=$rs['descricaoSuperior'];
          $listar->missao=$rs['missao'];
          $listar->visao=$rs['visao'];
          $listar->valores=$rs['valores'];
          $listar->anoUm=$rs['anoUm'];
          $listar->anoDois=$rs['anoDois'];
          $listar->anoTres=$rs['anoTres'];
          $listar->descricaoUm=$rs['descricaoUm'];
          $listar->descricaoDois=$rs['descricaoDois'];
          $listar->descricaoTres=$rs['descricaoTres'];
          $listar->imgmissao=$rs['campoMissao'];
          $listar->imgvisao=$rs['campoVisao'];
          $listar->imgvalores=$rs['campoValores'];
          $listar->imgempresa=$rs['empresa'];


          return $listar;


        }
      }



    }




 ?>
