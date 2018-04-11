<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>CMS - Administração do Cliente</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/admcliente.css">
    <script src="../js/jquery-3.2.1.min.js" charset="utf-8"></script>
    <script src="js/script.js" charset="utf-8"></script>
    <link rel="icon" href="../imagens/favicon.ico" />
  </head>
  <body>
    <?php
        require_once('views/header.php'); ?>
        <section>
            <?php
            require_once('views/menu.php');
            require_once('views/administradorcliente/administradorcliente_view.php');                         //Conteúdo
            ?>
        </section>
  </body>
</html>
