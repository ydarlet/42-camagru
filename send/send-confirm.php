<?php
function send_confirm($email, $timestamp){
    // Parameters
    $mail_subject = "Camagru - confirmation de création de compte";
    $from_name = "Camagru";
    $from_mail = "no-e-mail@no-answer.nope";
    $mail_to = $email;
    $encoding = "utf-8";
    // Message
    $mail_message = '
        Confirme ton compte mec : '.$timestamp.' !;
    ';
    // Preferences for Subject field
    $subject_preferences = array(
        "input-charset" => $encoding,
        "output-charset" => $encoding,
        "line-length" => 76,
        "line-break-chars" => "\r\n"
    );
    // Mail header
    $header = "Content-type: text/html; charset=".$encoding." \r\n";
    $header .= "From: ".$from_name." <".$from_mail."> \r\n";
    $header .= "MIME-Version: 1.0 \r\n";
    $header .= "Content-Transfer-Encoding: 8bit \r\n";
    $header .= "Date: ".date("r (T)")." \r\n";
    $header .= iconv_mime_encode("Subject", $mail_subject, $subject_preferences);
    // Send mail
    mail($mail_to, $mail_subject, $mail_message, $header); 
}
?>