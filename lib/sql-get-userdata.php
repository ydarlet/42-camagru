<?php

    /* BIBLIOTHEQUE DES FUNCTIONS QUI EXECUTENT LES REQUETES SQL POUR LA CONNEXION D'UN UTILISATEUR */

    function get_email($username, $dbh)
    {
        try {
            $sql =  'SELECT email from users WHERE username LIKE "' . $username . '"';
            $res = $dbh->query($sql);
            return ($res);
        } catch (PDOException $e) {
            print " Get (get_email) -> Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    function email_exist($email, $dbh)
    {
        try {
            $sql =  'SELECT * from users WHERE email LIKE "' . $email . '"';
            $res = $dbh->query($sql);
            return ($res->rowCount());
        } catch (PDOException $e) {
            print "Get (email_exist) -> Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    function username_exist($username, $dbh)
    {
        try {
            $sql =  'SELECT * from users WHERE username LIKE "' . $username . '"';
            $res = $dbh->query($sql);
            return ($res->rowCount());
        } catch (PDOException $e) {
            print "Get (username_exist) -> Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    function user_confirmed($email, $dbh)
    {
        try {
            $sql =  'SELECT * from users WHERE email LIKE "' . $email . '" AND confirm LIKE "1"';
            $res = $dbh->query($sql);
            return ($res->rowCount());
        } catch (PDOException $e) {
            print "Get (user_confirmed) -> Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    function get_userid($email, $dbh)
    {
        try {
            $sql =  'SELECT id_user from users WHERE email LIKE "' . $email . '"';
            $res = $dbh->query($sql);
            return ($res);
        } catch (PDOException $e) {
            print " Get (get_userid) -> Erreur !: " . $e->getMessage() . "<br/>";
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