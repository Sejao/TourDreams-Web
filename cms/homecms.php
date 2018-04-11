<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Bem Vindo ao CMS - TourDreams</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/homecms.css">
        <script src="../js/jquery-3.2.1.min.js" charset="utf-8"></script>
        <script src="js/script.js" charset="utf-8"></script>
        <link rel="icon" href="../imagens/favicon.ico" />
    </head>
    <body>
        <?php
            require_once('views/header.php');                         //Cabeçalho
        ?>
        <section>
             <?php require_once('views/menu.php') ?>
             <div id="conteudo">
                 <?php require_once('views/homecms/homecms_view.php'); ?>
             </div>
        </section>

    </body>
</html>
