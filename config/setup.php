<?php
    try {
        $dbh->exec(file_get_contents("config/camagru.sql"));
    } catch (PDOException $e) {
        print "Setup -> Erreur (setup) !: " . $e->getMessage() . "<br/>";
        die();
    }
?>