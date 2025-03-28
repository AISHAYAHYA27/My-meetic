<?php
 session_start();
 require 'Controller/UserController.php';
 require 'Controller/ConnexionController.php';
 $register_controller = new UserController();
 $login_controller = new ConnexionController();
 $toto = $_GET["go"] ?? "";


 if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["city"])) {
        $register_controller->addUser();
    } elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["login_email"])) {
        $login_controller->login_user();
    } elseif ( $toto == "register") {
        $register_controller->Register_user();
    } elseif ( $toto == "login") {
        $login_controller->login_user();
    } else {
        $register_controller->Register_user();
}


require_once __DIR__ . '/Config/bdd.php';
require 'Controller/ProfilController.php';
require_once 'config/bdd.php';
$db = getDatabaseConnexion();
$profilController = new ProfilController($db);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['update_profile'])) {
        $profilController->updateProfile();
    } elseif (isset($_POST['add_loisir'])) {
        $profilController->addLoisir();
    } elseif (isset($_POST['deactivate_account'])) {
        $profilController->deactivateAccount();
    } elseif (isset($_POST['reactivate_account'])) {
        $profilController->reactivateAccount();
    }
}



require_once 'Model/HomeModel.php';
require_once 'Controller/HomeController.php';
require_once 'config/bdd.php'; 


$controller = new HomeController($db);


if ($_SERVER['REQUEST_URI'] == '/') {
    $controller->flexCarrousel();
} else {
    echo "404 - Page Not Found";
}



 ?>
                                                                                            