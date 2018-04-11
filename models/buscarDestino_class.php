<?php


  class BuscarDestino{

    public function __construct()
    {
        //Inclui o arquivo de conexão com o banco de dados.
        require_once('models/db_class.php');
        //Instancia a classe Mysql_db.
        $conexao_db = new Mysql_db;
        //Chama o método conectar para estabelecer a conexão com o BD.
        $conexao_db->conectar();
    }

    public function SelectByDestino($buscarDestino){

      $sql = "select * from vw_buscardestino where cidade like '%".$buscarDestino->destino."%'";



      $cont = 0;

      $select = mysql_query($sql);

      while ($rs=mysql_fetch_array($select)) {

        $listar[] = new BuscarDestino();

        $listar[$cont]->nomeCliente = $rs['nomeCliente'];
        $listar[$cont]->mensagem = $rs['mensagem'];
        $listar[$cont]->cidade = $rs['cidade'];

        $cont++;
      }

      if(mysql_num_rows($select)>0){
        return $listar;
      }else {
        echo "Nenhum Comentário Encontrado";
      }


    }


  }


 ?>
