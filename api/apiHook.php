<?php
/**
 * Created by PhpStorm.
 * User: Dan
 * Date: 27.09.2016
 * Time: 18:58
 */
session_start();
include('../database/database.php');

$pdo = Database::getInstance();

/**
 * Insere le bateau créé par le user
 * @param  string $name le nom du bateau
 * @param  string $type le type du bateau
 */
if (isset($_POST['insert_status'])) {

    try {

        $name = $_POST['name'];
        $type = $_POST['type'];
        $iduser = $_SESSION['user_id'];

        $stmt = $pdo->prepare("INSERT INTO BOATS (name,type,user_id_FK) VALUES (:name, :type, :userid)");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':type', $type);
        $stmt->bindParam(':userid', $iduser);
        $stmt->execute();
    } //catch exception
    catch (Exception $e) {
        echo 'Message: ' . $e->getMessage();
    }

}

/**
 * Supprime le bateau choisi par le user
 * @param  int $id l'id nom du bateau
 */
if (isset ($_POST['delete_status'])) {

    try {

        $id = $_POST['id'];
        $stmt = $pdo->prepare("DELETE FROM BOATS WHERE id_boat = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    } catch (Exception $e) {
        echo 'Message: ' . $e->getMessage();
    }

}













