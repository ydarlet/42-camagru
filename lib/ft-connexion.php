<?php
    $msg_connexion = "";
    if ($_POST['validate'] == 'connexion'){
        //echo "bouton connexion cliqué<br />";
        if ($_POST['username'] == '' || $_POST['password'] == '')
            $msg_connexion .= "au moins un des champs est vide !<br />";
        else{
            if (!exist_username($_POST['username'], $dbh))
                $msg_connexion .= "le username n'existe pas !<br />";
            else {
                if (!good_password($_POST['username'], hash('whirlpool', '#?.'.$_POST['password']), $dbh))
                    $msg_connexion .= "wrong password pour ce username !<br />";
                else {
                    if (!confirmed_user($_POST['username'], $dbh))
                        $msg_connexion .= "vous n'avez pas encore confirmé votre inscription";
                        else {
                            //echo "ok connexion possible<br />";
                            $_SESSION['logged_on_user'] = $_POST['username'];
                        }
                }
            }
        }
    }

    function ft_deconnect() {
        if (session_status() == PHP_SESSION_ACTIVE) {
            if (isset($_GET['deconnexion']) && $_GET['deconnexion'] == '1') {
                $_GET['deconnexion'] = '0';
                $_SESSION['logged_on_user'] = '';
                session_destroy();
                setcookie('PHPSESSID', '', time() - 3600);
                session_start();
            }
        }
    }

    function ft_islogged() {
        if (isset($_SESSION['logged_on_user']) && $_SESSION['logged_on_user'] != '')
            return true;
        else
            return false;
    }
?>