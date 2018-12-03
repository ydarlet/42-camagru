<?php

    /* CONFIG MAISON  */
    
    $DB_DSN = 'mysql:host=localhost;dbname=camagru';
    $DB_USER = 'root';
    $DB_PASSWORD = 'Root108#';
    
    /* CONFIG 42 PAMP  */
    /*
    $DB_DSN = 'mysql:host=localhost';
    $DB_USER = 'root';
    $DB_PASSWORD = 'mysql108';
    */
    
    /* CONFIG 42 Bitnami MAMP  */
    /*
    $DB_DSN = 'mysql:host=localhost';
    $DB_USER = 'root';
    $DB_PASSWORD = 'mysql108';
    */

    /* Test de Connexion  */
    try {
        $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo 'Database -> Échec lors de la connexion : ' . $e->getMessage();
    }

    /* MDP UserTest et Root */
    /* root - Root108# */
    /* ydarlet - Yann108# */
    /* sel #?. */
    /* algo hash : whirlpool */

?>