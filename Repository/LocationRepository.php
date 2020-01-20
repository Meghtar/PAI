<?php

require_once "Repository.php";

class LocationRepository extends Repository {
    public function getLocationGPSById($location_id): string
    {
        $stmt = $this->database->connect()->prepare('
            SELECT location_gps FROM locations WHERE location_id = :location_id
        ');
        $stmt->bindParam(':location_id', $location_id, PDO::PARAM_STR);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result['location_gps'];
    }

    public function getLastId(): int
    {
        $stmt = $this->database->connect()->prepare('
            SELECT MAX(location_id) FROM locations
        ');
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result['MAX(location_id)'];
    }

    public function addLocation($name, $gps, $visible=true): int
    {
        $last_id = $this->getLastId();
        $stmt = $this->database->connect()->prepare('
        INSERT INTO locations
        (location_name, location_gps, location_visible) 
        VALUES 
        (:name, :gps, :visible)
        ');

        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':gps', $gps, PDO::PARAM_STR);
        $stmt->bindParam(':visible', $visible, PDO::PARAM_INT);
        $stmt->execute();

        return $last_id + 1;
    }
}

?>