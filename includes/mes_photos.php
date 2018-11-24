<div
    class="snaps_container"
>
    <div class="section_subtitle">
        Mes Snaps
    </div>
    <br/>
    <?php
        // AFFICHER LES SNAPS
        /*
            Si le dossier s'ouvre bien (existe)
            Si il existe un fichier correct (pas . pas .. pas DS_Store pas .git)
            Si le fichier se termine bien par _[nom_user]
            Alors on affiche tous les fichiers avec leur lien de suppresion
        */
        if ($dossier = opendir('./galerie')) {
            while (false !== ($fichier = readdir($dossier))) {
                if ($fichier != '.' 
                    && $fichier != '..' 
                    && $fichier != '.DS_Store' 
                    && $fichier != '.git'
                    && preg_match('/^.*_' . $_SESSION['logged_on_user'] . '.+/', $fichier))
                    /* On teste juste dans la ligne au dessus si ce sont bien les images du user uniquement ! */
                {
                    echo '<img 
                            src="./galerie/' . $fichier . '"
                            id="snap_' . $fichier . '"
                            class="snap_img"
                            name="' . $fichier . '"
                            />';
                    echo '<br/>';
                    // echo '<button onClick="deleteSnap(\''.$fichier.'\')">supprimer</button><br/>';
                    echo '<a href="http://'.$_SERVER['SERVER_NAME'].$_SERVER["REQUEST_URI"].'&file='.$fichier.'">supprimer</a><br/>';
                    echo '<br/>';
                }
            }
        }
        else {
            echo 'Erreur : ouverture dossier galerie échouée.';
        }


        //DELETE SNAPS
        if (isset($_GET['file']) && $_GET['file'] != '') {
            $file = dirname(__FILE__) . '/../galerie/' . $_GET['file'];
            // $file = '/Users/yanndarlet/Sites/42/camagru3/galerie/' . $_GET['file'];
            echo realpath($file);
            if (is_writable(realpath($file))) {
                echo '<br/> is writable';
                echo '<script type="text/javascript">
                        if (confirm("coucou")
                            console.log("yes");
                        else
                            console.log("no");
                        </script>';
                if (unlink(realpath($file)))
                    echo '<br/>success';
                else
                    echo '<br/>failure';
            }
            else {
                echo '<br/> is not writable';
            }




            // function delete_file($pFilename)
            // {
            //     if ( file_exists($pFilename) ) { 
            //         //    Added by muhammad.begawala
            //         //    '@' will stop displaying "Resource Unavailable" error because of file is open some where.
            //         //    'unlink($pFilename) !== true' will check if file is deleted successfully.
            //         //  Throwing exception so that we can handle error easily instead of displaying to users.
            //         if( @unlink($pFilename) !== true )
            //             throw new Exception('Could not delete file: ' . $pFilename . ' Please close all applications that are using it.');
            //     }    
            //     return true;
            // }

            // try {
            //     if( delete_file($file) === true )
            //         echo 'File Deleted';
            // }
            // catch (Exception $e) {
            //     echo $e->getMessage(); // will print Exception message defined above.
            // }
        }
    ?>
</div>