<?php

    class PerfilParceiro{

        public $idParceiro;

        public function __construct()
        {
            //Inclui o arquivo de conexão com o banco de dados.
            require_once('models/db_class.php');
            //Instancia a classe Mysql_db.
            $conexao_db = new Mysql_db;
            //Chama o método conectar para estabelecer a conexão com o BD.
            $conexao_db->conectar();
        }

        public function SelecionarHoteis(){
            $sql = "select h.idHotel, h.hotel, h.qtdEstrelas, t.estadia from tbl_hotel as h inner join tbl_tipodeestadia as t on h.idTipoEstadia = t.idTipoEstadia where h.idParceiro =".$this->idParceiro." order by qtdEstrelas desc";
            $select = mysql_query($sql);

            $cont = 0;
            while($rs = mysql_fetch_array($select)){

                $listHotel[] = new PerfilParceiro();

                $listHotel[$cont]->hotel = $rs['hotel'];
                $listHotel[$cont]->qtdEstrelas = $rs['qtdEstrelas'];
                $listHotel[$cont]->tipoEstadia = $rs['estadia'];
                $listHotel[$cont]->idHotel = $rs['idHotel'];

                $cont++;

            }
            if(mysql_num_rows($select)>0){
                return $listHotel;
            }else{

            }
        }

        public function SelectComodidades(){
            $sql = "select * from tbl_comodidadesquarto";
            $select = mysql_query($sql);

            $cont = 0;

            while($rs = mysql_fetch_array($select)){

                $comodidades[] = new PerfilParceiro();

                $comodidades[$cont]->idComodidade = $rs['idComodidade'];
                $comodidades[$cont]->nomeComodidade = $rs['nomeComodidade'];

                $cont++;

            }

            return $comodidades;
        }

        public function SelectPendentes(){

            $sql = "select t.*, c.nomeCliente, h.hotel, q.nome
                    from tbl_transacao as t
                    inner join tbl_cliente as c
                    on t.idCliente = c.idCliente
                    inner join tbl_quarto as q
                    on t.idQuarto = q.idQuarto
                    inner join tbl_hotel as h
                    on q.idHotel = h.idHotel
                    where h.idParceiro =".$this->idParceiro." and status = 'Pendente' order by t.idTransacao desc;";

            $select = mysql_query($sql);

            $cont = 0;
            $listaPendentes[] = new PerfilParceiro();


            if(mysql_num_rows($select)>0){

                while($rs = mysql_fetch_array($select)){



                    @$listaPendentes[$cont]->hotel = $rs['hotel'];
                    @$listaPendentes[$cont]->nome = $rs['nome'];
                    @$listaPendentes[$cont]->idTransacao = $rs['idTransacao'];
                    @$listaPendentes[$cont]->nomeCliente = $rs['nomeCliente'];
                    @$listaPendentes[$cont]->dataEntrada = $rs['dataInicio'];
                    @$listaPendentes[$cont]->dataSaida = $rs['dataFim'];
                    @$listaPendentes[$cont]->valorTotal = $rs['vlrTotal'];
                    @$listaPendentes[$cont]->status = $rs['status'];

                    $cont++;
                }

                return $listaPendentes;
            }else{
                echo '<h1 id="msg">Não há reservas pendentes!</h1>';
            }

        }


        public function SelectAprovadas(){

            $sql = "select t.*, c.nomeCliente, h.hotel, q.nome
                    from tbl_transacao as t
                    inner join tbl_cliente as c
                    on t.idCliente = c.idCliente
                    inner join tbl_quarto as q
                    on t.idQuarto = q.idQuarto
                    inner join tbl_hotel as h
                    on q.idHotel = h.idHotel
                    where h.idParceiro =".$this->idParceiro." and status <> 'Pendente' order by t.idTransacao desc;";

            $select = mysql_query($sql);

            $cont = 0;
            $listaAprovadas[] = new PerfilParceiro();


            if(mysql_num_rows($select)>0){

                while($rs = mysql_fetch_array($select)){



                    @$listaAprovadas[$cont]->hotel = $rs['hotel'];
                    @$listaAprovadas[$cont]->nome = $rs['nome'];
                    @$listaAprovadas[$cont]->idTransacao = $rs['idTransacao'];
                    @$listaAprovadas[$cont]->nomeCliente = $rs['nomeCliente'];
                    @$listaAprovadas[$cont]->dataEntrada = $rs['dataInicio'];
                    @$listaAprovadas[$cont]->dataSaida = $rs['dataFim'];
                    @$listaAprovadas[$cont]->valorTotal = $rs['vlrTotal'];
                    @$listaAprovadas[$cont]->status = $rs['status'];

                    $cont++;
                }

                return $listaAprovadas;
            }else{
                echo '<h1 id="msg">Não há reservas aprovadas!</h1>';
            }

        }

        public function InsertAprovacao(){

            $sql = "update tbl_transacao set status='Aprovado' where idTransacao=".$this->idTransacao.";";
            mysql_query($sql) or die(mysql_error());


        }

        public function InsertReprovacao(){

            $sql = "update tbl_transacao set status='Reprovado' where idTransacao=".$this->idTransacao.";";
            mysql_query($sql) or die(mysql_error());


        }

        public function Delete(){

            $sql = "delete from tbl_transacao where idTransacao=".$this->idTransacao.";";
            mysql_query($sql) or die(mysql_error());


        }

    }

?>
