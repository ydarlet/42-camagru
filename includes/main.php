<?php
    echo '<main class="ma align-center">';
        if (isset($_GET['gallerie']) && $_GET['gallerie'] == '1')
            include('includes/gallerie.php');
        else if (isset($_GET['inscription']) && $_GET['inscription'] == '1')
            include('includes/inscription.php');
        else if (isset($_GET['camagru']) && $_GET['camagru'] == '1')
            include('includes/camagru.php');
        else if (isset($_GET['parametres']) && $_GET['parametres'] == '1')
            include('includes/parametres.php');
        else if (isset($_GET['public']) && $_GET['public'] == '1')
            include('includes/accueil_public.php');
        else if (isset($_GET['recovering']) && $_GET['recovering'] == '1')
            include('includes/recovering.php');
        else if (isset($_GET['pwd']) && $_GET['pwd'] == '1')
            include('includes/pwd_reset.php');
        else
            include('includes/accueil_public.php');
    echo '</main>';
?>