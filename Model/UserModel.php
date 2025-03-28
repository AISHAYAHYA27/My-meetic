<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require 'Config/bdd.php';

class UserModel
{
    private $connect;

    public function __construct()
    {
        $this->connect = getDatabaseConnexion();
    }

    public function insertUser($bd)
    {
        $sql = "INSERT INTO user (lastname, firstname, pseudo, birthdate, email, password, city, country, id_genre, loisir_name)
                VALUES (:lastname, :firstname, :pseudo, :birthdate, :email, MD5(:password), :city, :country, :id_genre, :loisir_name)";

        $stmt = $this->connect->prepare($sql);
        return $stmt->execute($bd);
    }
}
