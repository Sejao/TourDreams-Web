<?php

    class TipoEstadia{

        public function __construct()
        {
            //Inclui o arquivo de conexão com o banco de dados.
            require_once('models/db_class.php');
            //Instancia a classe Mysql_db.
            $conexao_db = new Mysql_db;
            //Chama o método conectar para estabelecer a conexão com o BD.
            $conexao_db->conectar();
        }


        public function SelectAll(){

            $sql="select * from tbl_tipodeestadia;";
            $select = mysql_query($sql);

            $cont = 0;
            while($rs = mysql_fetch_array($select)){

                $listestadia[] = new TipoEstadia();

                $listestadia[$cont]->idTipoEstadia = $rs['idTipoEstadia'];
                $listestadia[$cont]->estadia = $rs['estadia'];

                $cont++;

            }

            return $listestadia;
        }

        public function InsertEstadia(){
            $sql = 'insert into tbl_tipodeestadia(estadia) values("'.$this->estadia.'")';
            mysql_query($sql);
        }

        public function DeleteEstadia(){
            $sql = "delete from tbl_tipodeestadia where idTipoEstadia=".$this->idEstadia.";";
            mysql_query($sql);
        }

        public function SelectById(){
            $sql = "select * from tbl_tipodeestadia where idTipoEstadia=".$this->idEstadia.";";
            $select = mysql_query($sql);

            if($rs = mysql_fetch_array($select)){
                $listaestadia = new TipoEstadia();

                $listaestadia->estadia=$rs['estadia'];
                $listaestadia->idEstadia=$rs['idTipoEstadia'];

                return $listaestadia;

            }

        }

        public function UpdateEstadia(){
            $sql = "update tbl_tipodeestadia set estadia='".$this->estadia."' where idTipoEstadia=".$this->idEstadia.";";
            mysql_query($sql);
        }


    }

?>
