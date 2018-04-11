<?php

    class ControllerHome
    {

        public function ListarHome(){
            require_once('models/paginahome_class.php');
            $lsthome = new Home();
            return $lsthome->SelectHome();


        }

        public function EditarHome(){

            require_once('models/paginahome_class.php');
            $home_class = new Home();

            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                if (isset( $_FILES[ 'fileBg' ][ 'name' ] ) && $_FILES[ 'fileBg' ][ 'error' ] == 0 ) {
                  $arquivo_tmp = $_FILES[ 'fileBg' ][ 'tmp_name' ];
                  $nome = $_FILES[ 'fileBg' ][ 'name' ];

                  // Pega a extensão
                  $extensao = pathinfo ( $nome, PATHINFO_EXTENSION );

                  // Converte a extensão para minúsculo
                  $extensao = strtolower ( $extensao );

                  if ( strstr ( '.jpg;.jpeg;.gif;.png', $extensao ) ) {
                      $novoNome = 'homeBg' . '.' . $extensao;


                      // Concatena a pasta com o nome
                      $destino = '../imagens/homepage/' . $novoNome;


                      // tenta mover o arquivo para o destino
                      if ( @move_uploaded_file ( $arquivo_tmp, $destino ) ) {

                         $destinoBanco = 'imagens/homepage/' . $novoNome;
                         $home_class->caminhoImg = $destinoBanco;
                         $home_class->UpdateHomeBg();

                    }else{

                          header('location:paginahome.php?erro');
                    }
                }else{
                      header('location:paginahome.php?erroformato');
                }
              }

              if (isset( $_FILES[ 'fileMilhas' ][ 'name' ] ) && $_FILES[ 'fileMilhas' ][ 'error' ] == 0 ) {
                $arquivo_tmp = $_FILES[ 'fileMilhas' ][ 'tmp_name' ];
                $nome = $_FILES[ 'fileMilhas' ][ 'name' ];

                // Pega a extensão
                $extensao = pathinfo ( $nome, PATHINFO_EXTENSION );

                // Converte a extensão para minúsculo
                $extensao = strtolower ( $extensao );

                if ( strstr ( '.jpg;.jpeg;.gif;.png', $extensao ) ) {
                    $novoNome = 'homeMilhas' . '.' . $extensao;


                    // Concatena a pasta com o nome
                    $destino = '../imagens/homepage/' . $novoNome;


                    // tenta mover o arquivo para o destino
                    if ( @move_uploaded_file ( $arquivo_tmp, $destino ) ) {

                       $destinoBanco = 'imagens/homepage/' . $novoNome;
                       $home_class->caminhoImg = $destinoBanco;
                       $home_class->UpdateHomeMilhas();

                  }else{

                        header('location:paginahome.php?erro');
                  }
              }else{
                    header('location:paginahome.php?erroformato');
              }
            }

            if (isset( $_FILES[ 'fileMelhoresDestinos' ][ 'name' ] ) && $_FILES[ 'fileMelhoresDestinos' ][ 'error' ] == 0 ) {
              $arquivo_tmp = $_FILES[ 'fileMelhoresDestinos' ][ 'tmp_name' ];
              $nome = $_FILES[ 'fileMelhoresDestinos' ][ 'name' ];

              // Pega a extensão
              $extensao = pathinfo ( $nome, PATHINFO_EXTENSION );

              // Converte a extensão para minúsculo
              $extensao = strtolower ( $extensao );

              if ( strstr ( '.jpg;.jpeg;.gif;.png', $extensao ) ) {
                  $novoNome = 'homeMelhoresDestinos' . '.' . $extensao;


                  // Concatena a pasta com o nome
                  $destino = '../imagens/homepage/' . $novoNome;


                  // tenta mover o arquivo para o destino
                  if ( @move_uploaded_file ( $arquivo_tmp, $destino ) ) {

                     $destinoBanco = 'imagens/homepage/' . $novoNome;
                     $home_class->caminhoImg = $destinoBanco;
                     $home_class->UpdateHomeMelhoresDestinos();

                }else{

                      header('location:paginahome.php?erro');
                }
            }else{
                  header('location:paginahome.php?erroformato');
            }
          }

            if (isset( $_FILES[ 'fileNorte' ][ 'name' ] ) && $_FILES[ 'fileNorte' ][ 'error' ] == 0 ) {
                $arquivo_tmp = $_FILES[ 'fileNorte' ][ 'tmp_name' ];
                $nome = $_FILES[ 'fileNorte' ][ 'name' ];

                // Pega a extensão
                $extensao = pathinfo ( $nome, PATHINFO_EXTENSION );

                // Converte a extensão para minúsculo
                $extensao = strtolower ( $extensao );

                if ( strstr ( '.jpg;.jpeg;.gif;.png', $extensao ) ) {
                    $novoNome = 'homeNorte' . '.' . $extensao;


                    // Concatena a pasta com o nome
                    $destino = '../imagens/homepage/' . $novoNome;


                    // tenta mover o arquivo para o destino
                    if ( @move_uploaded_file ( $arquivo_tmp, $destino ) ) {

                       $destinoBanco = 'imagens/homepage/' . $novoNome;
                       $home_class->caminhoImg = $destinoBanco;
                       $home_class->UpdateHomeNorte();

                    }else{

                        header('location:paginahome.php?erro');
                    }
                }else{
                    header('location:paginahome.php?erroformato');
                }
            }

            if (isset( $_FILES[ 'fileNordeste' ][ 'name' ] ) && $_FILES[ 'fileNordeste' ][ 'error' ] == 0 ) {
                $arquivo_tmp = $_FILES[ 'fileNordeste' ][ 'tmp_name' ];
                $nome = $_FILES[ 'fileNordeste' ][ 'name' ];

                // Pega a extensão
                $extensao = pathinfo ( $nome, PATHINFO_EXTENSION );

                // Converte a extensão para minúsculo
                $extensao = strtolower ( $extensao );

                if ( strstr ( '.jpg;.jpeg;.gif;.png', $extensao ) ) {
                    $novoNome = 'homeNordeste' . '.' . $extensao;


                    // Concatena a pasta com o nome
                    $destino = '../imagens/homepage/' . $novoNome;


                    // tenta mover o arquivo para o destino
                    if ( @move_uploaded_file ( $arquivo_tmp, $destino ) ) {

                       $destinoBanco = 'imagens/homepage/' . $novoNome;
                       $home_class->caminhoImg = $destinoBanco;
                       $home_class->UpdateHomeNordeste();

                    }else{

                        header('location:paginahome.php?erro');
                    }
                }else{
                    header('location:paginahome.php?erroformato');
                }
            }

            if (isset( $_FILES[ 'fileCentroOeste' ][ 'name' ] ) && $_FILES[ 'fileCentroOeste' ][ 'error' ] == 0 ) {
                $arquivo_tmp = $_FILES[ 'fileCentroOeste' ][ 'tmp_name' ];
                $nome = $_FILES[ 'fileCentroOeste' ][ 'name' ];

                // Pega a extensão
                $extensao = pathinfo ( $nome, PATHINFO_EXTENSION );

                // Converte a extensão para minúsculo
                $extensao = strtolower ( $extensao );

                if ( strstr ( '.jpg;.jpeg;.gif;.png', $extensao ) ) {
                    $novoNome = 'homeCentroOeste' . '.' . $extensao;


                    // Concatena a pasta com o nome
                    $destino = '../imagens/homepage/' . $novoNome;


                    // tenta mover o arquivo para o destino
                    if ( @move_uploaded_file ( $arquivo_tmp, $destino ) ) {

                       $destinoBanco = 'imagens/homepage/' . $novoNome;
                       $home_class->caminhoImg = $destinoBanco;
                       $home_class->UpdateHomeCentroOeste();

                    }else{

                        header('location:paginahome.php?erro');
                    }
                }else{
                    header('location:paginahome.php?erroformato');
                }
            }


            if (isset( $_FILES[ 'fileSudeste' ][ 'name' ] ) && $_FILES[ 'fileSudeste' ][ 'error' ] == 0 ) {
                $arquivo_tmp = $_FILES[ 'fileSudeste' ][ 'tmp_name' ];
                $nome = $_FILES[ 'fileSudeste' ][ 'name' ];

                // Pega a extensão
                $extensao = pathinfo ( $nome, PATHINFO_EXTENSION );

                // Converte a extensão para minúsculo
                $extensao = strtolower ( $extensao );

                if ( strstr ( '.jpg;.jpeg;.gif;.png', $extensao ) ) {
                    $novoNome = 'homeSudeste' . '.' . $extensao;


                    // Concatena a pasta com o nome
                    $destino = '../imagens/homepage/' . $novoNome;


                    // tenta mover o arquivo para o destino
                    if ( @move_uploaded_file ( $arquivo_tmp, $destino ) ) {

                       $destinoBanco = 'imagens/homepage/' . $novoNome;
                       $home_class->caminhoImg = $destinoBanco;
                       $home_class->UpdateHomeSudeste();

                    }else{

                        header('location:paginahome.php?erro');
                    }
                }else{
                    header('location:paginahome.php?erroformato');
                }
            }


            if (isset( $_FILES[ 'fileSul' ][ 'name' ] ) && $_FILES[ 'fileSul' ][ 'error' ] == 0 ) {
                $arquivo_tmp = $_FILES[ 'fileSul' ][ 'tmp_name' ];
                $nome = $_FILES[ 'fileSul' ][ 'name' ];

                // Pega a extensão
                $extensao = pathinfo ( $nome, PATHINFO_EXTENSION );

                // Converte a extensão para minúsculo
                $extensao = strtolower ( $extensao );

                if ( strstr ( '.jpg;.jpeg;.gif;.png', $extensao ) ) {
                    $novoNome = 'homeSul' . '.' . $extensao;


                    // Concatena a pasta com o nome
                    $destino = '../imagens/homepage/' . $novoNome;


                    // tenta mover o arquivo para o destino
                    if ( @move_uploaded_file ( $arquivo_tmp, $destino ) ) {

                       $destinoBanco = 'imagens/homepage/' . $novoNome;
                       $home_class->caminhoImg = $destinoBanco;
                       $home_class->UpdateHomeSul();

                    }else{

                        header('location:paginahome.php?erro');
                    }
                }else{
                    header('location:paginahome.php?erroformato');
                }
            }



          }


          header('location:paginahome.php');


        }

    }

?>
