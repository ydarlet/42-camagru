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

    // function update_username($username, $new_username, $dbh)
    // {
    //     try {
    //         $query = "UPDATE `USERS` SET `username` = '" . $new_username . "' 
    //                     WHERE `USERS`.`username` = '" . $username . "';";
    //         $dbh->exec($query);
    //         return (1);
    //     } catch (PDOException $e) {
    //         print " Update (update_username) -> Erreur !: " . $e->getMessage() . "<br/>";
    //         die();
    //     }
    // }

    function update_username($user_id, $new_username, $dbh)
    {
        try {
            // $query = "UPDATE `USERS` SET `username` = '" . $new_username . "' 
            //             WHERE `USERS`.`id_user` = '" . $user_id . "';";
            // $dbh->exec($query);
            $query = $dbh->prepare('UPDATE USERS SET username = :new_username WHERE id_user = :id');
			$query->execute([
				'new_username' => $new_username,
				'id' => $user_id
			]);
            return (1);
        } catch (PDOException $e) {
            print " Update (update_username) -> Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    function update_email($user_id, $new_email, $dbh)
    {
        try {
            $query = $dbh->prepare('UPDATE USERS SET email = :new_email WHERE id_user = :id');
			$query->execute([
				'new_email' => $new_email,
				'id' => $user_id
			]);
            return (1);
        } catch (PDOException $e) {
            print " Update (update_email) -> Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    function update_password($user_id, $new_password, $dbh)
    {
        try {
            $query = $dbh->prepare('UPDATE USERS SET password = :new_password WHERE id_user = :id');
			$query->execute([
				'new_password' => $new_password,
				'id' => $user_id
			]);
            return (1);
        } catch (PDOException $e) {
            print " Update (update_password) -> Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    // $req2 = $pdo->prepare('UPDATE User SET email = :email WHERE id = :id');
	// 		$req2->execute([
	// 			'email' => $_POST['email'],
	// 			'id' => $user_id
	// 		]);

    /*
    $sql =  'SELECT * from users';
    foreach  ($dbh->query($sql) as $row) {
        print $row['username'] . "\t";
    }
    */

?>