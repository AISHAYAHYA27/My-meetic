<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if (!function_exists('getDatabaseConnexion')) {
function getDatabaseConnexion()
{
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=meetic', 'aisha', 'aisha@27');
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $bdd;
    } catch (PDOException $e) {
        die("Erreur de connexion : " . $e->getMessage());
    }
}

}