<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class ProfilModel
{
    private $connect;

    public function __construct()
    {
        $this->connect = $this->getDatabaseConnexion();
    }

    private function getDatabaseConnexion()
    {
        require_once 'Config/bdd.php';
        return getDatabaseConnexion();
    }


    public function getProfile($userId)
    {
        $stmt = $this->connect->prepare("SELECT firstname, lastname, email, status FROM user WHERE id = ?");
        $stmt->execute([$userId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateProfile($userId, $firstName, $lastName, $email)
    {
        $stmt = $this->connect->prepare("UPDATE user SET firstname = ?, lastname = ?, email = ? WHERE id = ?");
        return $stmt->execute([$firstName, $lastName, $email, $userId]);
    }

    public function addLoisir($userId, $loisirName)
    {
        $checkStmt = $this->connect->prepare("SELECT id FROM loisir WHERE user_id = ? AND loisir_name = ?");
        $checkStmt->execute([$userId, $loisirName]);

        if ($checkStmt->fetch()) {
            return false;
        }


        $stmt = $this->connect->prepare("INSERT INTO loisir (user_id, loisir_name) VALUES (?, ?)");
        return $stmt->execute([$userId, $loisirName]);
    }

    public function deactivateAccount($userId)
    {
        $stmt = $this->connect->prepare("UPDATE user SET status = 0 WHERE id = ?");
        return $stmt->execute([$userId]);
    }


    public function reactivateAccount($userId)
    {
        $stmt = $this->connect->prepare("UPDATE user SET status = 1 WHERE id = ?");
        return $stmt->execute([$userId]);
    }
}
