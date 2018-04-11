<?php

    class BuscaRegiao
    {

        public function __construct()
        {
            //Inclui o arquivo de conexão com o banco de dados.
            require_once('models/db_class.php');
            //Instancia a classe Mysql_db.
            $conexao_db = new Mysql_db;
            //Chama o método conectar para estabelecer a conexão com o BD.
            $conexao_db->conectar();
        }


        public function selectByRegiao(){

            $sql="Select * from vw_buscarapida where regiao = '".$this->regiao."'";

            $cont = 0;

            $select = mysql_query($sql);

            while($rs=mysql_fetch_array($select)){

              $listar[] = new BuscaRegiao();

              $listar[$cont]->nomeParceiro = $rs['nomeParceiro'];
              $listar[$cont]->idHotel = $rs['idHotel'];
              $listar[$cont]->hotel = $rs['hotel'];
              $listar[$cont]->cidade= $rs['cidade'];
              $listar[$cont]->preco= $rs['valorDiario'];
              $listar[$cont]->qtdEstrelas= $rs['qtdEstrelas'];
              $listar[$cont]->rua = $rs['logradouro'];
              $listar[$cont]->bairro = $rs['bairro'];
              $listar[$cont]->imagemHotel = $rs['caminhoImagem'];

              $cont++;
            }

            if (mysql_num_rows($select)>0) {
              return $listar;
            }else {
              echo "<h1>Não foi encontrado nenhum hotel neste local!</h1>";
            }

        }

    }


?>
