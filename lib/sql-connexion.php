<?php

    /* BIBLIOTHEQUE DES FUNCTIONS QUI EXECUTENT LES REQUETES SQL POUR LA CONNEXION D'UN UTILISATEUR */

    function exist_username($username, $dbh)
    {
        try {
            $sql =  'SELECT * from USERS WHERE username LIKE "' . $username . '"';
            $res = $dbh->query($sql);
            return ($res->rowCount());
        } catch (PDOException $e) {
            print "Connexion (exist_username) -> Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    function good_password($username, $password, $dbh)
    {
        try {
            $sql =  'SELECT * FROM users WHERE username LIKE "' . $username . '" AND password LIKE "' . $password  . '"';
            $res = $dbh->query($sql);
            return ($res->rowCount());
        } catch (PDOException $e) {
            print "Connexion (good_password) -> Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    function confirmed_user($username, $dbh)
    {
        try {
            $sql =  'SELECT * FROM users WHERE username LIKE "' . $username . '" AND confirm LIKE "1"';
            $res = $dbh->query($sql);
            return ($res->rowCount());
        } catch (PDOException $e) {
            print "Connexion (confirmed_user) -> Erreur !: " . $e->getMessage() . "<br/>";
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