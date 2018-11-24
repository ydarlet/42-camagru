<?php
function send_recovering($email, $timestamp, $dbh){
    $mail = $email;
    //echo 'email' . $email . '<br/>';
    
    $res = get_userid($email, $dbh);

    while ($data = $res->fetch())
        $userid = htmlspecialchars($data[id]);
    $res->closeCursor();
    //echo 'userid' . $userid . '<br/>';

    
    if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail))
        $passage_ligne = "\r\n";
    else
        $passage_ligne = "\n";

    $message_txt = "Bonjour utilisateur de Camagru,".$passage_ligne;
    $message_txt .= "Voici le lien à utiliser pour te paramétrer un nouveau mot de passe : ".$passage_ligne;
    $message_txt = "http://localhost/~yanndarlet/42/camagru2/index.php?pwd=1&userid=".$userid."&timestamp=".$timestamp.$passage_ligne;

    $message_html = '
        <html><head></head><body>
            <b>Bonjour utilisateur de Camagru,</b> <br />
            Voici le lien à utiliser pour te paramétrer un nouveau mot de passe : <br/>
            <a href="http://localhost/~yanndarlet/42/camagru2/index.php?pwd=1&userid='.$userid.'&timestamp='.$timestamp.'">
                cliquez-ici.
            </a>
        </body></html>';

    $boundary = "-----=".md5(rand());

    $sujet = "Pwd Recovering - Camagru";

    $header = "From: \"Camagru\"<camagru@no-answer-back.fr>".$passage_ligne;
    $header.= "Reply-to: \"Camagru\" <camagru@no-answer-back.fr>".$passage_ligne;
    $header.= "MIME-Version: 1.0".$passage_ligne;
    $header.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;

    $message = $passage_ligne."--".$boundary.$passage_ligne;
    // texte
    $message.= "Content-Type: text/plain; charset=\"ISO-8859-1\"".$passage_ligne;
    $message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
    $message.= $passage_ligne.$message_txt.$passage_ligne;

    $message.= $passage_ligne."--".$boundary.$passage_ligne;
    // html
    $message.= "Content-Type: text/html; charset=\"ISO-8859-1\"".$passage_ligne;
    $message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
    $message.= $passage_ligne.$message_html.$passage_ligne;

    $message.= $passage_ligne."--".$boundary."--".$passage_ligne;
    $message.= $passage_ligne."--".$boundary."--".$passage_ligne;

    // envoi
    mail($mail,$sujet,$message,$header);
}
?>