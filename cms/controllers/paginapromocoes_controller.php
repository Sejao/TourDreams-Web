<?php

  class ControllerPromocao{

    public function Atualizar(){

      require_once ('models/paginapromocoes_class.php');

      $promocoes_class = new PaginaPromocoes();

      if($_SERVER['REQUEST_METHOD'] == 'POST'){
          if (isset( $_FILES[ 'fileFotosBannerUm' ][ 'name' ] ) && $_FILES[ 'fileFotosBannerUm' ][ 'error' ] == 0 ) {
            $arquivo_tmp = $_FILES[ 'fileFotosBannerUm' ][ 'tmp_name' ];
            $nome = $_FILES[ 'fileFotosBannerUm' ][ 'name' ];



            // Pega a extensão
            $extensao = pathinfo ( $nome, PATHINFO_EXTENSION );

            // Converte a extensão para minúsculo
            $extensao = strtolower ( $extensao );

            // Somente imagens, .jpg;.jpeg;.gif;.png
            // Aqui eu enfileiro as extensões permitidas e separo por ';'
            // Isso serve apenas para eu poder pesquisar dentro desta String
            if ( strstr ( '.jpg;.jpeg;.gif;.png', $extensao ) ) {
                $novoNome = 'banner1.'.$extensao;

                // Concatena a pasta com o nome
                $destino = '../imagens/promocoes/' . $novoNome;

                ///echo "";
                // tenta mover o arquivo para o destino
                if ( @move_uploaded_file ( $arquivo_tmp, $destino ) ) {

                  $destinoBanco = 'imagens/promocoes/' .$novoNome;


                   $promocoes_class->caminhoImagemBannerUm=$destinoBanco;
                   $promocoes_class->EditarBannerUm();

                   header('location:paginapromocoes.php');
               }else{

                header('location:paginapromocoes.php?erroCaminho');
               }

          }
      }




      if (isset( $_FILES[ 'fileFotosBannerDois' ][ 'name' ] ) && $_FILES[ 'fileFotosBannerDois' ][ 'error' ] == 0 ) {
        $arquivo_tmp = $_FILES[ 'fileFotosBannerDois' ][ 'tmp_name' ];
        $nome = $_FILES[ 'fileFotosBannerDois' ][ 'name' ];



        // Pega a extensão
        $extensao = pathinfo ( $nome, PATHINFO_EXTENSION );

        // Converte a extensão para minúsculo
        $extensao = strtolower ( $extensao );

        // Somente imagens, .jpg;.jpeg;.gif;.png
        // Aqui eu enfileiro as extensões permitidas e separo por ';'
        // Isso serve apenas para eu poder pesquisar dentro desta String
        if ( strstr ( '.jpg;.jpeg;.gif;.png', $extensao ) ) {
            $novoNome = 'banner2.'.$extensao;

            // Concatena a pasta com o nome
            $destino = '../imagens/promocoes/' . $novoNome;
            ///echo "";
            // tenta mover o arquivo para o destino
            if ( @move_uploaded_file ( $arquivo_tmp, $destino ) ) {

              $destinoBanco = 'imagens/promocoes/' .$novoNome;


               $promocoes_class->caminhoImagemBannerdois=$destinoBanco;
               $promocoes_class->EditarBannerDois();

               header('location:paginapromocoes.php');
           }else{

            header('location:paginapromocoes.php?erroCaminho');
           }

          }

        }




    }



  }



  public function Select(){

    require_once('models/paginapromocoes_class.php');
    $controllerpromocao =  new PaginaPromocoes();

    return $controllerpromocao->SelectPromocao();


  }

}

 ?>
