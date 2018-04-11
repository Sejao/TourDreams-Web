<?php

    class Quarto
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

        public function InsertQuarto(){

            $sql = "insert into tbl_imagem(caminhoImagem) values('".$this->caminhoImg."')";
            mysql_query($sql);
            $sql = "select LAST_INSERT_ID() as idImagem";
            $select = mysql_query($sql);
            if($rs = mysql_fetch_array($select)){
                $idImagem = $rs['idImagem'];
                $sql = "insert into tbl_quarto(nome,valorDiario,idImagem,descricao,maxHospedes,idHotel)";
                $sql = $sql." values('".$this->nome."',".$this->vlrDiario.",".$idImagem.",'".$this->descricao."',".$this->maxHosp.",".$this->idHotel.")";
                mysql_query($sql);
                $sql = "select LAST_INSERT_ID() as idQuarto";
                $select = mysql_query($sql);
                if($rs = mysql_fetch_array($select)){
                    $idQuarto = $rs['idQuarto'];
                    return $idQuarto;
                }
            }

        }

        public function UpdateQuartoImagem(){
            $sql = "select * from tbl_quarto where idQuarto=".$this->idQuarto.";";

            $select = mysql_query($sql);
            if($rs=mysql_fetch_array($select)){
                $idImagem = $rs['idImagem'];
                $sql = "update tbl_imagem set caminhoImagem='".$this->caminhoImg."' where idImagem=".$idImagem.";";


                mysql_query($sql);
                $sql="delete from tbl_quartocomodidadesquarto where idQuarto=".$this->idQuarto.";";
                mysql_query($sql);
                $sql="update tbl_quarto set nome='".$this->nome."',
                        valorDiario=".$this->vlrDiario.",descricao='".$this->descricao."',
                        maxHospedes=".$this->maxHosp."
                        where idQuarto=".$this->idQuarto.";";

                mysql_query($sql);
            }
        }

        public function UpdateComodidade(){


            $sql = 'select * from tbl_comodidadesquarto;';
            $select = mysql_query($sql);
            echo($sql);
            while($rs = mysql_fetch_array($select)){
                $idComodidade = $rs['idComodidade'];
                $sql = "insert into tbl_quartocomodidadesquarto(idQuarto,idComodidade,status) values(".$this->idQuarto.",".$idComodidade.",0)";
                mysql_query($sql);
                $sql = "update tbl_quartocomodidadesquarto set status = 1 where idQuarto=".$this->idQuarto." and idComodidade=".$this->comodidade.";";
                mysql_query($sql);

            }

        }

        public function UpdateQuarto(){
            $sql="update tbl_quarto set nome='".$this->nome."',
                    valorDiario=".$this->vlrDiario.",descricao='".$this->descricao."',
                    maxHospedes=".$this->maxHosp."
                    where idQuarto=".$this->idQuarto.";";

            mysql_query($sql);
        }

        public function InsertComodidade(){
            $sql = 'select * from tbl_comodidadesquarto';
            $select = mysql_query($sql);

            while($rs = mysql_fetch_array($select)){
                $idComodidade = $rs['idComodidade'];
                $sql = "insert into tbl_quartocomodidadesquarto(idQuarto,idComodidade,status) values(".$this->idQuarto.",".$idComodidade.",0)";
                mysql_query($sql);
                $sql = "update tbl_quartocomodidadesquarto set status = 1 where idQuarto=".$this->idQuarto." and idComodidade=".$this->comodidade.";";
                mysql_query($sql);
            }



        }

        public function Deletar(){
                $sql="delete from tbl_quartocomodidadesquarto where idQuarto=".$this->idQuarto.";";
                mysql_query($sql);
                $sql="delete from tbl_transacao where idQuarto=".$this->idQuarto.";";
                mysql_query($sql);
                $sql = "select * from tbl_quarto where idQuarto=".$this->idQuarto.";";
                $select = mysql_query($sql);
                if($rs=mysql_fetch_array($select)){
                    $idImagem = $rs['idImagem'];
                    $sql = "delete from tbl_quarto where idQuarto=".$this->idQuarto.";";
                    mysql_query($sql);
                    $sql = "delete from tbl_imagem where idImagem=".$idImagem.";";
                    mysql_query($sql);

            }
        }

        public function SelectById(){
            $sql="select * from tbl_quarto where idQuarto=".$this->idQuarto.";";
            $select = mysql_query($sql);

            if($rs = mysql_fetch_array($select)){

                $listaquarto = new Quarto();

                $listaquarto->quarto=$rs['nome'];
                $listaquarto->diaria=$rs['valorDiario'];
                $listaquarto->maxHosp=$rs['maxHospedes'];

                $listaquarto->descricao=$rs['descricao'];
                $listaquarto->idQuarto=$rs['idQuarto'];




            }

            return $listaquarto;

        }

        public function SelectComodidade(){
            //$sql="select * from tbl_quartocomodidadesquarto where idQuarto=".$this->idQuarto." and status = 1;";
            $sql="select tbl_quartocomodidadesquarto.idComodidade, status, nomeComodidade  from tbl_quartocomodidadesquarto INNER JOIN tbl_comodidadesquarto ON tbl_comodidadesquarto.idComodidade=tbl_quartocomodidadesquarto.idComodidade where tbl_quartocomodidadesquarto.idQuarto=".$this->idQuarto.";";
            $select = mysql_query($sql);

            $contador = 0;
            while($rs = mysql_fetch_array($select)){

                $listacomodidade[] = new Quarto();

                $listacomodidade[$contador]->idComodidade=$rs['idComodidade'];
                $listacomodidade[$contador]->nomeComodidade=$rs['nomeComodidade'];
                $listacomodidade[$contador]->status=$rs['status'];

                $contador++;
            }

              return $listacomodidade;
        }

    }

?>
