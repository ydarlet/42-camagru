<?php
    $msg_recover = "";
    if ($_POST['validate'] == 'recover'){
        //echo "bouton connexion cliqué<br />";
        if ($_POST['email'] == '')
            $msg_recover .= "entrez un email d'abord !<br />";
        else{
            //$msg .= $_POST['email'] . '<br/>';
            if (!email_exist($_POST['email'], $dbh))
                $msg_recover .= "le mail n'existe pas !<br />";
            else {
                if (!user_confirmed($_POST['email'], $dbh)){
                    $msg_recover .= "vous n'avez pas encore confirmé votre compte !<br />";
                    $msg_recover .= "renvoyer un mail de confirmation ?<br />";
                }
                else {
                    //$msg .= "we can send the mail !<br />";

                    // création dans la base du timestamp + email
                    $timestamp = update_recover_timestamp($_POST['email'], $dbh);

                    // création et envoi de l'email
                    send_recovering($_POST['email'], $timestamp, $dbh);

                    // email envoyé
                    //$msg .= time() . '<br/>';
                    $msg_recover .= "un email vous à été envoyé,<br />";
                    $msg_recover .= "le lien de recovering restera valable une heure !<br />";
                }
                
            }
        }
    }
?>