<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// require_once __DIR__ . '/../Config/bdd.php';



class ConnexionModel{
private $connect;

public function __construct()
{
    $this->connect = getDatabaseConnexion();
}


public function verifUser($email, $password)
{
    $stmt = $this->connect->prepare("SELECT password FROM users WHERE email = :email");
    $stmt->execute(['email' => $email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        return true;
    }
    return false;
}













}