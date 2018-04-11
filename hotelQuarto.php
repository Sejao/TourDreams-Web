<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Hotel - TourDreams</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/animate.css">
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
        <link rel="stylesheet" href="css/hotelquarto.css">
        <link rel="stylesheet" href="js/jqueryui/jquery-ui.css">
        <script src="js/jquery-3.2.1.min.js" charset="utf-8"></script>
        <script src="js/wow.min.js"></script>
        <script src="js/jqueryui/jquery-ui.min.js" charset="utf-8"></script>
        <script src="js/script.js" charset="utf-8"></script>
        <link rel="icon" href="imagens/favicon.ico" />
        <meta name="viewport" content="width=device-width, initial-scale=0">
    </head>
    <body>
        <?php
            require_once('views/header.php');                                   //Cabeçalho
            require_once('views/hotelquarto/hotelquarto_view.php');             //Conteúdo
        ?>
        <script src="js/galeriaHotelQuarto.js" charset="utf-8"></script>        <!-- Galeria Javascript -->
		<?php
            require_once('views/footer.php');                                   //Rodapé
        ?>

    </body>
</html>
