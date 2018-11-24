<div class="subtitle" style="margin-top: 2em;">
    Créer un compte
</div>
<?php
echo '
        <div class="container_accueil red section_subtitle" style="margin-bottom: 1em;">
            '. $msg_inscription .'
        </div>
    ';
?>
<div>
    <form action="index.php?inscription=1" method="post">
        <div class="container_accueil">
            <div>
                <div class="section_subtitle">
                    Username
                </div>
                <div class="field_smartphone">
                    <input 
                        id="inscription-username" 
                        class="input_text" 
                        type="text" 
                        name="username" 
                        autocomplete="inscription-username"
                        onchange="verif_username();"
                    />
                    <img id="inscri-uname-icn" class="icn-field" src="img/icn/tick.png" />
                </div>
                <div id="inscri-uname-description" class="notice red invisible">
                    format: alphanumeric 6-32 chars commence par une lettre.
                </div>
            </div>
        </div>
        <div class="container_accueil" style="margin-top: .5em;">
            <div>
                <div class="section_subtitle">
                    Email
                </div>
                <div class="field_smartphone">
                    <input 
                        id="inscription-email" 
                        class="input_text" 
                        type="email" 
                        name="email" 
                        autocomplete="inscription-email"
                        onchange="verif_email();"
                    />
                    <img id="inscri-email-icn" class="icn-field" src="img/icn/tick.png" />
                </div>
                <div id="inscri-email-description" class="notice red invisible">
                    format: email.
                </div>
            </div>
        </div>
        <div class="container_accueil" style="margin-top: .5em;">
            <div>
                <div class="section_subtitle">
                    Password
                </div>
                <div class="field_smartphone">
                    <input 
                        id="inscription-password" 
                        class="input_text" 
                        type="password" 
                        name="password" 
                        autocomplete="inscription-password"
                        onchange="verif_password();"
                    />
                    <img id="inscri-password-icn" class="icn-field" src="img/icn/tick.png" />
                </div>
                <div id="inscri-password-description" class="notice red invisible">
                    format: 8-20 chars avec au moins une majuscule, un chiffre et un char special.
                </div>
            </div>
        </div>
        <div class="container_accueil" style="margin-top: .5em;">
            <div>
                <div class="section_subtitle">
                    Password Confirmation
                </div>
                <div class="field_smartphone">
                    <input 
                        id="inscription-password_confirm" 
                        class="input_text" 
                        type="password" 
                        name="password_confirm" 
                        autocomplete="inscription-password_confirm"
                        onchange="verif_pass2();"
                    />
                    <img id="inscri-password2-icn" class="icn-field" src="img/icn/tick.png" />
                </div>
                <div id="inscri-password2-description" class="notice red invisible">
                    doit etre identique au precedent.
                </div>
            </div>
        </div>
        <div class="container_accueil" style="margin-top: 1em;">
            <div>
                <div class="field_smartphone">
                    <input 
                        id="inscription-validate" 
                        class="bouton_form" 
                        type="submit" 
                        name="validate"
                        value="inscription"
                    />
                </div>
            </div>
        </div>
    </form>
</div>