<?php

    class TipoLocal
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

            $sql="select * from tbl_tipodelocal where idTipoDeLocal <> 1;";
            $select = mysql_query($sql);

            $cont = 0;
            while($rs = mysql_fetch_array($select)){

                $listlocal[] = new TipoLocal();

                $listlocal[$cont]->idTipoLocal= $rs['idTipoDeLocal'];
                $listlocal[$cont]->local = $rs['TipoDeLocal'];

                $cont++;

            }

            return $listlocal;
        }



        public function SelectCidadeLocal(){

            $sql="select c.idCidade,c.cidade,e.uf, t.tipodelocal
                    from tbl_cidade as c
                    inner join tbl_tipodelocal as t
                    on c.idTipoDeLocal = t.idTipoDeLocal
                    inner join tbl_estado as e
                    on c.idEstado = e.idEstado
                    order by cidade asc;";
            $select = mysql_query($sql);

            $cont = 0;
            while($rs = mysql_fetch_array($select)){

                $listcidadelocal[] = new TipoLocal();

                $listcidadelocal[$cont]->tipolocal= $rs['tipodelocal'];
                $listcidadelocal[$cont]->uf= $rs['uf'];
                $listcidadelocal[$cont]->idcidade= $rs['idCidade'];
                $listcidadelocal[$cont]->cidade = $rs['cidade'];

                $cont++;

            }

            return $listcidadelocal;
        }

        public function InsertLocal(){
            $sql = 'insert into tbl_tipodelocal(TipoDeLocal) values("'.$this->local.'")';
            mysql_query($sql);
        }

        public function DeleteLocal(){
            $sql = "delete from tbl_tipodelocal where idTipoDeLocal=".$this->idLocal.";";
            mysql_query($sql);
        }

        public function SelectById(){
            $sql = "select * from tbl_tipodelocal where idTipoDeLocal=".$this->idLocal.";";
            $select = mysql_query($sql);

            if($rs = mysql_fetch_array($select)){
                $listaLocal = new TipoLocal();

                $listaLocal->idTipoLocal=$rs['idTipoDeLocal'];
                $listaLocal->local=$rs['TipoDeLocal'];

                return $listaLocal;

            }
        }

        public function SelectByIdLocalCidade(){
            $sql = "select * from tbl_cidade where idCidade=".$this->idCidade.";";
            $select = mysql_query($sql);

            if($rs = mysql_fetch_array($select)){
                $listaLocalcidade = new TipoLocal();

                $listaLocalcidade->cidade=$rs['cidade'];
                $listaLocalcidade->idCidade=$rs['idCidade'];

                return $listaLocalcidade;

            }
        }

        public function UpdateLocal(){
            $sql = "update tbl_tipodelocal set TipoDeLocal='".$this->local."' where idTipoDeLocal=".$this->idLocal.";";
            mysql_query($sql);
        }

        public function UpdateLocalCidade(){
            $sql = "update tbl_cidade set idTipoDeLocal=".$this->local." where idCidade=".$this->idCidade.";";
            mysql_query($sql);
        }

    }
?>
