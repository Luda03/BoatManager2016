<?php

/**
 * Created by PhpStorm.
 * User: Dan
 * Date: 28.09.2016
 * Time: 10:33
 */
class Credentials
{

    /**
     * Vérifie si la combinaison login mdp est correcte
     * @param  string $username le pseudo de l'utilisateur
     * @return boolean
     */
    public static function checkCredentials($username, $password)
    {

        try {
            //récupérer le password hashé avec la requète
            $pdo = Database::getInstance();
            $sql = 'SELECT password, id_user_PK FROM users WHERE username = :username';
            $sth = $pdo->prepare($sql);
            $sth->bindParam(':username', $username);
            $sth->execute();
            $results = $sth->fetchAll();

            if (!empty($results && password_verify($password, $results[0]['password']))) {
                return $results[0]['id_user_PK'];
            }
        } catch (Exception $e) {
            echo 'Message: ' . $e->getMessage();
        }

        return false;

    }

}