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
      $sql = "select * from vw_paginapromocoes;";
      $select = mysql_query($sql);
	
	$cont = 0;
$listar_class[] = new Promocoes();
      while($rs=mysql_fetch_array($select)){
        
        $listar_class[$cont]->caminhoImagem=$rs['caminhoImagem'];
        $cont++;
        }
	return $listar_class;

    }

  }



 ?>
