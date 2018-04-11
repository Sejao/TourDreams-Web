<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Melhores Destinos - TourDreams</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/animate.css">
        <link rel="stylesheet" href="css/melhoresdestinos.css">
        <link rel="stylesheet" href="js/jqueryui/jquery-ui.css">
        <script src="js/jquery-3.2.1.min.js" charset="utf-8"></script>
        <script src="js/wow.min.js"></script>
        <script src="js/jqueryui/jquery-ui.min.js" charset="utf-8"></script>
        <script src="js/script.js" charset="utf-8"></script>
        <link rel="icon" href="imagens/favicon.ico" />
    </head>
    <body>
        <?php
            require_once('views/header.php');                                   //Cabeçalho
            require_once('views/melhoresdestinos/melhoresdestinos_view.php');   //Conteúdo
        ?>
        <script src="js/sliderMelhoresDestinos.js" charset="utf-8"></script>    <!--Slider-->
		<?php
            require_once('views/footer.php');                                   //Rodapé
        ?>

    </body>
</html>
