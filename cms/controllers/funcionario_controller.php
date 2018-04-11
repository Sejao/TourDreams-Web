<?php
    class ControllerFuncionario{

        public function Adicionar(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){


              $login = $_POST['txtLogin'];
              $senha =  $_POST['txtSenha'];
              $nome = $_POST['txtNome'];
              $email = $_POST['txtEmail'];
              $idNivel = $_POST['sltNivel'];
              $cpf = $_POST['txtCPF'];
              $rg = $_POST['txtRG'];
              $idFuncionario = $_GET['idFuncionario'];




                require_once('models/funcionario_class.php');

              $funcionario_class = new Funcionario();

              $funcionario_class->login = $login;
              $funcionario_class->senha = $senha;
              $funcionario_class->nome = $nome;
              $funcionario_class->email = $email;
              $funcionario_class->cpf = $cpf;
              $funcionario_class->rg = $rg;
              $funcionario_class->idNivel = $idNivel;






                  if (isset( $_FILES[ 'fileFoto' ][ 'name' ] ) && $_FILES[ 'fileFoto' ][ 'error' ] == 0 ) {
                    $arquivo_tmp = $_FILES[ 'fileFoto' ][ 'tmp_name' ];
                    $nome = $_FILES[ 'fileFoto' ][ 'name' ];

                    // Pega a extensão
                    $extensao = pathinfo ( $nome, PATHINFO_EXTENSION );

                    // Converte a extensão para minúsculo
                    $extensao = strtolower ( $extensao );

                    // Somente imagens, .jpg;.jpeg;.gif;.png
                    // Aqui eu enfileiro as extensões permitidas e separo por ';'
                    // Isso serve apenas para eu poder pesquisar dentro desta String
                    if ( strstr ( '.jpg;.jpeg;.gif;.png', $extensao ) ) {


                        // Concatena a pasta com o nome
                        $destino = 'imagens/gfuncionarios/' . $nome;

                        // tenta mover o arquivo para o destino
                        if ( @move_uploaded_file ( $arquivo_tmp, $destino ) ) {
                           $funcionario_class->caminhoImagem = $destino;
                           $funcionario_class->InserirFuncionario($funcionario_class);
                           header('location:gerfuncionario.php');
                       }
                }
                else
                {
                    header('location:gerfuncionario.php?erroformato');
                }

            }
            else {
                $funcionario_class->InserirFuncionario($funcionario_class);
                header('location:gerfuncionario.php');
            }

    }
}

    public function Listar(){

        require_once('models/funcionario_class.php');
        $lstFuncionario = new Funcionario();
        return $lstFuncionario->SelectAll();

      }


        public function ExcluirFuncionario(){


        $idFuncionario = $_GET['idFuncionario'];
        $idLogin = $_GET['idLogin'];

        $funcionario_class = new Funcionario();
        $funcionario_class ->idFuncionario=$idFuncionario;
        $funcionario_class ->idLogin=$idLogin;
        $funcionario_class->Deletar($funcionario_class);
        header('location:gerfuncionario.php');

      }


    public function Visualizar(){
        $idFuncionario = $_GET['idFuncionario'];
        $idLogin = $_GET['idLogin'];

        require_once('models/funcionario_class.php');

        $funcionario_class = new Funcionario();
        $funcionario_class->idFuncionario=$idFuncionario;
        $funcionario_class->idLogin=$idLogin;
        $result = $funcionario_class->SelectById($funcionario_class);

        require_once("gerfuncionario.php");

         ?>
            <script type="text/javascript">

                $('.bgModalFuncionario').fadeIn(200, function(){

                });

            </script>
        <?php
    }


    public function Atualizar(){

        if($_SERVER['REQUEST_METHOD']=='POST'){
        $login=$_POST['txtLogin'];
        $senha=$_POST['txtSenha'];
        $nome=$_POST['txtNome'];
        $cpf=$_POST['txtCPF'];
        $rg=$_POST['txtRG'];
        $email=$_POST['txtEmail'];
        $idNivel=$_POST['sltNivel'];

        $idFuncionario = $_GET['idFuncionario'];
        $idLogin = $_GET['idLogin'];
        $idImagem = $_GET['idImagem'];


        $funcionario_class = new Funcionario();

        $funcionario_class->nome=$nome;
        $funcionario_class->login=$login;
        $funcionario_class->senha=$senha;
        $funcionario_class->email=$email;
        $funcionario_class->rg=$rg;
        $funcionario_class->cpf=$cpf;
        $funcionario_class->idNivel=$idNivel;


        $funcionario_class->idFuncionario=$idFuncionario;
        $funcionario_class->idLogin=$idLogin;
        $funcionario_class->idImagem=$idImagem;





        if (isset( $_FILES[ 'fileFoto' ][ 'name' ] ) && $_FILES[ 'fileFoto' ][ 'error' ] == 0 ) {
          $arquivo_tmp = $_FILES[ 'fileFoto' ][ 'tmp_name' ];
          $nome = $_FILES[ 'fileFoto' ][ 'name' ];

          // Pega a extensão
          $extensao = pathinfo ( $nome, PATHINFO_EXTENSION );

          // Converte a extensão para minúsculo
          $extensao = strtolower ( $extensao );

          // Somente imagens, .jpg;.jpeg;.gif;.png
          // Aqui eu enfileiro as extensões permitidas e separo por ';'
          // Isso serve apenas para eu poder pesquisar dentro desta String
          if ( strstr ( '.jpg;.jpeg;.gif;.png', $extensao ) ) {
              $novoNome = 'funcionario'.$idFuncionario.$extensao;

              // Concatena a pasta com o nome
              $destino = 'imagens/gfuncionarios/' . $novoNome;

              // tenta mover o arquivo para o destino
              if ( @move_uploaded_file ( $arquivo_tmp, $destino ) ) {
                 $funcionario_class->caminhoImagem = $destino;
                 $funcionario_class->Editar($funcionario_class);
                 header('location:gerfuncionario.php');
             }
          }
          else
          {
              header('location:gerfuncionario.php?erroformato');
          }

      }else {
          $funcionario_class->Editar($funcionario_class);
          header('location:gerfuncionario.php');
      }



      }

    }



      public function ListarNivel(){

        require_once('models/funcionario_class.php');
        $lstNivel = new Funcionario();
        return $lstNivel->SelectNivel();

      }



}

?>
