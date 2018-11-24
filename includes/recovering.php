<div class="subtitle" style="margin-top: 2em;">
    Password Recovering
</div>
<div class="subtitle gray" style="display: flex; align-items: center; justify-content: center; max-width: 85vw; margin: auto;">
    Recevez un email pour choisir un nouveau mot de passe :
</div>
<div class="section_subtitle" style="margin: 5vh 0;">Envoi du mail</div>
<?php
    echo '
        <div class="container_accueil section_subtitle red" style="margin: 2em 0;">
            '. $msg_recover .'
        </div>
    ';
?>
<div class="ml6" style="width: 30vw; margin:auto; background-color: rgba(254, 254, 254, 0);">
    <form action="index.php?recovering=1" method="post">
        <div class="container_accueil">
            <div>
                <div class="section_subtitle">
                    Email
                </div>
                <div>
                    <input 
                        id="recover-email" 
                        class="input_text" 
                        type="email" 
                        name="email" 
                        autocomplete="recover-email"
                    />
                </div>
            </div>
        </div>
        <div class="container_accueil" style="margin-top: 2em;">
            <div>
                <div>
                    <input 
                        id="recover-validate" 
                        class="bouton_form" 
                        type="submit" 
                        name="validate" 
                        value="recover"
                    />
                </div>
            </div>
        </div>
    </form>
</div>