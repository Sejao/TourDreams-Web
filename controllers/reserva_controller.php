<?php

    class ControllerReserva
    {


        public function ListarQuarto($idQuarto){

            require_once('models/reserva_class.php');
            $listQuarto = new Reserva();
            $listQuarto->idQuarto = $idQuarto;
            return $listQuarto->SelectQuarto();



        }

        public function listarMilhasDesconto(){
            require_once('models/reserva_class.php');
            $listDesconto = new Reserva();
            $listDesconto->idCliente = $this->idCliente;
            return $listDesconto->SelectDescontoMilhas();

        }

        public function InsertReserva(){



            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                require_once('models/reserva_class.php');

                $dataEntrada = $_POST['dataEntrada'];
                $dataSaida = $_POST['dataSaida'];

                $nomeTitular = $_POST['txtTitular'];
                $numCartao = $_POST['txtNumero'];
                $codSeguranca = $_POST['txtCodigo'];
                $valorDiario = $_POST['txtValorDiario'];
                $descontoBruto = $_POST['radDesconto'];

                $separadorDesconto = explode(",",$descontoBruto);

                $validade = $_POST['txtValidade'];
                $idQuarto = $_POST['txtIdQuarto'];
                $idCliente = $_POST['txtIdCliente'];

                $dataEntradaFormatada = implode('-', array_reverse(explode('/', $dataEntrada)));
                $dataSaidaFormatada = implode('-', array_reverse(explode('/', $dataSaida)));
                // echo $dataEntradaFormatada;

                $reserva_class = new Reserva();

                $reserva_class->dataEntrada = $dataEntradaFormatada;
                $reserva_class->dataSaida = $dataSaidaFormatada;

                $reserva_class->nomeTitular = $nomeTitular;
                $reserva_class->numCartao = $numCartao;
                $reserva_class->valorDiario = $valorDiario;

                $reserva_class->desconto = $separadorDesconto[0];
                $reserva_class->valorPoints = $separadorDesconto[1];
                $reserva_class->codSeguranca = $codSeguranca;
                $reserva_class->validade = $validade;
                $reserva_class->idQuarto = $idQuarto;
                $reserva_class->idCliente = $idCliente;

                $reserva_class->InserirReserva();

                

            }


        }


    }


?>
