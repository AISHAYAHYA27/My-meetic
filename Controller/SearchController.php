<?php
require_once __DIR__ . '/../Model/SearchModel.php';

class SearchController
{
    private $userModel;

    public function __construct($pdo)
    {
        $this->userModel = new SearchModel($pdo);
    }
    public function search()
    {

        $filters = [
            'genre' => $_GET['genre'] ?? null,
            'villes' => $_GET['villes'] ?? [],
            'ville_autre' => !empty($_GET['ville_autre']) ? trim($_GET['ville_autre']) : null,
            'age' => $_GET['age'] ?? null,
            'loisirs' => $_GET['loisirs'] ?? [],
            'loisir_autre' => !empty($_GET['loisir_autre']) ? trim($_GET['loisir_autre']) : null,
        ];


        $user = $this->userModel->searchUsers($filters);


        header('Content-Type: application/json');
        echo json_encode($user);
    }
}
