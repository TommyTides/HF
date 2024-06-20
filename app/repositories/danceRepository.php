<?php
namespace App\Repositories;

use App\Services\ProductService;
use App\Services\ArtistPage;
use App\Services\Artist;
use App\Services\Slide;
use App\Services\Event;
use App\Services\DanceLocation;

use PDOException;
use PDO;

class DanceRepository extends Repository
{
    function getAllVenues()
    {
        try {
            $stmt = $this->connection->prepare("SELECT l.location_id AS id, dl.name, dl.address, dl.wheelchair_access, dl.image, dl.opening_time, dl.closing_time 
                                                FROM locations AS l 
                                                INNER JOIN dance_locations AS dl ON l.name = dl.name;");
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'App\\Models\\DanceLocation');
            $locations = $stmt->fetchAll();

            return $locations;

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    function getFestivalDays($query)
    {
        try {
            $stmt = $this->connection->prepare($query);
            $stmt->execute();
            
            $stmt->setFetchMode(PDO::FETCH_COLUMN, 0);
            return $stmt->fetchAll();

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
?>