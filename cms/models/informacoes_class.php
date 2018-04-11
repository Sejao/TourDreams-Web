<?php

  class Informacoes{

    public $idInformacao;
    public $emailTourdreams;
    public $idLogradouro;
    public $idTelefone;



    public function __construct()
    {
        //Inclui o arquivo de conexão com o banco de dados.
        require_once('models/db_class.php');
        //Instancia a classe Mysql_db.
        $conexao_db = new Mysql_db;
        //Chama o método conectar para estabelecer a conexão com o BD.
        $conexao_db->conectar();
    }



         public function Insert($informacoes)
        {
            $sql = 'INSERT INTO tbl_informacao (emailTourdreams, idLogradouro, idTelefone) VALUES ("'.$informacoes->emailTourdreams.'","'.$informacoes->idLogradouro.'","'.$informacoes->idTelefone.'")';
            if(mysql_query($sql))
            {
                return 'ok';
            }
            else
            {
                return 'erro';
            }

        }



    public function SelectInformacoes(){

      $sql = 'SELECT * FROM vw_informacoes';

      $select = mysql_query($sql);

      $cont = 0;


      while ($rs=mysql_fetch_array($select)) {

        $listInformacoes[] = new Informacoes();

        $listInformacoes[$cont]->idInformacao = $rs['idInformacao'];
        $listInformacoes[$cont]->emailTourdreams = $rs['emailTourdreams'];
        $listInformacoes[$cont]->logradouro = $rs['logradouro'];
        $listInformacoes[$cont]->telefone = $rs['telefone'];

        $cont +=1;
      }
       return $listInformacoes;
    }

    public function Delete($informacoes){
      $sql = "DELETE FROM tbl_informacao where idInformacao=".$informacoes->idInformacao.";";
      if(mysql_query($sql)){
        return 'ok';
      }
      else {
        return 'erro';

      }
    }

    public function SelectById($informacoes){
      $sql = "select * from tbl_informacao WHERE idInformacao=".$informacoes->idInformacao;
      $select = mysql_query($sql);

      if($rs=mysql_fetch_array($select)){

        $informacoes = new Informacoes();

        $informacoes ->idInformacao = $rs['idInformacao'];
        $informacoes->emailTourdreams=$rs['emailTourdreams'];
        $informacoes->idLogradouro=$rs['idLogradouro'];
        $informacoes->idTelefone=$rs['idTelefone'];

      }

         return  $informacoes;
    }

    public function Update($informacoes){


      $sql = "UPDATE tbl_informacao set emailTourdreams='".$informacoes->emailTourdreams."', idLogradouro='".$informacoes->idLogradouro."', idTelefone='".$informacoes->idTelefone."'Where idInformacao= ".$informacoes->idInformacao;

        if(mysql_query($sql))
        {
            return 'ok';
        }else
        {
            return 'erro';
        }


    }

  }



 ?>
