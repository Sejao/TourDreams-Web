<?php

    class ControllerHotel
    {


        public function Inserir(){

            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                $nomeHotel = $_POST['txtNomeHotel'];
                $checkIn = $_POST['txtCheckin'];
                $checkOut = $_POST['txtCheckout'];
                $tipoEstadia = $_POST['sltEstadia'];
                $qtdEstrelas = $_POST['sltEstrela'];
                $qtdImagens = $_POST['txtQtdImg'];
                $logradouro = $_POST['txtLogradouro'];
                $numero = $_POST['txtNumero'];
                $bairro = $_POST['txtBairro'];
                $cidade = $_POST['sltCidade'];
                $descricaoHotel = $_POST['txtDescricao'];
                $idParceiro = $_GET['idParceiro'];


                require_once('models/hotel_class.php');
                $hotel_class = new Hotel();

                $hotel_class->nomeHotel = addslashes($nomeHotel);
                $hotel_class->checkIn = $checkIn;
                $hotel_class->checkOut = $checkOut;
                $hotel_class->tipoEstadia = $tipoEstadia;
                $hotel_class->logradouro=addslashes($logradouro);
                $hotel_class->numero=$numero;
                $hotel_class->bairro=addslashes($bairro);
                $hotel_class->cidade=$cidade;
                $hotel_class->qtdEstrelas = $qtdEstrelas;
                $hotel_class->descricaoHotel = addslashes($descricaoHotel);
                $hotel_class->idParceiro = $idParceiro;

                $idHotel = $hotel_class->InsertHotel($hotel_class);


                $cont = 0;
                while($cont<$qtdImagens){

                    $name = $_FILES['fileFoto'.$cont]['name'];
                    $arquivo_tmp = $_FILES[ 'fileFoto'.$cont ][ 'tmp_name' ];

                    $extensao = pathinfo ( $name, PATHINFO_EXTENSION );


                    $extensao = strtolower ( $extensao );

                          $destino = 'imagens/hotel/' . $name;

                          if ( @move_uploaded_file ( $arquivo_tmp, $destino ) ) {

                              $hotel_imagem = new Hotel();
                              $hotel_imagem->caminhoImagem = $destino;
                              $hotel_imagem->idHotel = $idHotel;
                              $hotel_imagem->InsertImagem($hotel_imagem);


                          }


                      $cont++;

                }

                if(isset($_POST['comodidade'])){

                    foreach ($_POST['comodidade'] as $comodidade) {

                        $hotel_comodidade = new Hotel();
                        $hotel_comodidade->comodidade = $comodidade;
                        $hotel_comodidade->idHotel = $idHotel;
                        $hotel_comodidade->InsertComodidade($hotel_comodidade);
                        //header('location:perfilParceiro.php?idParceiro='.$idParceiro);
                    }

                }


            }

        }


        public function Comodidades(){

            require_once('models/hotel_class.php');

            $lstComodidade = new Hotel();
            return $lstComodidade->SelectComodidades();



        }

        public function Estadia(){

            require_once('models/hotel_class.php');

            $lstEstadias = new Hotel();
            return $lstEstadias->SelectEstadias();



        }

        public function CidadeUF(){

            require_once('models/hotel_class.php');

            $lstCidades = new Hotel();
            return $lstCidades->SelectCidades();



        }
        public function Estado(){

            require_once('models/hotel_class.php');

            $lstEstados = new Hotel();
            return $lstEstados->SelectEstados();



        }

        public function Deletar(){

            require_once('models/hotel_class.php');
            $idHotel = $_GET['idHotel'];
            $idParceiro = $_GET['idParceiro'];



            $hotel_imagem = new Hotel();
            $hotel_imagem->idHotel = $idHotel;
            $hotel_imagem->ExcluirImagem();

            $hotel_class = new Hotel();
            $hotel_class->idHotel = $idHotel;
            $hotel_class->ExcluirHotel();



            header('location:perfilParceiro.php?idParceiro='.$idParceiro);
        }




    }




 ?>
