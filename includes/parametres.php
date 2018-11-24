<div class="subtitle" style="margin-top: 2em;">
    Espace de Gestion
</div>
<?php
    $res = get_email($_SESSION['logged_on_user'], $dbh);
    while ($data = $res->fetch())
        $user_email = htmlspecialchars($data[email]);
    $res->closeCursor();
?>
<div class="section_title">Modifiez vos informations</div>
<div>
    <form action="" method="post">
        <div class="container_accueil">
            <div>
                <div class="section_subtitle">
                    New Username
                </div>
                <div>
                    <input 
                        id="change-username" 
                        class="input_text" 
                        type="text" 
                        name="change-username" 
                        autocomplete="change-username"
                        placeholder="<?php echo "actual one : " . $_SESSION['logged_on_user']; ?>"
                    />
                </div>
            </div>
        </div>
        <div class="container_accueil">
            <div>
                <div>
                    <input 
                        id="change-username-validate" 
                        class="bouton_form" 
                        type="submit" 
                        name="change-username-validate" 
                        value="Changer de Pseudo"
                    />
                </div>
            </div>
        </div>
        <?php
            if ($_POST['change-username-validate'] == 'Changer de Pseudo') {
                if ($_POST['change-username'] 
                    && $_POST['change-username'] != NULL 
                    && $_POST['change-username'] != ''
                    && preg_match('/^[a-zA-Z0-9]+$/', $_POST['change-username'])) {
                        if (username_exist($_SESSION['logged_on_user'], $dbh)) {
                            echo '<br/> user existe';
                        }
                        if (username_exist($_POST['change-username'], $dbh)) {
                            echo '<br/> new username existe deja';
                        }
                        echo '<br/>' . $_SESSION['logged_on_user'];
                        echo '<br/>' . $_POST['change-username'];
                        echo '<br/>';
                        if (update_username($_SESSION['logged_on_user'], $_POST['change-username'], $dbh)) {;
                            echo '
                                <div class="container_accueil notice red" style="margin-top: .2em;">
                                    nouveau pseudo set to : ' . $_POST['change-username'] . '
                                </div>
                            ';
                        } else {
                            echo '
                                <div class="container_accueil notice red" style="margin-top: .2em;">
                                    woups...
                                </div>
                            ';
                        }
                    }
                else {
                    echo '
                        <div class="container_accueil notice red" style="margin-top: .2em;">
                            mauvais format de pseudo !
                        </div>
                    ';
                }
            }
        ?>
    </form>
    <form action="" method="post">
        <div class="container_accueil" style="margin-top: 4vh;">
            <div>
                <div class="section_subtitle">
                    New Email
                </div>
                <div>
                    <input 
                        id="change-email" 
                        class="input_text" 
                        type="email" 
                        name="email" 
                        autocomplete="change-email"
                        placeholder="<?php echo "actual one : " .  $user_email; ?>"
                    />
                </div>
            </div>
        </div>
        <div class="container_accueil">
            <div>
                <div>
                    <input 
                        id="change-email-validate" 
                        class="bouton_form" 
                        type="submit" 
                        name="change-email-validate" 
                        value="Changer d'Email"
                    />
                </div>
            </div>
        </div>
    </form>
    <form action="" method="post">
        <div class="container_accueil" style="margin-top: 4vh;">
            <div>
                <div class="section_subtitle">
                    Actual Password
                </div>
                <div>
                    <input 
                        id="change-password0" 
                        class="input_text" 
                        type="password" 
                        name="password0" 
                        autocomplete="change-password0"
                    />
                </div>
            </div>
        </div>
        <div class="container_accueil">
            <div>
                <div class="section_subtitle">
                    New Password
                </div>
                <div>
                    <input 
                        id="change-password1" 
                        class="input_text" 
                        type="password" 
                        name="password1" 
                        autocomplete="change-password1"
                    />
                </div>
            </div>
        </div>
        <div class="container_accueil">
            <div>
                <div class="section_subtitle">
                    Confirmation
                </div>
                <div>
                    <input 
                        id="change-password2" 
                        class="input_text" 
                        type="password" 
                        name="password2" 
                        autocomplete="change-password2"
                    />
                </div>
            </div>
        </div>
        <div class="container_accueil">
            <div>
                <div>
                    <input 
                        id="change-passwd-validate" 
                        class="bouton_form" 
                        type="submit" 
                        name="change-passwd-validate" 
                        value="Changer de Password"
                    />
                </div>
            </div>
        </div>
        <div class="section_subtitle" style="margin-top: .8vh;">
            <a href="index.php?recovering=1">mot de passe oublié ?</a>
        </div>
    </form>
</div>