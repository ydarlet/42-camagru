<?php

    /* BIBLIOTHEQUE DES FUNCTIONS QUI EXECUTENT LES REQUETES SQL POUR LA CONNEXION D'UN UTILISATEUR */

    function update_recover_timestamp($email, $dbh)
    {
        try {
            $time = time();
            $query = "UPDATE `USERS` SET `recover` = " . $time . " 
                        WHERE `USERS`.`email` LIKE '" . $email . "';";
            $statement = $dbh->prepare($query);
            $statement->execute();
            return ($time);
        } catch (PDOException $e) {
            print " Update (update_recover_timestamp) -> Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    function update_username($username, $new_username, $dbh)
    {
        try {
            $query = "UPDATE `USERS` SET `username` = '" . $new_username . "' 
                        WHERE `USERS`.`username` = '" . $username . "';";
            $dbh->exec($query);
            return (1);
        } catch (PDOException $e) {
            print " Update (update_username) -> Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    /*
    $sql =  'SELECT * from users';
    foreach  ($dbh->query($sql) as $row) {
        print $row['username'] . "\t";
    }
    */

?>