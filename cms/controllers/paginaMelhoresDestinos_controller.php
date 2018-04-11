<?php

  class ControllerMelhores{

    public function EditarMelhores(){


      require_once('models/paginaMelhoresDestinos_class.php');


      $melhores_class = new MelhoresDestinos();
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
          if (isset( $_FILES[ 'fileFotos' ][ 'name' ] ) && $_FILES[ 'fileFotos' ][ 'error' ] == 0 ) {
            $arquivo_tmp = $_FILES[ 'fileFotos' ][ 'tmp_name' ];
            $nome = $_FILES[ 'fileFotos' ][ 'name' ];

            // Pega a extensão
            $extensao = pathinfo ( $nome, PATHINFO_EXTENSION );

            // Converte a extensão para minúsculo
            $extensao = strtolower ( $extensao );

            if ( strstr ( '.jpg;.jpeg;.gif;.png', $extensao ) ) {
                $novoNome = 'MelhoresDestinos' . '.' . $extensao;


                // Concatena a pasta com o nome
                $destino = '../imagens/melhoresDestinos/' . $novoNome;


                // tenta mover o arquivo para o destino
                if ( @move_uploaded_file ( $arquivo_tmp, $destino ) ) {

                   $destinoBanco = 'imagens/melhoresDestinos/' . $novoNome;
                   $melhores_class->caminhoImg = $destinoBanco;
                   $melhores_class->UpDateMelhores();

                   header('location:paginaMelhoresDestinos.php');

              }else{

                    header('location:paginaMelhoresDestinos.php?erro');
              }
            }
          }
        }
      }
        public function ListarImagemMelhores(){

          require_once('models/paginaMelhoresDestinos_class.php');
          $ListMelhores = new MelhoresDestinos();

          return $ListMelhores->SelectMelhoresDestinos();


        }


    }



 ?>
