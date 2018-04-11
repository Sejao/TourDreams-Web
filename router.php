<?php
    //Página faz o controle entre views e models segundo padrão MVC
    if(!isset($_GET['controller']))
    {
        header('Location:'.$_SERVER['HTTP_REFERER']);
    }
    $controller = $_GET['controller'];
    if(isset($_GET['modo']))
    {
        $modo = $_GET['modo'];
    }

    switch ($controller)                                                        //Verifica a variável de controle
    {
        case 'login':
            if (isset($_POST['btnRegistro']))                                   //Verifica se o botão de cadastro foi acionado
            {
                header('location:registroUsuario.php');
            }
            if(isset($_POST['btnLogin']))                                       //Verifica se o botão de login foi acionado
            {

                $action = $_GET['action'];



                require_once('controllers/login_controller.php');
                require_once('models/login_class.php');
                $controller_login = new ControllerLogin;
                $controller_login->action = $action;
                $controller_login->Autenticar();
            }
            break;
         case 'conhecaseudestino':
                header("Location: conhecaseudestinobusca.php");
            break;
         case 'faleconosco':
                require_once('controllers/faleconosco_controller.php');
                require_once('models/faleconosco_class.php');
                if(isset($_POST['btnEnviarFeedback']))
                {
                    $controller_faleconosco = new ControllerFaleConosco;
                    $controller_faleconosco->Inserir();
                }
                break;

          case 'parceiro':
              require_once('controllers/parceiros_controller.php');
              require_once('models/parceiro_class.php');
              if(isset($_POST['btnRegistrarParceiro'])){
                  $controller_parceiro = new ControllerParceiro;
                  $controller_parceiro -> Inserir();
              }
              break;
          case 'usuario':
              require_once('controllers/usuarios_controller.php');
              require_once('models/usuario_class.php');
              if(isset($_POST['btnRegistrarUsuario']))
              {
                  $controller_usuario = new ControllerUsuario;
                  $controller_usuario -> Inserir();
              }
              if($modo == 'excluir')
              {
                  $controller_usuario = new ControllerUsuario;
                  $controller_usuario -> Excluir();
              }
              if($modo == 'editar')
              {
                  $controller_usuario = new ControllerUsuario;
                  $controller_usuario -> Editar();
              }
              break;
          case 'deslogar':
              session_start();
              session_unset();
              session_destroy();
              session_write_close();
              header('location:homepage.php');
              break;

          case 'parceiroDestaque':

            require_once('controllers/parceirosDestaque_controller.php');
            require_once('models/parceirosDestaque_class.php');


            break;


          case 'buscarParceiro':
                require_once('controllers/parceirosDestaque_controller.php');
                require_once('models/parceirosDestaque_class.php');
                switch ($modo) {
                  case 'buscar':
                        $controllerParceiro_destaque = new ControllerParceiroDestaque();
                        $controllerParceiro_destaque->Buscar();

                    break;
                }

            break;


            case 'hotel':
                require_once('controllers/hotel_controller.php');
                require_once('models/hotel_class.php');
                switch ($modo) {
                    case 'inserir':
                        $controller_hotel = new ControllerHotel();
                        $controller_hotel->Inserir();
                    break;
                    case 'deletar':
                        $controller_hotel = new ControllerHotel();
                        $controller_hotel->Deletar();
                    break;
                }
            break;
            case 'quarto':
                require_once('controllers/quarto_controller.php');
                require_once('models/quarto_class.php');
                switch ($modo) {
                    case 'inserir':
                        $controller_quarto = new ControllerQuarto();
                        $controller_quarto->Inserir();
                        break;
                    case 'excluir':
                        $controller_quarto = new ControllerQuarto();
                        $controller_quarto->Excluir();
                    break;
                    case 'visualizar':
                        $controller_quarto = new ControllerQuarto();
                        $controller_quarto->Visualizar();
                    break;
                    case 'editar':
                        $controller_quarto = new ControllerQuarto();
                        $controller_quarto->Editar();
                    break;
                }
            break;

             case 'informacao':
                require_once('controllers/informacao_controller.php');
                require_once('models/informacao_class.php');
                switch ($modo) {
                    case 'listar':
                        $controller_informacao = new ControllerInformacao();
                        $controller_informacao->Listar();
                        break;
                }
            break;

            case 'reserva':
                require_once('controllers/reserva_controller.php');
                require_once('models/reserva_class.php');
                $controller_reserva = new ControllerReserva();
                $controller_reserva->InsertReserva();
            break;


            case 'novaavaliacao':
                require_once('controllers/avaliacao_controller.php');
                require_once('models/avaliacao_class.php');
                $controller_avaliacao = new ControllerAvaliacao();
                $controller_avaliacao->Inserir();
            break;

            case 'perfilparceiro':
                require_once('controllers/perfilparceiro_controller.php');
                require_once('models/perfilparceiro_class.php');
                switch($modo){
                    case 'aprovar':

                    $controller_perfilparceiro = new ControllerPerfilParceiro();
                    $controller_perfilparceiro->Aprovar();
                    break;
                    case 'reprovar':

                    $controller_perfilparceiro = new ControllerPerfilParceiro();
                    $controller_perfilparceiro->Reprovar();
                    break;
                    case 'deletar':

                    $controller_perfilparceiro = new ControllerPerfilParceiro();
                    $controller_perfilparceiro->Deletar();
                    break;

                }
            break;
    }
?>
