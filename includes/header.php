<header>
    <a href="index.php?public=1">
        <img 
            src="img/webcam/camagru1.png" 
            alt="webcam.png" 
            title="We are Watching You ! MouaHahahaHa !"
            class="main_logo" 
            />
        <div class="main_title">Camagru</div>
    </a>    
</header>
<div id="navigation">
    <a href="index.php?gallerie=1">
        <img 
            class="icon_navigation_gallerie"
            src="img/gallery/gallerie1-gray.png"
            alt="gallerie"
            title="gallerie"
            />
    </a>
    <?php
        if (!isset($_SESSION['logged_on_user']) || $_SESSION['logged_on_user'] == '') {
            echo '
                <a href="index.php?inscription=1">
                    <img
                        class="icon_navigation_inscription"
                        src="img/profile/profile-creation.png"
                        alt="inscription"
                        title="inscrivez vous"
                        />
                </a>
                ';
        }
        else {
            echo '
                <a href="index.php?camagru=1">
                    <img
                        class="icon_navigation_camagru"
                        src="img/webcam/camagru2-gray.png"
                        alt="caméra"
                        title="prendre une photo" />
                </a>        
            ';
            echo '
                <a href="index.php?parametres=1">
                    <img
                        class="icon_navigation_parametres"
                        src="img/profile/profile2-gray.png"
                        alt="paramètres"
                        title="gestion du profil" />
                </a>
            ';
            echo '
                <a href="index.php?deconnexion=1">
                    <img
                        class="icon_navigation_deconnexion"
                        src="img/exit/exit2.png"
                        alt="déconnexion"
                        title="déconnexion" />
                </a>
            ';
        }
    ?>
</div>
