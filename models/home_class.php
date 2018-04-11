<?php

    class Home{
        public function __construct()

        {
            //Inclui o arquivo de conexão com o banco de dados.
            require_once('models/db_class.php');
            //Instancia a classe Mysql_db.
            $conexao_db = new Mysql_db;
            //Chama o método conectar para estabelecer a conexão com o BD.
            $conexao_db->conectar();
        }

        public function SelectHome(){

            $sql = "select * from vw_homepage;";

            $select = mysql_query($sql);

            $lista ="";
            while($rs = mysql_fetch_array($select)){

                $listaHome = new Home();
                $lista=$lista.$listaHome->imgHome = $rs['caminhoImagem'].'*';

            }

            return $lista;

        }

    }

?>
