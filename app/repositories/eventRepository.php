<?php
namespace App\Repositories;

use App\Models\Event;
use App\Models\Image;
use App\Models\EventType;
use PDO;
use PDOException;
use Exception;

class EventRepository extends Repository
{
    /**
     * Get a single event
     */
    function getEvent(int $id): Event|null
    {
        try {
            $stmt = $this->connection->prepare("SELECT *FROM `events` WHERE event_id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'App\\Models\\Event');
            return $stmt->fetch();

        } catch (PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }

    /**
     * Returns all dance events
     */
    function getAllDanceEvents(): array | null
    {
        try {
            $stmt = $this->connection->prepare("SELECT e.start_time, e.event_id, e.name, e.description FROM events AS e INNER JOIN products as p
            ON e.event_id = p.event_id WHERE e.event_type = 1 AND p.product_type = 2 ORDER BY e.start_time ASC;");
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'App\\Models\\Event');
            return $stmt->fetchAll();

        } catch (PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }
    public function getEventBanner(int $getEventId)
    {
        try {
            $stmt = $this->connection->prepare("SELECT image FROM `event_image` as ei
                    INNER JOIN events as e 
                    ON ei.event_id = e.event_id
                    INNER JOIN images as i
                    ON ei.image_id = i.image_id
                    WHERE i.image LIKE '%banner.%'
                    AND e.event_id = :id");
            $stmt->bindParam(':id', $getEventId);
            $stmt->execute();
            return $stmt->fetchColumn();
        } catch (PDOException $e) {
            return "";
        }
    }

    function getAllEvents()
    {
        try {
            $stmt = $this->connection->prepare("SELECT DISTINCT e.* FROM events e");
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

    function getEventByID()
    {
        if (isset($_GET['id'])) {
            // Build query
            $query = "SELECT event_id, name, description, sub_description, start_time, end_time FROM `events` WHERE event_id = :id";

            // Get event
            return $this->getEvent($query, $_GET['id']);
        } else {
            return null;
        }
    }
    public function getAllEventTypes()
    {

        try {
            $stmt = $this->connection->prepare("SELECT * FROM event_type");
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $eventTypes = $stmt->fetchAll();
            if (empty($eventTypes)) {
                // handle empty result set
                return array();
            }
            return $eventTypes;

        } catch (PDOException $e) {
            throw new Exception("Error getting all event types:" . $e->getMessage());
        }
    }


    public function deleteEvent($id)
    {
        try {
            $stmt = $this->connection->prepare("DELETE FROM events WHERE event_id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();

        } catch (PDOException $e) {
            throw new Exception("Error deleting event:" . $e->getMessage());
        }
    }
    public function createEvent($data)
    {
        try {
            $stmt = $this->connection->prepare("INSERT INTO events (name, description, sub_description, start_time, end_time, event_type) VALUES (:name, :description, :sub_description, :start_time, :end_time, :event_type)");
            $stmt->bindParam(':name', $data['name']);
            $stmt->bindParam(':description', $data['description']);
            $stmt->bindParam(':sub_description', $data['sub_description']);
            $stmt->bindParam(':start_time', $data['start_time']);
            $stmt->bindParam(':end_time', $data['end_time']);
            $stmt->bindParam(':event_type', $data['event_type']);
            //$stmt->bindParam(':no_of_seats', $data['no_of_seats']);
            $stmt->execute();

            return $this->connection->lastInsertId();
        } catch (PDOException $e) {
            throw new Exception("Error creating event:" . $e->getMessage());
        }
    }
    function updateEvent($event)
    {
        try {
            $stmt = $this->connection->prepare("UPDATE events SET name = :name, description = :description, sub_description = :sub_description, start_time = :start_time, end_time = :end_time,event_type = :event_type WHERE event_id = :id");
            $stmt->bindParam(':name', $event->getName(), PDO::PARAM_STR);
            $stmt->bindParam(':description', $event->getDescription(), PDO::PARAM_STR);
            $stmt->bindParam(':sub_description', $event->getSubDescription(), PDO::PARAM_STR);
            $stmt->bindParam(':start_time', $event->getStartTime(), PDO::PARAM_STR);
            $stmt->bindParam(':end_time', $event->getEndTime(), PDO::PARAM_STR);
            $stmt->bindParam(':event_type', $event->getEventType(), PDO::PARAM_INT);
            $stmt->bindParam(':id', $event->getEventId(), PDO::PARAM_INT);
            //$stmt->bindParam(':no_of_seats', $event->getNoOfSeats(), PDO::PARAM_INT);

            $stmt->execute();

        } catch (PDOException $e) {
            throw new Exception("Error updating event:" . $e->getMessage());
        }
    }

    public function updateEventLocation($event_id, $location_id)
    {
        try {
            $stmt = $this->connection->prepare("UPDATE event_location SET location_id = :location_id WHERE event_id = :id");
            $stmt->bindParam(':location_id', $location_id);
            $stmt->bindParam(':id', $event_id);
            $stmt->execute();

        } catch (PDOException $e) {
            throw new Exception("Error updating event location:" . $e->getMessage());
        }
    }
    public function insertEventImage($event_id, $image_id)
    {
        try {
            $stmt = $this->connection->prepare("INSERT INTO event_image (event_id, image_id) VALUES (:event_id, :image_id)");
            $stmt->bindParam(':event_id', $event_id);
            $stmt->bindParam(':image_id', $image_id);
            $stmt->execute();

        } catch (PDOException $e) {
            throw new Exception("Error inserting event image:" . $e->getMessage());
        }
    }
    public function getEventImage($event_id)
    {
        try {
            $stmt = $this->connection->prepare("SELECT i.image,i.image_id FROM images i 
            inner join event_image ei on ei.image_id= i.image_id
            where ei.event_id = :event_id");
            $stmt->bindParam(':event_id', $event_id);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'App\\Models\\Image');

            $images = $stmt->fetch();
            if (empty($images)) {
                // handle empty result set
                return array();
            }
            return $images;

        } catch (PDOException $e) {
            throw new Exception("Error getting image for event:" . $e->getMessage());
        }
    }
    public function updateEventImage($imageName, $newImageName)
    {
        try {
            $stmt = $this->connection->prepare("UPDATE images SET image = :newImageName WHERE image = :image");
            $stmt->bindParam(':image', $imageName[0]);
            $stmt->bindParam(':newImageName', $newImageName);
            $stmt->execute();

        } catch (PDOException $e) {
            throw new Exception("Error updating event image:" . $e->getMessage());
        }
    }

}