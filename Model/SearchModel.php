<?php
class SearchModel
{
    private $connect;

    public function __construct()
    {
        $this->connect = getDatabaseConnexion();
    }

    public function searchUsers($filters)
    {
        $sql = "SELECT *, TIMESTAMPDIFF(YEAR, birthdate, CURDATE()) AS age FROM user WHERE 1=1";
        $params = [];

        if (!empty($filters['genre'])) {
            $sql .= " AND genre = ?";
            $params[] = $filters['genre'];
        }


        $city = array_filter(array_merge(
            $filters['city'] ?? [],
            !empty($filters['city_other']) ? [$filters['city_other']] : []
        ));

        if (!empty($city)) {
            $placeholders = implode(',', array_fill(0, count($city), '?'));
            $sql .= " AND city IN ($placeholders)";
            $params = array_merge($params, $city);
        }


        if (!empty($filters['age'])) {
            switch ($filters['age']) {
                case '18-25':
                    $sql .= " AND age BETWEEN 18 AND 25";
                    break;
                case '25-35':
                    $sql .= " AND age BETWEEN 25 AND 35";
                    break;
                case '35-45':
                    $sql .= " AND age BETWEEN 35 AND 45";
                    break;
                case '45+':
                    $sql .= " AND age >= 45";
                    break;
            }
        }


        $loisir = array_filter(array_merge(
            $filters['loisir'] ?? [],
            !empty($filters['loisir_other']) ? [$filters['loisir_other']] : []
        ));

        if (!empty($loisir)) {
            $placeholders = implode(',', array_fill(0, count($loisir), '?'));
            $sql .= " AND id IN (
                SELECT user_id FROM user_loisir WHERE loisir IN ($placeholders)
            )";
            $params = array_merge($params, $loisir);
        }

        $stmt = $this->connect->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
