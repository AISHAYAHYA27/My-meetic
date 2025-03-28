
<?php
require_once __DIR__ . '/Controller/SearchController.php';
require_once __DIR__ . '/Config/bdd.php';


$pdo = getDatabaseConnexion();
$searchController = new SearchController($pdo);
$searchController->search();
?>
