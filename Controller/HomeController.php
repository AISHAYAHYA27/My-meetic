<?php

require_once 'Model/HomeModel.php';

class HomeController
{
    private $model;

    public function __construct($db)
    {
        $this->model = new HomeModel($db);
    }

    public function flexCarrousel()
    {

        $user = $this->model->carrousel();

        extract(['user' => $user]);

        include 'View/homeView.php';
    }
}
