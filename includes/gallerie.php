<div class="subtitle" style="margin-top: 2em;">
    Gallerie
</div>
<div class="container_accueil">
    <div class="container_gallerie">
        <?php
            if ($dossier = opendir('./galerie')) {
                while (false !== ($fichier = readdir($dossier))) {
                    if ($fichier != '.' 
                        && $fichier != '..' 
                        && $fichier != '.DS_Store' 
                        && $fichier != '.git'
                        // && !preg_match('/\G./', $fichier)
                        && preg_match('/^([0-9]{10})_([a-zA-Z]+).([a-z]{3})/', $fichier))
                    {
                        echo '  <div>
                                    <img 
                                        src="./galerie/' . $fichier . '"
                                        id="snap_' . $fichier . '"
                                        class="snap_img_gallerie"
                                        name="' . $fichier . '"
                                        />
                                    <br/>
                                    '.$fichier.'<br/> ';
                        if (ft_islogged()) {
                            echo '
                                <div>like - comment</div>
                            ';
                        }
                        echo '
                                </div>
                            ';
                    }
                }
            }
            else {
                echo 'Erreur : ouverture dossier galerie échouée.';
            }
        ?>
    </div>
</div>