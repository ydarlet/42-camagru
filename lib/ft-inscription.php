<?php
    $msg_inscription = "";
    if ($_POST['validate'] == 'inscription'){
        //$msg_inscription .= "bouton inscription cliqué<br />";
        if ($_POST['username'] == '' || $_POST['email'] == '' || $_POST['password'] == '' || $_POST['password_confirm'] == '')
            $msg_inscription .= "au moins un des champs est vide !<br />";
        else {
            if ($_POST['password'] != $_POST['password_confirm'])
                $msg_inscription .= "les deux passwords ne concordent pas !<br />";
            else {
                $pattern_email = '/^(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){255,})(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){65,}@)(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22))(?:\.(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-[a-z0-9]+)*\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-[a-z0-9]+)*)|(?:\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\]))$/iD';
                if (!preg_match($pattern_email, $_POST['email']))
                    $msg_inscription .= "l'email est mal formaté !<br />";
                else {
                    $pattern_username = '/^[A-Za-z][A-Za-z0-9]{5,31}$/';
                    if (!preg_match($pattern_username, $_POST['username']))
                        $msg_inscription .= "le username est mal formaté !<br />";
                    else {
                        $pattern_password = '/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{7,19}$/';
                        if (!preg_match($pattern_password, $_POST['password']))
                            $msg_inscription .= "le password est mal formaté !<br />";
                        else {
                            if (exist_username($_POST['username'], $dbh))
                                $msg_inscription .= "le username existe deja, trouvez en un autre !<br />"; // eventuellement appel javascript pour rougir la case
                            else {
                                if (exist_email($_POST['email'], $dbh))
                                    $msg_inscription .= "l'email existe deja dans la base, tentez l'outil de recuperation de mot de passe !<br />"; //js pour rougir la case
                                else {
                                    //$msg_inscription .= "tout est ok, on crée l'utilisateur :<br />";
                                    //$msg_inscription .= "username: " . $_POST['username'] . "<br />";
                                    //$msg_inscription .= "email: " . $_POST['email'] . "<br />";
                                    //$msg_inscription .= "password: " . $_POST['password'] . "<br />";
                                    $msg_inscription .= "votre inscription à bien été prise en compte.<br />";
                                    $msg_inscription .= "vous allez recevoir un email avec un lien de confirmation.";
                                    //créer l'utilisateur en mode non confirmé
                                    $timestamp = create_user($_POST['username'], $_POST['email'], hash('whirlpool', '#?.' . $_POST['password']), $dbh);
                                    //lui envoyer un mail avec lien de confirmation
                                    send_confirm($_POST['email'], $timestamp);
                                }
                            }
                            // si timestamp existe pas deja dans la base
                        }
                    }
                }
            }
        }
    }
?>