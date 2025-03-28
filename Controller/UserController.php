<?php

include 'Model/UserModel.php';

class UserController
{
    public $Model;

    public function __construct()
    {
        $this->Model = new UserModel();
    }

    public function Register_user()
    {
        require "View/InscriptionView.php";
    }

    public function addUser()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST" && !empty($_POST)) {

            if (!isset($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                echo "l'email est invalide.";
                exit();
            }
            $email = htmlspecialchars($_POST['email']);


            if (!isset($_POST['birthdate'])) {
                echo "Entrez votre date de naissance.";
                exit();
            }

            $birthdate = $_POST['birthdate'];
            $year = date('Y', strtotime($birthdate));
            $currentYear = date('Y');
            $age = $currentYear - $year;

            if ($age < 18) {
                echo "Ce site est réservé aux +18 ans.";
                exit();
            }

            if (!isset($_POST['password']) || empty($_POST['password'])) {
                echo "Entrez un mot de passe.";
                exit();
            }

            $password = $_POST['password'];
            $passwordRegex = "/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/";

            if (!preg_match($passwordRegex, $password)) {
                echo "Entrez un mot de passe valide.";
                exit();
            }

            $connect = [
                'lastname'  => htmlspecialchars($_POST['lastname'] ?? ''),
                'firstname' => htmlspecialchars($_POST['firstname'] ?? ''),
                'pseudo'    => htmlspecialchars($_POST['pseudo'] ?? ''),
                'birthdate' => $birthdate,
                'email'     => $email,
                'password'  => password_hash($_POST['password'], PASSWORD_DEFAULT),
                'city'      => htmlspecialchars($_POST['city'] ?? ''),
                'country'   => htmlspecialchars($_POST['country'] ?? ''),
                'id_genre'  => (int) ($_POST['genre'] ?? 0),
                'loisir_name' => htmlspecialchars($_POST['loisir_name'] ?? ''),
            ];


            if ($this->Model->insertUser($connect)) {
                echo "Inscription réussie.";
                require "View/ConnexionView.php";
                exit();
            } else {
                echo "Erreur lors de l'inscription.";
            }
        }
    }
}
