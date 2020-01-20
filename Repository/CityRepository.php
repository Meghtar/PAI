<?php

require_once "Repository.php";
require_once __DIR__.'/../Models/City.php';

class CityRepository extends Repository {
    public function getLocationByCityId($city_id): int
    {
        $stmt = $this->database->connect()->prepare('
            SELECT location_id FROM cities WHERE city_id = :city_id
        ');
        $stmt->bindParam(':city_id', $city_id, PDO::PARAM_INT);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $result = (int) $result['location_id'];

        return $result;
    }

    public function getCityIdByName($name): int
    {
        $stmt = $this->database->connect()->prepare('
            SELECT city_id FROM cities WHERE city_name = :name
        ');
        $stmt->bindParam(':name', $name, PDO::PARAM_INT);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $result = (int) $result['city_id'];
        
        return $result;
    }

    public function getCityNameById($id): string
    {
        $stmt = $this->database->connect()->prepare('
            SELECT city_name FROM cities WHERE city_id = :id
        ');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $result = $result['city_name'];
        
        return $result;
    }
}

?>