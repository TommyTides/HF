<?php
namespace App\Repositories;

use App\Models\Location;
use App\Models\Image;
use PDO;
use PDOException;
use Exception;

/**
 * Summary of LocationRepository
 */
class LocationRepository extends Repository
{
    /**
     * Summary of Gets all locations from database
     * @throws Exception
     * @return array|null
     */
    public function getAll(): array|null
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM `locations`");
            $stmt->execute();

            $locations = $stmt->fetchAll();
            if (empty($locations)) {
                // handle empty result set
                return array();
            }
            return $locations;

        } catch (PDOException $e) {
            throw new Exception("Error getting all locations:" . $e->getMessage());
        }
    }
    /**
     * Get location by ID
     * TODO : Merge getLocationById and getLocationByEvent, code is too similar besides query...
     */
    public function getLocationById(int $id): Location|null
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM `locations` WHERE location_id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Location');
            return $stmt->fetch();
        } catch (PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }

    /**
     * Get location by event ID
     */
    public function getLocationByEvent($id): Location|null
    {
        try {
            $stmt = $this->connection->prepare("SELECT l.location_id, l.name, l.sublocation, l.description, l.motto, l.email, l.phone_number, 
                    l.phone_number_2, l.website, l.address_1, l.postal_code, l.city
                    FROM `locations` as l 
                    INNER JOIN event_location as el 
                    ON l.location_id = el.location_id
                    WHERE el.event_id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Location');
            return $stmt->fetch();
        } catch (PDOException $e) {
            echo "Error getting locations: " . $e->getMessage();
            return null;
        }
    }

    public function getLocationImages(int $id): array|null
    {
        try {
            $stmt = $this->connection->prepare("SELECT i.image_id, i.image
            FROM images i
            INNER JOIN location_image as li ON i.image_id = li.image_id
            WHERE li.location_id = :id
            AND (image LIKE '%detail%' OR image LIKE '%-primary%' OR image LIKE '%-secondary%')
            AND (image LIKE '%.png' OR image LIKE '%.jpg' OR image LIKE '%.jpeg')
            GROUP BY i.image_id
            ORDER BY i.image DESC
        ");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Image');
            $images = $stmt->fetchAll();

            return !empty($images) ? $images : null;

        } catch (PDOException $e) {
            echo "Error getting Locationimages: " . $e->getMessage();
            return null;
        }
    }

    public function getSchedule()
    {
        try {
            $stmt = $this->connection->prepare("SELECT h.date, h.time,
                GROUP_CONCAT(hel.language SEPARATOR ', ') AS languages FROM history_event_schedule h
                INNER JOIN history_event_language hel ON h.language_id = hel.id 
                GROUP BY h.date, h.time
                ORDER BY h.date, h.time;");
            $stmt->execute();
            $schedule = $stmt->fetchAll();
            return $schedule;
        } catch (PDOException $e) {
            echo "Error getting schedule: " . $e->getMessage();
            return null;
        }
    }
    /**
     * Creates new location in database
     * @param Location $location
     * @return void
     */
    public function createNewLocation(Location $location)
    {
        try {
            $stmt = $this->connection->prepare("INSERT INTO `locations` (`name`, `sublocation`, `description`, `motto`, `email`, `phone_number`,
                        `phone_number_2`, `website`, `address_1`, `postal_code`, `city`,`schedule`)
                        VALUES (:name, :sublocation, :description, :motto, :email, :phone_number, :phone_number_2, 
                        :website, :address_1, :postal_code, :city,:schedule)");

            $stmt->bindParam(':name', $location->getName());
            $stmt->bindParam(':sublocation', $location->getSublocation());
            $stmt->bindParam(':description', $location->getDescription());
            $stmt->bindParam(':motto', $location->getMotto());
            $stmt->bindParam(':email', $location->getEmail());
            $stmt->bindParam(':phone_number', $location->getPhoneNumber());
            $stmt->bindParam(':phone_number_2', $location->getPhoneNumber2());
            $stmt->bindParam(':website', $location->getWebsite());
            $stmt->bindParam(':address_1', $location->getAddress1());
            $stmt->bindParam(':postal_code', $location->getPostalCode());
            $stmt->bindParam(':city', $location->getCity());
            $stmt->bindParam(':schedule', $location->getSchedule());
            $stmt->execute();

            // Get last inserted ID
            $locationId = $this->connection->lastInsertId();

            return $locationId;

        } catch (PDOException $e) {
            echo "Error creating new location: " . $e->getMessage();
        }
    }

    public function InsertEventLocation($event_id, $location_id)
    {
        try {
            $stmt = $this->connection->prepare("INSERT INTO `event_location` (`event_id`, `location_id`) VALUES (:event_id, :location_id)");
            $stmt->bindParam(':event_id', $event_id);
            $stmt->bindParam(':location_id', $location_id);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error inserting event type: " . $e->getMessage();
        }
    }

    /**
     * Uploads the name of the image to the database
     * @param mixed $image
     * @return void
     */
    public function insertImage($image)
    {
        try {
            $stmt = $this->connection->prepare("INSERT INTO `images`(`image_id`, `image`) VALUES (null,:image)");
            $stmt->bindParam(':image', $image);
            $stmt->execute();

            $imageId = $this->connection->lastInsertId();
            return $imageId;
        } catch (PDOException $e) {
            echo "Error inserting image into db : " . $e->getMessage();
        }
    }
    /**
     * Inserts the image that belongs to the location into the location image table
     * @param mixed $image
     * @param mixed $location_id
     * @return void
     */
    public function insertLocationImage($imageId, $location_id)
    {
        try {

            $stmt = $this->connection->prepare("INSERT INTO `location_image` (`image_id`, `location_id`) VALUES (:image_id, :location_id)");
            $stmt->bindParam(':image_id', $imageId);
            $stmt->bindParam(':location_id', $location_id);
            $stmt->execute();

        } catch (PDOException $e) {
            echo "Error inserting into location image table: " . $e->getMessage();
        }
    }

    public function getLocationPrimaryImage($locationId)
    {
        try {
            $stmt = $this->connection->prepare("SELECT DISTINCT i.* FROM `images` i 
            join location_image li on li.image_id = i.image_id
            WHERE li.location_id=:id and image like '%primary.%'
        ");
            $stmt->bindParam(':id', $locationId);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Image');
            $images = $stmt->fetchAll();

            return !empty($images) ? $images : null;

        } catch (PDOException $e) {
            echo "Error getting primary images for the location: " . $e->getMessage();
            return null;
        }
    }

    public function updateLocation($location)
    {
        try {
            $name = $location->getName();
            $sublocation = $location->getSublocation();
            $description = $location->getDescription();
            $motto = $location->getMotto();
            $email = $location->getEmail();
            $phone_number = $location->getPhoneNumber();
            $phone_number_2 = $location->getPhoneNumber2();
            $website = $location->getWebsite();
            $address_1 = $location->getAddress1();
            $postal_code = $location->getPostalCode();
            $city = $location->getCity();
            $schedule = $location->getSchedule();
            $id = $location->getLocationId();
    
            $stmt = $this->connection->prepare("UPDATE `locations` 
            SET `name`=:name, `sublocation`=:sublocation,
            `description`=:description, `motto`=:motto, `email`=:email,
            `phone_number`=:phone_number, `phone_number_2`=:phone_number_2,
            `website`=:website, `address_1`=:address_1, `postal_code`=:postal_code,
            `city`=:city, `schedule`=:schedule WHERE location_id=:id");
    
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':sublocation', $sublocation);
            $stmt->bindParam(':description', $description);
            $stmt->bindParam(':motto', $motto);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':phone_number', $phone_number);
            $stmt->bindParam(':phone_number_2', $phone_number_2);
            $stmt->bindParam(':website', $website);
            $stmt->bindParam(':address_1', $address_1);
            $stmt->bindParam(':postal_code', $postal_code);
            $stmt->bindParam(':city', $city);
            $stmt->bindParam(':schedule', $schedule);
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            echo "Error updating location: " . $e->getMessage();
        }
    }

    /**
     *Deletes a location from the database based on location id 
     * @param mixed $locationId
     * @return void
     */
    public function deleteLocation($locationId)
    {
        try {
            $stmt = $this->connection->prepare("DELETE FROM `locations` WHERE location_id=:id");
            $stmt->bindParam(':id', $locationId);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error deleting location: " . $e->getMessage();
        }
    }
    /**
     * Changes the event where a specific location belongs to
     * @param mixed $location_id
     * @param mixed $event_id
     * @return void
     */
    public function updateEventLocation($location_id, $event_id){
        try {
            $stmt = $this->connection->prepare("UPDATE `event_location` SET `event_id`=:event_id WHERE `location_id`=:location_id ");
            $stmt->bindParam(':location_id', $location_id);
            $stmt->bindParam(':event_id', $event_id);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error updating event location: " . $e->getMessage();
        }
    }

    public function updateLocationImage( $location_id,$image_id){
        try {
            $stmt = $this->connection->prepare("UPDATE `location_image` SET `image_id`=:image_id WHERE `location_id`=:location_id ");
            $stmt->bindParam(':location_id', $location_id);
            $stmt->bindParam(':image_id',$image_id );
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error updating location image: " . $e->getMessage();
        }
    }

    public function getLocationImage(string $query, int $locationId, string $imageType)
    {
        try {
            $stmt = $this->connection->prepare($query);
            $stmt->bindParam(':id', $locationId);
            $stmt->bindParam(':imageType', $imageType);
            $stmt->execute();
            return $stmt->fetchColumn();
        } catch (PDOException $e) {
            echo "Error getting location image: " . $e->getMessage();
            return null;
        }
    }

}