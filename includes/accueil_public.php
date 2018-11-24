<?php
    if (ft_islogged())
        include_once('includes/camagru.php');
    else {
?>
<div class="title">Bienvenue sur Camagru</div>
<div class="container_accueil" style="max-width: 80%;margin: auto;">
    <div 
        class="subtitle gray" 
        style="display: flex; align-items: center; justify-content: center;">
        Vous pouvez consulter librement la gallerie
    </div>
    <div
        style="display: flex; align-items: center; justify-content: center; height: 15vh; margin-left: 2vh;">
        <a href="index.php?gallerie=1">
            <img 
                src="img/gallery/gallerie1-gray.png"
                alt="gallerie"
                title="gallerie"
                style="height: 8vh;"
            />
        </a>
    </div>
</div>
<div class="container_accueil" style="max-width: 80%;margin: auto;">
    <div 
        class="subtitle gray"
        style="display: flex; align-items: center; justify-content: center;">
        Ou bien vous inscrire et bénéficier de notre service gratuit
    </div>
    <div
        style="display: flex; align-items: center; justify-content: center; height: 15vh; margin-left: 2vh;">
        <a href="index.php?inscription=1">
            <img 
                src="img/profile/profile-creation.png" 
                alt="inscription-identification"
                title="identifiez ou inscrivez vous" 
                style="height: 8vh;"
            />
        </a>
    </div>
</div>
<div class="section_title" style="margin-top: 2em;">Authentification</div>
<?php
        echo '
            <div class="container_accueil red" style="margin-bottom: 1em;">
                <div class="section_subtitle">
                    '. $msg_connexion .'
                </div>
            </div>
        ';
?>
<div 
    class="ml6" 
    style="width: 48vw; margin:auto; background-color: rgba(254, 254, 254, 0);"
>
    <form action="index.php" method="post">
        <div class="container_accueil">
            <div>
                <div class="section_subtitle">
                    Login
                </div>
                <div>
                    <input 
                        id="connect-username" 
                        class="input_text" 
                        type="text" 
                        name="username" 
                        autocomplete="username"
                    />
                </div>
            </div>
        </div>
        <div class="container_accueil">
            <div>
                <div class="section_subtitle">
                    Password
                </div>
                <div>
                    <input 
                        id="connect-password" 
                        class="input_text" 
                        type="password" 
                        name="password" 
                        autocomplete="password"
                    />
                </div>
            </div>
        </div>
        <div class="container_accueil">
            <div>
                <div class="section_subtitle" style="margin-top: .8vh;">
                    <input 
                        class="bouton_form"
                        id="connect-validate" 
                        type="submit" 
                        name="validate" 
                        value="connexion" 
                    />
                </div>
                <div class="section_subtitle" style="margin-top: .8vh;">
                    <a href="index.php?recovering=1">mot de passe oublié ?</a>
                </div>
            </div>
        </div>
    </form>
</div>
<?php
    }
?>


