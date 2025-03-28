<?php
include 'Model/ProfilModel.php';

class ProfilController
{
    private $model;

    public function __construct($db)
    {
        $this->model = new ProfilModel($db);
    }

    public function updateProfile()
    {
        session_start();
        if (!isset($_SESSION['user_id'])) {
            header("Location: /login.php");
            exit;
        }

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $userId = $_SESSION['user_id'];
            $firstName = $_POST['first_name'];
            $lastName = $_POST['last_name'];
            $email = $_POST['email'];

            if ($this->model->updateProfile($userId, $firstName, $lastName, $email)) {
                header("Location: /profile.php?success=Profil mis à jour");
            } else {
                header("Location: /profile.php?error=Échec de la mise à jour");
            }
            exit;
        }
    }

    public function addLoisir()
    {
        session_start();
        if (!isset($_SESSION['user_id'])) {
            header("Location: /login.php");
            exit;
        }

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $userId = $_SESSION['user_id'];
            $loisirName = $_POST['loisir_name'];

            if ($this->model->addLoisir($userId, $loisirName)) {
                header("Location: /profile.php?success=Loisir ajouté");
            } else {
                header("Location: /profile.php?error=Erreur lors de l'ajout du loisir");
            }
            exit;
        }
    }

    public function deactivateAccount()
    {
        session_start();
        if (!isset($_SESSION['user_id'])) {
            header("Location: /login.php");
            exit;
        }

        $userId = $_SESSION['user_id'];
        if ($this->model->deactivateAccount($userId)) {
            session_destroy();
            header("Location: /index.php?success=Compte désactivé");
        } else {
            header("Location: /profile.php?error=Erreur lors de la désactivation");
        }
        exit;
    }

    public function reactivateAccount()
    {
        session_start();
        if (!isset($_SESSION['user_id'])) {
            header("Location: /login.php");
            exit;
        }

        $userId = $_SESSION['user_id'];
        if ($this->model->reactivateAccount($userId)) {
            header("Location: /profile.php?success=Compte réactivé");
        } else {
            header("Location: /profile.php?error=Erreur lors de la réactivation");
        }
        exit;
    }
}
