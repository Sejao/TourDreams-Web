<?php

  class ControllerConheca{

    public function EditarConheca(){

      require_once('models/paginaConhecaSeuDestino_class.php');



      $Conheca_class = new Conheca();
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
          if (isset( $_FILES[ 'fileFotos' ][ 'name' ] ) && $_FILES[ 'fileFotos' ][ 'error' ] == 0 ) {
            $arquivo_tmp = $_FILES[ 'fileFotos' ][ 'tmp_name' ];
            $nome = $_FILES[ 'fileFotos' ][ 'name' ];

            // Pega a extensão
            $extensao = pathinfo ( $nome, PATHINFO_EXTENSION );


            $extensao = strtolower ( $extensao );

            if ( strstr ( '.jpg;.jpeg;.gif;.png', $extensao ) ) {
                $novoNome = 'Conheca' . '.' . $extensao;


        
                $destino = '../imagens/conheca/' . $novoNome;


           
                if ( @move_uploaded_file ( $arquivo_tmp, $destino ) ) {

                   $destinoBanco = 'imagens/conheca/' . $novoNome;
                   $Conheca_class->caminhoImg = $destinoBanco;
                   $Conheca_class->UpDateConheca();

                  header('location:paginaConhecaSeuDestino.php');
                    

              }else{

                   

                    header('location:cms.php?erro');
              }



            }

          }
        }
      }

      public function ListarConheca(){

        require_once('models/paginaConhecaSeuDestino_class.php');

        $listConheca = new Conheca();

        return $listConheca->SelectConheca();


      }


    }
?>
