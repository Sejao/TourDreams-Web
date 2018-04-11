<?php
    session_start();
    if(isset($_SESSION['loginCMS']))
    {
        if($_SESSION['loginCMS'] == 'true')
        {
            header('location:homecms.php');
        }
    }
    $msg = '';
    if(isset($_GET['erro']))
    {
        $msg = 'Usuário e/ou senha incorretos.';
    }
    if(isset($_GET['acesso']))
    {
        $msg = 'Efetue o login.';
    }
    if(isset($_GET['db']))
    {
        $msg = 'Erro no acesso com o servidor. Tente novamente.';
    }
 ?>
<section>
    <div id="principal">
        <div id="img">
            <img src="../imagens/TourDreams.png" alt="Logo" onmousedown="return false;"/>
        </div>
        <div id="formbox">
            <form action="router.php?controller=login" method="post">
            <table>
                <tr>
                    <td><span>Sistema de Gerenciamento de Conteúdo</span></td>
                </tr>
                <tr>
                    <td><div><?php echo $msg; ?></div></td>
                </tr>
                <tr>
                    <td><label for="txtLoginCMS">Login</label></td>
                </tr>
                <tr>
                    <td><input type="text" name="txtLoginCMS"></td>
                </tr>
                <tr>
                    <td><label for="txtSenhaCMS">Senha</label></td>
                </tr>
                <tr>
                    <td><input type="password" name="txtSenhaCMS"></td>
                </tr>
                <tr>
                    <td><input type="submit" name="btnLoginCMS" value="Login"></td>
                </tr>

            </table>
            </form>
        </div>
    </div>
</section>
