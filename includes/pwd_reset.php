<?php
    echo '
        <div class="fs2 mt5">Password Reset</div>
        
        <div class="fs2 mt5">UserId : ' . $_GET['userid'] . '</div>

        <div class="fs2 mt5">Timestamp : ' . $_GET['timestamp'] . '</div>
    
        ';
    
/*
        <div class="fs2 mt5 gray">
            Recevez un email pour choisir un nouveau mot de passe :
        </div>
        
        <div class="fs1p5 mt5 mb1">Envoi du mail</div>
        <div class="ml6" style="width: 30vw; margin:auto; background-color: rgba(254, 254, 254, 0);">
            <form action="index.php?recovering=1" method="post">
                <div class="float-left"> Email : </div> 
                <div class="float-left ml1"> <input id="recover-email" class="arrondi align-center" style="height:2vw; border: none; color: gray; width:20vw;" type="email" name="email" onchange="verif_connect_username();" /> </div>
                <div class="float-left ml1"> <input id="recover-validate" class="arrondi align-center" style="height:2vw; border: none;" type="submit" name="validate" value="recover" /> </div>
        
                <div class="float-left align-right w13 lh2p5">
        
                </div>
                <div class="float-left align-left">
                    </div>
                
                <div class="float-left align-left ml0p5 lh2p5">
                    <img id="connect-uname-icn" class="icn-field" src="img/icn/tick.png" /><br />
                    <img id="connect-password-icn" class="icn-field" src="img/icn/tick.png" /><br />
                </div>
            </form>
        </div>
    ';
    //include_once('lib/ft-connexion.php');
    echo '
        <div class="red float-left" style="width:98%;margin-top: -3.5vw;">
            '. $msg .'
        </div>
    ';*/
?>