<?php

include 'Model/ConnexionModel.php';

class ConnexionController
{
    private $connexion;

    public function __construct()
    {
        $this->connexion = new ConnexionModel();
    }

    public function login_user()
    {
        require "View/ConnexionView.php";
    }

    public function VerifConnect()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST" && !empty($_POST)) {
            $email = $_POST["email"] ?? '';
            $password = $_POST["password"] ?? '';

            if (empty($email) || empty($password)) {
                echo "Saississez l'email et le mot  de passe.";
                return;
            }


            //$this->connexion->getDatabaseConnexion();

            if ($this->connexion->verifUser($email, $password)) {
                echo "Bienvenue.";
            } else {
                echo "email ou password incorrect.";
            }
        }
    }
}
