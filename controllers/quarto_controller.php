<?php

    class ControllerQuarto
    {

        public function Inserir(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                $nome = $_POST['txtNomeQuarto'];
                $vlrDiario = $_POST['txtDiaria'];
                $maxHosp = $_POST['txtMaxHosp'];

                $descricao = $_POST['txtDescricaoQuarto'];
                $idParceiro = $_GET['idParceiro'];
                $idHotel = $_POST['idHotel'];

                require_once('models/quarto_class.php');

                $quarto_class = new Quarto();

                $quarto_class->nome = $nome;
                $quarto_class->vlrDiario = $vlrDiario;
                $quarto_class->maxHosp = $maxHosp;

                $quarto_class->idHotel = $idHotel;
                $quarto_class->descricao = $descricao;

                if (isset( $_FILES[ 'fileImg' ][ 'name' ] ) && $_FILES[ 'fileImg' ][ 'error' ] == 0 ) {
                  $arquivo_tmp = $_FILES[ 'fileImg' ][ 'tmp_name' ];
                  $nome = $_FILES[ 'fileImg' ][ 'name' ];

                  $extensao = pathinfo ( $nome, PATHINFO_EXTENSION );

                  $extensao = strtolower ( $extensao );

                  if ( strstr ( '.jpg;.jpeg;.gif;.png', $extensao ) ) {

                      $destino = 'imagens/quarto/' . $nome;

                      // tenta mover o arquivo para o destino
                      if ( @move_uploaded_file ( $arquivo_tmp, $destino ) ) {
                         $quarto_class->caminhoImg = $destino;
                         $idQuarto = $quarto_class->InsertQuarto();


                         if(isset($_POST['comodidadeQuarto'])){

                             foreach ($_POST['comodidadeQuarto'] as $comodidade) {

                                 $quarto_comodidade = new Quarto();
                                 $quarto_comodidade->comodidade = $comodidade;
                                 $quarto_comodidade->idQuarto = $idQuarto;
                                 $quarto_comodidade->InsertComodidade();

                                 header('location:perfilParceiro.php?idParceiro='.$idParceiro);
                             }

                         }


                      }
                  }
                }
            }

        }

        public function Excluir(){
            $idQuarto=$_GET['idQuarto'];
            $idParceiro = $_GET['idParceiro'];

            require_once('models/quarto_class.php');
            $quarto_class = new Quarto();
            $quarto_class->idQuarto=$idQuarto;
            $quarto_class->Deletar();


            header('location:perfilParceiro.php?idParceiro='.$idParceiro);
        }

        public function Visualizar(){
            require_once('models/quarto_class.php');

            $idQuarto = $_GET['idQuarto'];

            $lstQuarto = new Quarto();
            $lstQuarto->idQuarto = $idQuarto;
            $resposta = $lstQuarto->SelectById();



            require_once('perfilParceiro.php');

            ?>

                <script type="text/javascript">
                    abrirModalQuarto1();
                </script>

            <?php

        }

        public function VisualizarComodidade(){
            $idQuarto = $_GET['idQuarto'];
            require_once('models/quarto_class.php');
            $lstComodidade = new Quarto();
            $lstComodidade->idQuarto = $idQuarto;
            return $lstComodidade->SelectComodidade();
        }

        public function Editar(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                $nome = $_POST['txtNomeQuarto'];
                $vlrDiario = $_POST['txtDiaria'];
                $maxHosp = $_POST['txtMaxHosp'];

                $descricao = $_POST['txtDescricaoQuarto'];
                $idParceiro = $_GET['idParceiro'];
                $idHotel = $_POST['idHotel'];
                $idQuarto = $_GET['idQuarto'];


                require_once('models/quarto_class.php');

                $quarto_class = new Quarto();

                $quarto_class->nome = $nome;
                $quarto_class->vlrDiario = $vlrDiario;
                $quarto_class->maxHosp = $maxHosp;

                $quarto_class->idHotel = $idHotel;
                $quarto_class->descricao = $descricao;
                $quarto_class->idQuarto = $idQuarto;



                if (isset( $_FILES[ 'fileImg' ][ 'name' ] ) && $_FILES[ 'fileImg' ][ 'error' ] == 0 ) {
                  $arquivo_tmp = $_FILES[ 'fileImg' ][ 'tmp_name' ];
                  $nome = $_FILES[ 'fileImg' ][ 'name' ];

                  $extensao = pathinfo ( $nome, PATHINFO_EXTENSION );

                  $extensao = strtolower ( $extensao );

                  if ( strstr ( '.jpg;.jpeg;.gif;.png', $extensao ) ) {

                      $destino = 'imagens/quarto/' . $nome;

                      // tenta mover o arquivo para o destino
                      if ( @move_uploaded_file ( $arquivo_tmp, $destino ) ) {
                         $quarto_class->caminhoImg = $destino;
                         $quarto_class->UpdateQuartoImagem();


                         if(isset($_POST['comodidadeQuarto'])){

                             foreach ($_POST['comodidadeQuarto'] as $comodidade) {

                                 $quarto_comodidade = new Quarto();
                                 $quarto_comodidade->comodidade = $comodidade;
                                 $quarto_comodidade->idQuarto = $idQuarto;
                                 $quarto_comodidade->UpdateComodidade();

                                 header('location:perfilParceiro.php?idParceiro='.$idParceiro);
                             }

                         }


                      }
                  }
              }else{
                  if(isset($_POST['comodidadeQuarto'])){

                      foreach ($_POST['comodidadeQuarto'] as $comodidade) {

                          $quarto_comodidade = new Quarto();
                          $quarto_comodidade->comodidade = $comodidade;
                          $quarto_comodidade->idQuarto = $idQuarto;
                          $quarto_comodidade->UpdateComodidade();

                          $quarto_class->UpdateQuarto();


                          header('location:perfilParceiro.php?idParceiro='.$idParceiro);
                      }
                  }
              }

          }
      }



    }
?>
