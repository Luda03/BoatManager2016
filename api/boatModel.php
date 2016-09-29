<?php
/**
 * Created by PhpStorm.
 * User: Dan
 * Date: 28.09.2016
 * Time: 12:55
 */
class BoatModel
{

    /**
     * Récupère les tous les bateaux de la base
     * @return array
     */
    public static function getBoatsList($userid)
    {
        try {
            
            $pdo = Database::getInstance();
            $sth = $pdo->prepare("SELECT * FROM boats WHERE user_id_FK = :iduser ORDER BY id_boat");
            $sth->bindParam(':iduser', $userid);
            $sth->execute();
            $datas = $sth->fetchAll(PDO::FETCH_ASSOC);
            return $datas;
        } catch (Exception $e) {
            echo 'Message: ' . $e->getMessage();
        }

        return false;
    }

}