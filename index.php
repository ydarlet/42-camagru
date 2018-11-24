<?php
session_start();
include_once('includes.php');
ft_deconnect();
?>
<!doctype html>
<html lang="fr">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">
        <title>Camagru</title>
        <link rel="icon" type="image/png" href="img/webcam/camagru1.png" />
        <link rel="stylesheet" href="css/camagru.css">
        <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.min.css"> -->
        <!-- <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script> -->
        <script src="js/camagru.js"></script>
    </head>
    <body class="SourceSansPro fs1p2">
        <?php 
            include('includes/header.php');       
            include('includes/main.php');
            include('includes/footer.php');
        ?>
    </body>
</html>
