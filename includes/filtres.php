<div
    id="filtres"
    class="filtres_container"
>
    <div class="section_subtitle">
        Filtres
    </div>
    <?php
        if ($dossier = opendir('./img/filtres')) {
            while (false !== ($fichier = readdir($dossier))) {
                if ($fichier != '.' 
                    && $fichier != '..' 
                    && $fichier != '.DS_Store' 
                    && $fichier != '.git'
                    && !preg_match('/^(thumb_)/', $fichier)
                    ) {
                    echo '<img 
                            src="./img/filtres/thumb_' . $fichier . '"
                            id="filtre_' . $fichier . '"
                            class="filtre_img"
                            name="' . $fichier . '"
                            onClick="addFiltre(this)"
                            />';
                    // echo '<br/>';
                }
            }
        }
        else {
            echo 'Erreur : ouverture dossier filtres échouée.';
        }
    ?>
</div>