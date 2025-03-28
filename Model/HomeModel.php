<?php

class HomeModel
{
    private $connect;

    public function __construct()
    {
        $this->connect = getDatabaseConnexion();
    }

    public function carrousel()
    {
        $sql = $this->connect->query("SELECT firstname, pseudo, profile_pic, birthdate, loisir_name FROM user");
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function calculateAge($birthdate)
    {
        $birthDate = new DateTime($birthdate);
        $currentDate = new DateTime();
        $interval = $birthDate->diff($currentDate);
        return $interval->y;
    }
}
