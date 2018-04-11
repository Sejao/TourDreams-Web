<?php

  class ConhecaseuDestino{

    public $idHotel;
    public $hotel;
    public $qtdEstrelas;
    public $descricao;
    public $logradouro;
    public $numero;
    public $bairro;
    public $cidade;
    public $uf;
    public $valorMinimo;

    public function __construct()
    {
        //Inclui o arquivo de conexão com o banco de dados.
        require_once('models/db_class.php');
        //Instancia a classe Mysql_db.
        $conexao_db = new Mysql_db;
        //Chama o método conectar para estabelecer a conexão com o BD.
        $conexao_db->conectar();
    }



    public function Select(){
      $sql = "SELECT * FROM vw_conhecaseudestino;";
      $select = mysql_query($sql);

        $cont=0;
        while($rs=mysql_fetch_array($select))
        {
            $conhecaseuDestino[] = new ConhecaseuDestino();

            $conhecaseuDestino[$cont]->idHotel=$rs['idHotel'];
            $conhecaseuDestino[$cont]->hotel=$rs['hotel'];
            $conhecaseuDestino[$cont]->qtdEstrelas=$rs['qtdEstrelas'];
            $conhecaseuDestino[$cont]->descricao=$rs['descricao'];
            $conhecaseuDestino[$cont]->logradouro=$rs['logradouro'];
            $conhecaseuDestino[$cont]->numero=$rs['numero'];
            $conhecaseuDestino[$cont]->bairro=$rs['bairro'];
            $conhecaseuDestino[$cont]->cidade=$rs['cidade'];
            $conhecaseuDestino[$cont]->uf=$rs['uf'];
            $conhecaseuDestino[$cont]->valorMinimo=$rs['valorMinimo'];
            $conhecaseuDestino[$cont]->valorMinimo = str_replace('.', ',', $conhecaseuDestino[$cont]->valorMinimo);
            $conhecaseuDestino[$cont]->caminhoImagem=$rs['caminhoImagem'];

        $cont++;
        }
         return  $conhecaseuDestino;
    }


    public function SelectImagem(){

      $sql = " select * from vw_paginaconheca;";
      $select = mysql_query($sql);

      if($rs=mysql_fetch_array($select)){

        $listarImagem = new ConhecaseuDestino();
        $listarImagem->caminhoImagem=$rs['caminhoImagem'];

        return $listarImagem;


      }


    }

  }



 ?>
