<?php

  class ControllerLanding{

    public function EditarLanding(){

      require_once('models/paginaLanding_class.php');



      $landing_class = new Landing();
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
          if (isset( $_FILES[ 'fileFotoss' ][ 'name' ] ) && $_FILES[ 'fileFotoss' ][ 'error' ] == 0 ) {
            $arquivo_tmp = $_FILES[ 'fileFotoss' ][ 'tmp_name' ];
            $nome = $_FILES[ 'fileFotoss' ][ 'name' ];

            // Pega a extensão
            $extensao = pathinfo ( $nome, PATHINFO_EXTENSION );

            // Converte a extensão para minúsculo
            $extensao = strtolower ( $extensao );

            if ( strstr ( '.jpg;.jpeg;.gif;.png', $extensao ) ) {
                $novoNome = 'Landing' . '.' . $extensao;


                // Concatena a pasta com o nome
                $destino = '../imagens/landingPage/' . $novoNome;


                // tenta mover o arquivo para o destino
                if ( @move_uploaded_file ( $arquivo_tmp, $destino ) ) {

                   $destinoBanco = 'imagens/landingPage/' . $novoNome;
                   
                   echo ($landing_class->caminhoImg);
                   $landing_class->caminhoImg = $destinoBanco;
                   $landing_class->UpDateLanding();

                   header('location:paginaLanding.php');

              }else{

                    header('location:paginaLanding.php?erro');
              }



            }

          }
        }
      }

      public function ListarImagemLanding(){

        require_once('models/paginaLanding_class.php');

        $listLanding = new Landing();

        return $listLanding->SelectLading();


      }


    }
?>
