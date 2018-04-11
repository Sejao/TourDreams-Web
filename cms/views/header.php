<?php
    session_start();
    if ($_SESSION['loginCMS'] != 'true')
    {
        header('location:router.php?controller=deslogar');
    }
 ?>
<header class="header">
    <div id="imagemHeader">
        <a href="homecms.php"><img src="../imagens/TourDreams.png" alt="Logo"></a>
    </div>
  <div class="titulo">
    CMS - Sistema de Gerenciamento de Conteúdo
  </div>
  <div id="usuarioBox">
      <table>
          <tr>
              <td><span><?php echo($_SESSION['nomeFuncionario']); ?></span></td>
          </tr>
          <tr>
              <td><?php echo($_SESSION['nivel']); ?></td>
          </tr>
          <tr>
              <td><a href="router.php?controller=deslogar">Sair</a></td>
          </tr>
      </table>
  </div>
</header>
