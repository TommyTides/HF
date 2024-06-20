<?php
namespace App\Repositories;

use App\Models\Location;
use PDO;
use Exception;
use PDOException;

class HistoryRepository extends Repository
{
    function getAllLocations()
    {
        try {
            $stmt = $this->connection->prepare("SELECT DISTINCT l.*,im.*
            FROM locations l
            INNER JOIN event_location el ON el.location_id = l.location_id
            INNER JOIN location_image li ON li.location_id = el.location_id
            INNER JOIN images im ON im.image_id = li.image_id	
            WHERE im.image LIKE '%-primary.%' AND el.event_id = 1
            ORDER BY l.location_id ASC;
            ");
            $stmt->execute();

            $locations= $stmt->fetchAll();
            if (empty($locations)) {
                // handle empty result set
                return array();
            } 
            return $locations;

        } catch (PDOException $e) {
            throw new Exception("Error getting all locations:" . $e->getMessage());
        }
    }
    function getEvent()
    {
        try {
            //Event type 2 - history event(A stroll through History)
            $stmt = $this->connection->prepare("SELECT * FROM events where event_type = 2");

            $stmt->execute();
            $event= $stmt->fetch(PDO::FETCH_ASSOC);
            return $event;

        } catch (PDOException $e) {
            throw new Exception("Error getting description:" . $e->getMessage());
        }
    }
    function getGeneralInformation(){
        try {
            //event_id 1 - A stroll through History
           $stmt = $this->connection->prepare("SELECT information FROM event_information where event_id = 1");
            $stmt->execute();
    
            $generalInformation= $stmt->fetchAll();
            if (empty($generalInformation)) {
                // handle empty resulw  t set
                return array();
            } 
            return $generalInformation;
    
        } catch (PDOException $e) {
            // handle database error
            throw new Exception("Error getting event information:" . $e->getMessage());
        }
    }
}
