<?php

    /* BIBLIOTHEQUE DES FUNCTIONS QUI EXECUTENT LES REQUETES SQL POUR L'INSCRIPTION D'UN UTILISATEUR */

    function exist_email($email, $dbh)
    {
        try {
            $sql =  'SELECT * from users WHERE email LIKE "' . $email . '"';
            $res = $dbh->query($sql);
            return ($res->rowCount());
        } catch (PDOException $e) {
            print "Inscription (exist_email) -> Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    function create_user($username, $email, $password, $dbh)
    {
        try {
            $time = time();
            $query = "INSERT INTO `users` (`id`, `username`, `password`, `email`, `confirm`, `recover`) VALUES
            (" . $time . ", '" . $username . "', '" . $password . "', '" . $email . "', '0', NULL);";
            $dbh->exec($query);
            return ($time);
        } catch (PDOException $e) {
            print "Inscription (create_user) -> Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
    }

?>