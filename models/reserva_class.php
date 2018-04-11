<?php

    class Reserva
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

        public function SelectQuarto(){

            $sql = "select q.nome, q.valorDiario,q.maxHospedes,i.caminhoImagem,h.hotel,h.checkin,h.checkout,l.logradouro,l.numero,b.bairro,c.cidade,e.uf
                    from tbl_quarto as q
                    inner join tbl_hotel as h
                    on q.idHotel = h.idHotel
                    inner join tbl_imagem as i
                    on q.idImagem = i.idImagem
                    inner join tbl_logradouro as l
                    on h.idLogradouro = l.idLogradouro
                    inner join tbl_bairro as b
                    on l.idBairro = b.idBairro
                    inner join tbl_cidade as c
                    on b.idCidade = c.idCidade
                    inner join tbl_estado as e
                    on c.idEstado = e.idEstado where q.idQuarto =".$this->idQuarto.";";

            $select = mysql_query($sql);

            if($rs = mysql_fetch_array($select)){

                $lstquarto = new Reserva();

                $lstquarto->nomeQuarto = $rs['nome'];
                $lstquarto->valorDiario = $rs['valorDiario'];
                $lstquarto->maxHospedes = $rs['maxHospedes'];

                $lstquarto->caminhoImagem = $rs['caminhoImagem'];
                $lstquarto->nomeHotel = $rs['hotel'];
                $lstquarto->checkin = $rs['checkin'];
                $lstquarto->checkout = $rs['checkout'];
                $lstquarto->logradouro = $rs['logradouro'];
                $lstquarto->numero = $rs['numero'];
                $lstquarto->bairro = $rs['bairro'];
                $lstquarto->cidade = $rs['cidade'];
                $lstquarto->uf = $rs['uf'];

                return $lstquarto;

            }

        }

        public function SelectDescontoMilhas(){
            $sql = "select m.* , c.milhasPontuacao from tbl_milhasrecompensa as m inner join tbl_cliente as c where c.idCliente =".$this->idCliente.";";
            $select = mysql_query($sql);

            $cont = 0;
            while($rs = mysql_fetch_array($select)){

                $lstdesconto[] = new Reserva();

                $lstdesconto[$cont]->valorPontos = $rs['valorPontos'];
                $lstdesconto[$cont]->milhasPontuacao = $rs['milhasPontuacao'];
                $lstdesconto[$cont]->desconto = $rs['desconto'];

                $cont++;


            }
            return $lstdesconto;

        }


        public function InserirReserva(){

            $sql = "select * from tbl_transacao WHERE idQuarto =".$this->idQuarto." and (('".$this->dataEntrada."' between dataInicio and dataFim) or ('".$this->dataSaida."' between dataInicio and dataFim)) and status='Aprovado' or 'Pendente';";
            echo($sql);
            $select = mysql_query($sql);

            if(mysql_num_rows($select) > 0){

                header('location:reserva.php?datainvalida');


            }else{

                $dataEntrada = strtotime($this->dataEntrada);
                $dataSaida = strtotime($this->dataSaida);

                if($dataSaida <= $dataEntrada ){
                    header('location:reserva.php?datainvalida');
                }else{
                    date_default_timezone_set("America/Sao_Paulo");
                    $datetime = date('Y-m-d H:i:s');
                    $sql = "insert into tbl_cartao(numeroCartao,numeroSeguranca, validade,nomeTitular) values('".$this->numCartao."','".$this->codSeguranca."','".$this->validade."','".$this->nomeTitular."');";
                    mysql_query($sql) or die(mysql_error());
                    $sql = "select LAST_INSERT_ID() as idCartao";
                    $select = mysql_query($sql);
                    if($rs=mysql_fetch_array($select)){

                        $valorTotal = $this->valorDiario;


                        $dias = $dataSaida-$dataEntrada;
                        $qtdDias = floor($dias / (60 * 60 * 24));
                        echo $qtdDias;

                        $valorTotal = $valorTotal * $qtdDias;
                        $taxa = ($valorTotal * 10)/100;

                        $valorTotal = $valorTotal + $taxa;

                        $desconto = ($valorTotal * $this->desconto)/100;



                        $valorTotal = $valorTotal - $desconto;

                        $idCartao = $rs['idCartao'];
                        $sql = "insert into tbl_transacao(dataInicio,dataFim,desconto,vlrTotal,dtTransacao,status,idCartao,idQuarto,idCliente,idPlataforma)
                                values('".$this->dataEntrada."','".$this->dataSaida."',".$this->desconto.",".$valorTotal.",'".$datetime."','Pendente',".$idCartao.",".$this->idQuarto." ,".$this->idCliente.",1);";
                        mysql_query($sql) or die(mysql_error());
                        $sql = "update tbl_cliente set milhasPontuacao = milhasPontuacao - ".$this->valorPoints." where idCliente =".$this->idCliente.";";
                        mysql_query($sql) or die(mysql_error());

                        header('location:perfilUsuario.php');

                    }
                }

            }

        }


    }


?>
