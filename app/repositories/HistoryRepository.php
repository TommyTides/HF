<?php
namespace App\Repositories;

use PDO;

class HistoryRepository extends Repository
{
    public function getAllLocations()
    {
        try {
            $stmt = $this->connection->prepare("
                SELECT DISTINCT l.*, im.*
                FROM locations l
                INNER JOIN event_location el ON el.location_id = l.location_id
                INNER JOIN location_image li ON li.location_id = el.location_id
                INNER JOIN images im ON im.image_id = li.image_id
                WHERE im.image LIKE '%-primary.%' AND el.event_id = 1
                ORDER BY l.location_id ASC
            ");
            $stmt->execute();

            $locations = $stmt->fetchAll(PDO::FETCH_CLASS, 'App\\Models\\Location');
            return $locations;
        } catch (PDOException $e) {
            throw new Exception("Error getting all locations: " . $e->getMessage());
        }
    }

    public function getEvent()
    {
        try {
            // Event type 2 - history event(A stroll through History)
            $stmt = $this->connection->prepare("SELECT * FROM events WHERE event_type = 2");
            $stmt->execute();
            $event = $stmt->fetchObject('App\\Models\\Event');
            return $event;
        } catch (PDOException $e) {
            throw new Exception("Error getting description: " . $e->getMessage());
        }
    }

    public function getGeneralInformation()
    {
        try {
            // event_id 1 - A stroll through History
            $stmt = $this->connection->prepare("SELECT information FROM event_information WHERE event_id = 1");
            $stmt->execute();

            $generalInformation = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $generalInformation;
        } catch (PDOException $e) {
            throw new Exception("Error getting event information: " . $e->getMessage());
        }
    }
}
