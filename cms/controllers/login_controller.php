<?php
class ControllerLogin
{
    public function Autenticar()
    {
        /*  Verifica se o método foi acionado por uma requisição de formulário
        POST.
        */
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $login = $_POST['txtLoginCMS'];
            $senha = $_POST['txtSenhaCMS'];

            $login_class = new Login();

            $login_class->login=$login;
            $login_class->senha=$senha;

            $login = $login_class->Auth($login_class);
            if ($login == 'null')
            {
                header('location:index.php?erro');
            }
            else if($login == 'db')
            {
                header('location:index.php?db');
            }
            else
            {
                session_start();
                $_SESSION['nomeFuncionario'] = $login->nomeFuncionario;
                $_SESSION['nivel'] = $login->nivel;
                $_SESSION['loginCMS'] = 'true';
                header('location:homecms.php');
            }
        }
    }
}
 ?>
