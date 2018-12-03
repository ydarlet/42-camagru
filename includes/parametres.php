<div class="subtitle" style="margin-top: 2em;">
    Espace de Gestion
</div>
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
                            //echo '<br/> votre nom d\'user actuel existe bien.';
                            if (username_exist($_POST['change-username'], $dbh)) {
                                if ($_SESSION['logged_on_user'] == $_POST['change-username'])
                                    echo '
                                            <div class="container_accueil notice red" style="margin-top: .5em;">
                                                Vous avez entré votre username actuel
                                            </div>
                                        ';
                                else
                                    echo '
                                            <div class="container_accueil notice red" style="margin-top: .5em;">
                                                Ce username est déjà utilisé
                                            </div>
                                        ';
                            }
                            else {
                                $user_email = get_email($_SESSION['logged_on_user'], $dbh);
                                while ($data_email = $user_email->fetch())
                                {
                                    //echo "<br/>" . $data[email] . "<br/>";
                                    $user_id = get_userid($data_email[email], $dbh);
                                    while ($data_id = $user_id->fetch())
                                    {
                                        //echo "<br/>" . $data_id[id_user] . "<br/>";
                                        if (update_username($data_id[id_user], $_POST['change-username'], $dbh)) {;
                                            echo '
                                                <div class="container_accueil notice red" style="margin-top: .5em;">
                                                    Username changé pour "' . $_POST['change-username'] . '"
                                                </div>
                                            ';
                                            $_SESSION['logged_on_user'] = $_POST['change-username'];
                                        } else {
                                            echo '
                                                <div class="container_accueil notice red" style="margin-top: .5em;">
                                                    Woups... erreur lors du changement de pseudo
                                                </div>
                                            ';
                                        }
                                    }
                                    $user_id->closeCursos();
                                }
                            }
                        }
                        else {
                            echo '
                                    <div class="container_accueil notice red" style="margin-top: .5em;">
                                        Votre nom d\'user actuel n\'existe pas
                                    </div>
                                ';
                        }
                        //echo '<br/>' . $_SESSION['logged_on_user'];
                        //echo '<br/>' . $_POST['change-username'];
                        //echo '<br/>';
                    }
                else {
                    echo '
                        <div class="container_accueil notice red" style="margin-top: .5em;">
                            Mauvais format de pseudo !
                        </div>
                    ';
                }
            }
        ?>
    </form>
    <?php
        $res = get_email($_SESSION['logged_on_user'], $dbh);
        while ($data = $res->fetch())
            $user_email = htmlspecialchars($data[email]);
        $res->closeCursor();
    ?>
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
                        name="change-email" 
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
        <?php
            if ($_POST['change-email-validate'] == 'Changer d\'Email') {
                if ($_POST['change-email'] 
                    && $_POST['change-email'] != NULL 
                    && $_POST['change-email'] != ''
                    && preg_match('/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/', $_POST['change-email'])) {
                        if (username_exist($_SESSION['logged_on_user'], $dbh)) {
                            //echo '<br/> votre nom d\'user actuel existe bien.';
                            if (email_exist($_POST['change-email'], $dbh)) {
                                if ($user_email == $_POST['change-email'])
                                    echo '
                                            <div class="container_accueil notice red" style="margin-top: .5em;">
                                                Vous avez entré votre email actuel
                                            </div>
                                        ';
                                else
                                    echo '
                                            <div class="container_accueil notice red" style="margin-top: .5em;">
                                                Cet email est déjà utilisé
                                            </div>
                                        ';
                            }
                            else {
                                //echo "<br/>" . $data[email] . "<br/>";
                                $user_id = get_userid($user_email, $dbh);
                                while ($data_id = $user_id->fetch())
                                {
                                    //echo "<br/>" . $data_id[id_user] . "<br/>";
                                    if (update_email($data_id[id_user], $_POST['change-email'], $dbh)) {;
                                        echo '
                                            <div class="container_accueil notice red" style="margin-top: .5em;">
                                                Email changé pour "' . $_POST['change-email'] . '"
                                            </div>
                                        ';
                                        $user_email = $_POST['change-email'];
                                    } else {
                                        echo '
                                            <div class="container_accueil notice red" style="margin-top: .5em;">
                                                Woups... erreur lors du changement d\'email
                                            </div>
                                        ';
                                    }
                                }
                            }
                        }
                        else {
                            echo '
                                    <div class="container_accueil notice red" style="margin-top: .5em;">
                                        Votre nom d\'user actuel n\'existe pas
                                    </div>
                                ';
                        }
                    }
                else {
                    echo '
                        <div class="container_accueil notice red" style="margin-top: .5em;">
                            Mauvais format d\' email !
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
                    Actual Password
                </div>
                <div>
                    <input 
                        id="change-password0" 
                        class="input_text" 
                        type="password" 
                        name="change-password0" 
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
                        name="change-password1" 
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
                        name="change-password2" 
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
        <?php
            if ($_POST['change-passwd-validate'] == 'Changer de Password') {
                if ($_POST['change-password0'] && $_POST['change-password1'] && $_POST['change-password2']
                    && $_POST['change-password0'] != NULL && $_POST['change-password1'] != NULL  && $_POST['change-password2'] != NULL 
                    && $_POST['change-password0'] != '' && $_POST['change-password1'] != '' && $_POST['change-password2'] != ''
                    && preg_match('/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{7,19}$/', $_POST['change-password0'])
                    && preg_match('/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{7,19}$/', $_POST['change-password1'])
                    && preg_match('/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{7,19}$/', $_POST['change-password2'])) {
                        if (username_exist($_SESSION['logged_on_user'], $dbh)) {
                            //echo '<br/> votre nom d\'user actuel existe bien.';
                            // si password 0 est la bon password actuel ?
                            if (good_password($_SESSION['logged_on_user'], hash('whirlpool', '#?.'.$_POST['change-password0']), $dbh)) {
                                // si les deux passwords entrés correpondent ?
                                if ($_POST['change-password1'] == $_POST['change-password2']) {
                                    $user_id = get_userid($user_email, $dbh);
                                    while ($data_id = $user_id->fetch())
                                    {
                                        //echo "<br/>" . $data_id[id_user] . "<br/>";
                                        if (update_password($data_id[id_user], hash('whirlpool', '#?.'.$_POST['change-password1']), $dbh)) {;
                                            echo '
                                                <div class="container_accueil notice red" style="margin-top: .5em;">
                                                    Password changé
                                                </div>
                                            ';
                                        } else {
                                            echo '
                                                <div class="container_accueil notice red" style="margin-top: .5em;">
                                                    Woups... erreur lors du changement de password
                                                </div>
                                            ';
                                        }
                                    }
                                }
                                else {
                                    echo '
                                            <div class="container_accueil notice red" style="margin-top: .5em;">
                                                Les deux nouveaux password entrés ne sont pas identiques
                                            </div>
                                        ';
                                }
                            }
                            else {
                                echo '
                                    <div class="container_accueil notice red" style="margin-top: .5em;">
                                        Le password actuel entré n\'est pas le bon
                                    </div>
                                ';
                            }
                        }
                        else {
                            echo '
                                    <div class="container_accueil notice red" style="margin-top: .5em;">
                                        Votre nom d\'user actuel n\'existe pas
                                    </div>
                                ';
                        }
                    }
                else {
                    echo '
                        <div class="container_accueil notice red" style="margin-top: .5em;">
                            Au moins un des passwords ne respecte pas le bon format : <br/>
                            8-20 chars avec au moins une majuscule, un chiffre et un char special
                        </div>
                    ';
                }
            }
        ?>
    </form>
</div>