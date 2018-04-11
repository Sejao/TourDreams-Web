<?php

    class Home
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

        public function UpdateHomeBg(){
            $sql = "select idHomeBg from tbl_homepage;";
            $select= mysql_query($sql);
            if($rs = mysql_fetch_array($select)){
                $idHomeBg = $rs['idHomeBg'];


                $sql = "update tbl_imagem set caminhoImagem ='".$this->caminhoImg."' where idImagem=".$idHomeBg.";";
                mysql_query($sql) or die(mysql_error());
            }
        }

        public function UpdateHomeMilhas(){
            $sql = "select idHomeMilhas from tbl_homepage;";
            $select= mysql_query($sql);
            if($rs = mysql_fetch_array($select)){
                $idHomeMilhas = $rs['idHomeMilhas'];


                $sql = "update tbl_imagem set caminhoImagem ='".$this->caminhoImg."' where idImagem=".$idHomeMilhas.";";
                mysql_query($sql) or die(mysql_error());
            }
        }

        public function UpdateHomeMelhoresDestinos(){
            $sql = "select idHomeMelhoresDestinos from tbl_homepage;";
            $select= mysql_query($sql);
            if($rs = mysql_fetch_array($select)){
                $idHomeMelhoresDestinos = $rs['idHomeMelhoresDestinos'];


                $sql = "update tbl_imagem set caminhoImagem ='".$this->caminhoImg."' where idImagem=".$idHomeMelhoresDestinos.";";
                mysql_query($sql) or die(mysql_error());
            }
        }

        public function UpdateHomeNorte(){
            $sql = "select idHomeNorte from tbl_homepage;";
            $select= mysql_query($sql);
            if($rs = mysql_fetch_array($select)){
                $idHomeNorte = $rs['idHomeNorte'];


                $sql = "update tbl_imagem set caminhoImagem ='".$this->caminhoImg."' where idImagem=".$idHomeNorte.";";
                mysql_query($sql) or die(mysql_error());
            }
        }

        public function UpdateHomeNordeste(){
            $sql = "select idHomeNordeste from tbl_homepage;";
            $select= mysql_query($sql);
            if($rs = mysql_fetch_array($select)){
                $idHomeNordeste = $rs['idHomeNordeste'];


                $sql = "update tbl_imagem set caminhoImagem ='".$this->caminhoImg."' where idImagem=".$idHomeNordeste.";";
                mysql_query($sql) or die(mysql_error());
            }
        }

        public function UpdateHomeCentroOeste(){
            $sql = "select idHomeCentroOeste from tbl_homepage;";
            $select= mysql_query($sql);
            if($rs = mysql_fetch_array($select)){
                $idHomeCentroOeste = $rs['idHomeCentroOeste'];


                $sql = "update tbl_imagem set caminhoImagem ='".$this->caminhoImg."' where idImagem=".$idHomeCentroOeste.";";
                mysql_query($sql) or die(mysql_error());
            }
        }

        public function UpdateHomeSudeste(){
            $sql = "select idHomeSudeste from tbl_homepage;";
            $select= mysql_query($sql);
            if($rs = mysql_fetch_array($select)){
                $idHomeSudeste = $rs['idHomeSudeste'];


                $sql = "update tbl_imagem set caminhoImagem ='".$this->caminhoImg."' where idImagem=".$idHomeSudeste.";";
                mysql_query($sql) or die(mysql_error());
            }
        }

        public function UpdateHomeSul(){
            $sql = "select idHomeSul from tbl_homepage;";
            $select= mysql_query($sql);
            if($rs = mysql_fetch_array($select)){
                $idHomeSul = $rs['idHomeSul'];


                $sql = "update tbl_imagem set caminhoImagem ='".$this->caminhoImg."' where idImagem=".$idHomeSul.";";
                mysql_query($sql) or die(mysql_error());
            }
        }





    }

?>
