<?php

namespace App\Repositories;

use App\Models\Event;
use App\Models\Image;
use App\Models\EventType;
use PDO;
use PDOException;
use Exception;

class FestivalRepository extends Repository
{

    function getAllMainEvents()
    {
        try {
            $stmt = $this->connection->prepare("
            SELECT distinct e.*,i.*, me.* FROM `main_events` me 
            join EVENTS e on e.event_id= me.event_id
            join event_image ei on ei.event_id = me.event_id
            join images i on i.image_id=ei.image_id");
            $stmt->execute();
            $events = $stmt->fetchAll();
            if (empty($events)) {
                // handle empty result set
                return array();
            }
            return $events;
        } catch (PDOException $e) {
            throw new Exception("Error getting all events:" . $e->getMessage());
        }
    }
}
