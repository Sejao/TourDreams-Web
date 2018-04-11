<?php


class ControllerUsuario
{


    public function ListarReservas(){
        require_once('models/usuario_class.php');
        $listareserva = new Usuario();
        $listareserva->idCliente = $this->idCliente;
        return $listareserva->SelectReservas();
    }

    public function ListarUltimaReserva(){
        require_once('models/usuario_class.php');
        $listaultreserva = new Usuario();
        $listaultreserva->idCliente = $this->idCliente;
        return $listaultreserva->SelectUltimaReserva();
    }



  public function Inserir(){

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      $cpf = '';
      $rg = '';

      $login = $_POST['txtLogin'];
      $senha =  $_POST['txtSenha'];
      $nome = $_POST['txtNome'];
      $email = $_POST['txtEmail'];
      if(isset($_POST['txtCpf']))
      {
          $cpf = $_POST['txtCpf'];
      }

      if(isset($_POST['txtRg']))
      {
          $rg = $_POST['txtRg'];
      }
      $telefone = $_POST['txtCelular'];
      $local = $_POST['radLocal'];

      $usuario_class = new Usuario();

      $usuario_class->login = $login;
      $usuario_class->senha = $senha;
      $usuario_class->nome = $nome;
      $usuario_class->email = $email;
      $usuario_class->cpf = $cpf;
      $usuario_class->rg = $rg;
      $usuario_class->telefone = $telefone;
      $usuario_class->tipoLocal = $local;

      $resultado = $usuario_class->Insert($usuario_class);
      if($resultado == 'ok'){
        header('location:registroUsuario.php?ok');
      }else {
        header('location:registroUsuario.php?erro');
      }
    }
  }

  public function Buscar($idLogin)
  {
      require_once('models/usuario_class.php');

      $usuario_class = new Usuario();
      $usuario_class->idLogin=$idLogin;
      return $usuario_class->SelectById($usuario_class);

  }

  public function Excluir()
  {
      $idLogin = $_GET['idLogin'];

      $usuario_class = new Usuario;
      $usuario_class->idLogin=$idLogin;
      $status = $usuario_class->Delete($usuario_class);

      header('location: router.php?controller=deslogar');

  }

  public function Editar()
  {
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $cpf = '';
        $rg = '';

        $nome = $_POST['txtNome'];
        $email = $_POST['txtEmail'];
        if(isset($_POST['txtCpf']))
        {
            $cpf = $_POST['txtCpf'];
        }

        if(isset($_POST['txtRg']))
        {
            $rg = $_POST['txtRg'];
        }
        $telefone = $_POST['txtTelefone'];
        $local = $_POST['slcTipoLocal'];
        $idCliente = $_POST['txtIdCliente'];
        $idTelefone = $_POST['txtIdTelefone'];

        $usuario_class = new Usuario();

        $usuario_class->nome = $nome;
        $usuario_class->email = $email;
        $usuario_class->cpf = $cpf;
        $usuario_class->rg = $rg;
        $usuario_class->telefone = $telefone;
        $usuario_class->tipoLocal = $local;
        $usuario_class->idCliente = $idCliente;
        $usuario_class->idTelefone = $idTelefone;

        $resultado = $usuario_class->Update($usuario_class);

        if($resultado == 'ok'){
            if (isset( $_FILES[ 'filImg' ][ 'name' ] ) && $_FILES[ 'filImg' ][ 'error' ] == 0 ) {
              $arquivo_tmp = $_FILES[ 'filImg' ][ 'tmp_name' ];
              $nome = $_FILES[ 'filImg' ][ 'name' ];

              // Pega a extensão
              $extensao = pathinfo ( $nome, PATHINFO_EXTENSION );

              // Converte a extensão para minúsculo
              $extensao = strtolower ( $extensao );

              // Somente imagens, .jpg;.jpeg;.gif;.png
              // Aqui eu enfileiro as extensões permitidas e separo por ';'
              // Isso serve apenas para eu poder pesquisar dentro desta String
              if ( strstr ( '.jpg;.jpeg;.gif;.png', $extensao ) ) {
                  $novoNome = 'usuario' . $idCliente . '.' . $extensao;

                  // Concatena a pasta com o nome
                  $destino = 'imagens/usuario/' . $novoNome;

                  // tenta mover o arquivo para o destino
                  if ( @move_uploaded_file ( $arquivo_tmp, $destino ) ) {
                     $usuario_class->caminhoImg = $destino;
                     $usuario_class->UpdateImage($usuario_class);
                     header('location:perfilUsuario.php?ok');
                  }
                  else
                      header('location:perfilUsuario.php?erroperm');
              }
              else
                  header('location:perfilUsuario.php?erroformato');
          }
          else
          {
              header('location:perfilUsuario.php?ok');
          }
        }else {
          header('location:perfilUsuario.php?erro');
        }

      }
  }



}

 ?>
