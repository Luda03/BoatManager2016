<?php
/**
 * Created by PhpStorm.
 * User: Dan
 * Date: 27.09.2016
 * Time: 18:58
 */
include('config.php');

class Database
{
    private static $_instance;

    //constructeur pdo
    private static function getPDO()
    {
        $pdo = new PDO('mysql:host=' . DBHOST . ';port=' . DBPORT . '; dbname=' . DBNAME . '', DBUSER, DBPASSWD);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $pdo;
    }

    //pas utilisée, créée pour empécher l'instantiation à l'extérieure de la classe
    private function __construct()
    {

    }

    //pas utilisée, créée pour empécher le clonage de la classe
    private function __clone()
    {

    }

    //fonction d'instantiation du PDO
    public static function getInstance()
    {
        if (is_null(self::$_instance)) {
            self::$_instance = self::getPDO();
        }

        return self::$_instance;
    }

}