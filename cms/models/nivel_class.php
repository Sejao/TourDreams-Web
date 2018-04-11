<?php

    class Nivel
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

        public function SelectAll(){

            $sql="select * from tbl_nivelfuncionario";
            $select = mysql_query($sql);

            $cont = 0;

            while($rs = mysql_fetch_array($select)){

                $listNivel[] = new Nivel();

                $listNivel[$cont]->nivel=$rs['nivel'];
                $listNivel[$cont]->idNivel=$rs['idNivelFuncionario'];

                $cont++;

            }

            return $listNivel;


        }

        public function InsertNivel(){
            $sql = "insert into tbl_nivelfuncionario(nivel) values('".$this->nivel."');";
            mysql_query($sql);
        }

        public function DeletarNivel(){
            $sql = "delete from tbl_nivelfuncionario where idNivelFuncionario=".$this->idNivel.";";
            mysql_query($sql);
        }

        public function SelectById(){
            $sql="select * from tbl_nivelfuncionario where idNivelFuncionario=".$this->idNivel.";";
            $select = mysql_query($sql);



            if($rs = mysql_fetch_array($select)){

                $listanivel = new Nivel();

                $listanivel->nivel=$rs['nivel'];
                $listanivel->idNivel=$rs['idNivelFuncionario'];



            }

            return $listanivel;
        }

        public function Update(){
            $sql = "update tbl_nivelfuncionario set nivel ='".$this->nivel."' where idNivelFuncionario=".$this->idNivel.";";
            echo $sql;
            mysql_query($sql);
        }


    }
?>
