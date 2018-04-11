<?php
    class ControllerPaginaFaleconosco{

      public function Atualizar(){

        require_once('models/paginaFaleconosco_class.php');

        $paginafaleconosco = new PaginaFaleConosco();

        /*Começo*/

        /*Contato*/
        if($_SERVER['REQUEST_METHOD'] == 'POST'){


            if (isset( $_FILES[ 'fileFotosContato' ][ 'name' ] ) && $_FILES[ 'fileFotosContato' ][ 'error' ] == 0 ) {
              $arquivo_tmp = $_FILES[ 'fileFotosContato' ][ 'tmp_name' ];
              $nome = $_FILES[ 'fileFotosContato' ][ 'name' ];



              // Pega a extensão
              $extensao = pathinfo ( $nome, PATHINFO_EXTENSION );

              // Converte a extensão para minúsculo
              $extensao = strtolower ( $extensao );

              // Somente imagens, .jpg;.jpeg;.gif;.png
              // Aqui eu enfileiro as extensões permitidas e separo por ';'
              // Isso serve apenas para eu poder pesquisar dentro desta String
              if ( strstr ( '.jpg;.jpeg;.gif;.png', $extensao ) ) {
                  $novoNome = 'contato.'.$extensao;

                  // Concatena a pasta com o nome
                  $destino = '../imagens/faleconosco/' . $novoNome;

                  ///echo "";
                  // tenta mover o arquivo para o destino
                  if ( @move_uploaded_file ( $arquivo_tmp, $destino ) ) {

                    $destinoBanco = 'imagens/faleconosco/' .$novoNome;


                     $paginafaleconosco->caminhoImagemContato=$destinoBanco;

                     $paginafaleconosco->EditarContato();

                     header('location:paginaFaleConosco.php');
                 }else{

                  header('location:paginaFaleConosco.php?erroCaminho');
                 }

            }
        }

        /*FAQ*/

            if (isset( $_FILES[ 'fileFotosFaq' ][ 'name' ] ) && $_FILES[ 'fileFotosFaq' ][ 'error' ] == 0 ) {
              $arquivo_tmp = $_FILES[ 'fileFotosFaq' ][ 'tmp_name' ];
              $nome = $_FILES[ 'fileFotosFaq' ][ 'name' ];



              // Pega a extensão
              $extensao = pathinfo ( $nome, PATHINFO_EXTENSION );

              // Converte a extensão para minúsculo
              $extensao = strtolower ( $extensao );

              // Somente imagens, .jpg;.jpeg;.gif;.png
              // Aqui eu enfileiro as extensões permitidas e separo por ';'
              // Isso serve apenas para eu poder pesquisar dentro desta String
              if ( strstr ( '.jpg;.jpeg;.gif;.png', $extensao ) ) {
                  $novoNome = 'faq.'.$extensao;

                  // Concatena a pasta com o nome
                  $destino = '../imagens/faleconosco/' . $novoNome;

                  ///echo "";
                  // tenta mover o arquivo para o destino
                  if ( @move_uploaded_file ( $arquivo_tmp, $destino ) ) {

                    $destinoBanco = 'imagens/faleconosco/' .$novoNome;


                     $paginafaleconosco->caminhoImagemFaq=$destinoBanco;
                     $paginafaleconosco->EditarFaq();

                    header('location:paginaFaleConosco.php');
                 }else{

                  header('location:paginaFaleConosco.php?erroCaminho');
                 }

            }
        }

        /* Duvida*/

            if (isset( $_FILES[ 'fileFotosDuvida' ][ 'name' ] ) && $_FILES[ 'fileFotosDuvida' ][ 'error' ] == 0 ) {
              $arquivo_tmp = $_FILES[ 'fileFotosDuvida' ][ 'tmp_name' ];
              $nome = $_FILES[ 'fileFotosDuvida' ][ 'name' ];



              // Pega a extensão
              $extensao = pathinfo ( $nome, PATHINFO_EXTENSION );

              // Converte a extensão para minúsculo
              $extensao = strtolower ( $extensao );

              // Somente imagens, .jpg;.jpeg;.gif;.png
              // Aqui eu enfileiro as extensões permitidas e separo por ';'
              // Isso serve apenas para eu poder pesquisar dentro desta String
              if ( strstr ( '.jpg;.jpeg;.gif;.png', $extensao ) ) {
                  $novoNome = 'form.'.$extensao;

                  // Concatena a pasta com o nome
                  $destino = '../imagens/faleconosco/' . $novoNome;

                  ///echo "";
                  // tenta mover o arquivo para o destino
                  if ( @move_uploaded_file ( $arquivo_tmp, $destino ) ) {

                    $destinoBanco = 'imagens/faleconosco/' .$novoNome;


                     $paginafaleconosco->caminhoImagemDuvida=$destinoBanco;
                     $paginafaleconosco->EditarDuvida();

                     header('location:paginaFaleConosco.php');
                 }else{

                  header('location:paginaFaleConosco.php?erroCaminho');
                 }

            }
        }

        /*Geral*/

            if (isset( $_FILES[ 'fileFotosGeral' ][ 'name' ] ) && $_FILES[ 'fileFotosGeral' ][ 'error' ] == 0 ) {
              $arquivo_tmp = $_FILES[ 'fileFotosGeral' ][ 'tmp_name' ];
              $nome = $_FILES[ 'fileFotosGeral' ][ 'name' ];



              // Pega a extensão
              $extensao = pathinfo ( $nome, PATHINFO_EXTENSION );

              // Converte a extensão para minúsculo
              $extensao = strtolower ( $extensao );

              // Somente imagens, .jpg;.jpeg;.gif;.png
              // Aqui eu enfileiro as extensões permitidas e separo por ';'
              // Isso serve apenas para eu poder pesquisar dentro desta String
              if ( strstr ( '.jpg;.jpeg;.gif;.png', $extensao ) ) {
                  $novoNome = 'geral.'.$extensao;

                  // Concatena a pasta com o nome
                  $destino = '../imagens/faleconosco/' . $novoNome;

                  ///echo "";
                  // tenta mover o arquivo para o destino
                  if ( @move_uploaded_file ( $arquivo_tmp, $destino ) ) {

                    $destinoBanco = 'imagens/faleconosco/' .$novoNome;


                     $paginafaleconosco->caminhoImagemGeral=$destinoBanco;
                     $paginafaleconosco->EditarGeral();

                     header('location:paginaFaleConosco.php');
                 }else{

                  header('location:paginaFaleConosco.php?erroCaminho');
                 }

            }
        }

        /*Contas*/

            if (isset( $_FILES[ 'fileFotosConta' ][ 'name' ] ) && $_FILES[ 'fileFotosConta' ][ 'error' ] == 0 ) {
              $arquivo_tmp = $_FILES[ 'fileFotosConta' ][ 'tmp_name' ];
              $nome = $_FILES[ 'fileFotosConta' ][ 'name' ];



              // Pega a extensão
              $extensao = pathinfo ( $nome, PATHINFO_EXTENSION );

              // Converte a extensão para minúsculo
              $extensao = strtolower ( $extensao );

              // Somente imagens, .jpg;.jpeg;.gif;.png
              // Aqui eu enfileiro as extensões permitidas e separo por ';'
              // Isso serve apenas para eu poder pesquisar dentro desta String
              if ( strstr ( '.jpg;.jpeg;.gif;.png', $extensao ) ) {
                  $novoNome = 'conta.'.$extensao;

                  // Concatena a pasta com o nome
                  $destino = '../imagens/faleconosco/' . $novoNome;

                  ///echo "";
                  // tenta mover o arquivo para o destino
                  if ( @move_uploaded_file ( $arquivo_tmp, $destino ) ) {

                    $destinoBanco = 'imagens/faleconosco/' .$novoNome;


                     $paginafaleconosco->caminhoImagemConta=$destinoBanco;
                     $paginafaleconosco->EditarConta();

                     header('location:paginaFaleConosco.php');
                 }else{

                  header('location:paginaFaleConosco.php?erroCaminho');
                 }

            }
        }

        /*Reservas*/

            if (isset( $_FILES[ 'fileFotosReservas' ][ 'name' ] ) && $_FILES[ 'fileFotosReservas' ][ 'error' ] == 0 ) {
              $arquivo_tmp = $_FILES[ 'fileFotosReservas' ][ 'tmp_name' ];
              $nome = $_FILES[ 'fileFotosReservas' ][ 'name' ];



              // Pega a extensão
              $extensao = pathinfo ( $nome, PATHINFO_EXTENSION );

              // Converte a extensão para minúsculo
              $extensao = strtolower ( $extensao );

              // Somente imagens, .jpg;.jpeg;.gif;.png
              // Aqui eu enfileiro as extensões permitidas e separo por ';'
              // Isso serve apenas para eu poder pesquisar dentro desta String
              if ( strstr ( '.jpg;.jpeg;.gif;.png', $extensao ) ) {
                  $novoNome = 'reservas.'.$extensao;

                  // Concatena a pasta com o nome
                  $destino = '../imagens/faleconosco/' . $novoNome;

                  ///echo "";
                  // tenta mover o arquivo para o destino
                  if ( @move_uploaded_file ( $arquivo_tmp, $destino ) ) {

                    $destinoBanco = 'imagens/faleconosco/' .$novoNome;


                     $paginafaleconosco->caminhoImagemReservas=$destinoBanco;
                     $paginafaleconosco->EditarReservas();

                     header('location:paginaFaleConosco.php');
                 }else{

                  header('location:paginaFaleConosco.php?erroCaminho');
                 }

            }
        }

        /*FeedBack*/

            if (isset( $_FILES[ 'fileFotosFeedback' ][ 'name' ] ) && $_FILES[ 'fileFotosFeedback' ][ 'error' ] == 0 ) {
              $arquivo_tmp = $_FILES[ 'fileFotosFeedback' ][ 'tmp_name' ];
              $nome = $_FILES[ 'fileFotosFeedback' ][ 'name' ];



              // Pega a extensão
              $extensao = pathinfo ( $nome, PATHINFO_EXTENSION );

              // Converte a extensão para minúsculo
              $extensao = strtolower ( $extensao );

              // Somente imagens, .jpg;.jpeg;.gif;.png
              // Aqui eu enfileiro as extensões permitidas e separo por ';'
              // Isso serve apenas para eu poder pesquisar dentro desta String
              if ( strstr ( '.jpg;.jpeg;.gif;.png', $extensao ) ) {
                  $novoNome = 'feedback.'.$extensao;

                  // Concatena a pasta com o nome
                  $destino = '../imagens/faleconosco/' . $novoNome;

                  ///echo "";
                  // tenta mover o arquivo para o destino
                  if ( @move_uploaded_file ( $arquivo_tmp, $destino ) ) {

                    $destinoBanco = 'imagens/faleconosco/' .$novoNome;


                     $paginafaleconosco->caminhoImagemFeedback=$destinoBanco;
                     $paginafaleconosco->EditarFeedback();

                     header('location:paginaFaleConosco.php');
                 }else{

                  header('location:paginaFaleConosco.php?erroCaminho');
                 }

            }
        }
        /*Background*/

            if (isset( $_FILES[ 'fileFotosBackground' ][ 'name' ] ) && $_FILES[ 'fileFotosBackground' ][ 'error' ] == 0 ) {
              $arquivo_tmp = $_FILES[ 'fileFotosBackground' ][ 'tmp_name' ];
              $nome = $_FILES[ 'fileFotosBackground' ][ 'name' ];



              // Pega a extensão
              $extensao = pathinfo ( $nome, PATHINFO_EXTENSION );

              // Converte a extensão para minúsculo
              $extensao = strtolower ( $extensao );

              // Somente imagens, .jpg;.jpeg;.gif;.png
              // Aqui eu enfileiro as extensões permitidas e separo por ';'
              // Isso serve apenas para eu poder pesquisar dentro desta String
              if ( strstr ( '.jpg;.jpeg;.gif;.png', $extensao ) ) {
                  $novoNome = 'bg.'.$extensao;

                  // Concatena a pasta com o nome
                  $destino = '../imagens/faleconosco/' . $novoNome;

                  ///echo "";
                  // tenta mover o arquivo para o destino
                  if ( @move_uploaded_file ( $arquivo_tmp, $destino ) ) {

                    $destinoBanco = 'imagens/faleconosco/' .$novoNome;


                     $paginafaleconosco->caminhoImagemBackground=$destinoBanco;
                     $paginafaleconosco->EditarBackground();

                     header('location:paginaFaleConosco.php');
                 }else{

                  header('location:paginapromocoes.php?erroCaminho');
                 }

            }
        }
      }
        /*Fim*/



      }


      public function Select(){

        require_once('models/paginaFaleconosco_class.php');
        $faleconosco = new PaginaFaleConosco();
        return $faleconosco->SelectFale();


      }

    }




 ?>
