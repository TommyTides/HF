<?php
namespace App\Repositories;

use PDO;
use PDOException;
use App\Models\Artist;

class ArtistRepository extends Repository
{
    /**
     * Get single artist
     */
    public function getArtist(string $query, int $id): Artist|null
    {
        try {
            $stmt = $this->connection->prepare($query);
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'App\\Models\\Artist');
            return $stmt->fetch();

        } catch (PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }
    /**
     * Get all the artists from a single event
     */
    public function insertArtist(Artist $artist): void
    {
        try {
            $stmt = $this->connection->prepare("INSERT INTO artists (artist_name, first_name, last_name, biography, member_description, event_type) VALUES (:artist_name, :first_name, :last_name, :biography, :member_description, :event_type)");
            $stmt->bindParam(':artist_name', $artist->getArtistName());
            $stmt->bindParam(':first_name', $artist->getFirstName());
            $stmt->bindParam(':last_name', $artist->getLastName());
            $stmt->bindParam(':biography', $artist->getBiography());
            $stmt->bindParam(':member_description', $artist->getMemberDescription());
            $stmt->bindParam(':event_type', $artist->getEventType());
            $stmt->execute();

        } catch (PDOException $e) {
            echo $e->getMessage();
            return;
        }
    }
    /**
     * Get all the artists from a single event
     */
    public function getArtistsByEvent(string $query, int $id): Artist|array|null
    {
        try {
            $stmt = $this->connection->prepare($query);
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'App\\Models\\Artist');
            return $stmt->fetchAll();

        } catch (PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }

    function getAll() {
        $stmt = $this->connection->prepare("SELECT * FROM artists");
        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_CLASS, 'App\\Models\\Artist');
        $artists = $stmt->fetchAll();

        return $artists;
    }

    function getById($id)
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM artists WHERE artist_id = :id");
            $stmt->bindValue(":id", $id);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'App\\Models\\Artist');
            $artist = $stmt->fetch();

            return $artist;

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    function deleteArtist($id)
    {
        try {
            $stmt = $this->connection->prepare("DELETE FROM artists WHERE artist_id = :id");
            $stmt->bindValue(":id", $id);
            $stmt->execute();
            return true;

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    function getAllAppearances($artist_name)
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM `events` WHERE LOWER(`name`) LIKE LOWER(:artist_name) ORDER BY `start_time` ASC");
            $stmt->bindValue(":artist_name", "%$artist_name%");
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'App\\Models\\Event');
            return $stmt->fetchAll();

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    function getArtistPage($artist_name)
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM artist_page WHERE `name` = :artist_name");
            $stmt->bindValue(":artist_name", "%$artist_name%");
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'App\\Models\\ArtistPage');
            return $stmt->fetch();

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    function getAllSlides($artist_name)
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM artist_slide WHERE artist_id = (SELECT artist_id FROM artists WHERE artist_name = :artist_name)");
            $stmt->bindValue(":artist_name", $artist_name);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'App\\Models\\Slide');
            $artists = $stmt->fetchAll();

            return $artists;

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    function updateArtist($artist)
    {
        try {
            $stmt = $this->connection->prepare("UPDATE artists SET artist_name= :artist_name, first_name= :first_name, last_name= :last_name, biography= :biography, member_description= :member_description, event_type= :event_type WHERE artist_id = :artist_id");
            $stmt->bindValue(":artist_id",              $artist->getArtistId());
            $stmt->bindValue(":artist_name",            $artist->getArtistName());
            $stmt->bindValue(":first_name",             $artist->getFirstName());
            $stmt->bindValue(":last_name",              $artist->getLastName());
            $stmt->bindValue(":biography",              $artist->getBiography());
            $stmt->bindValue(":member_description",     $artist->getMemberDescription());
            $stmt->bindValue(":event_type",             $artist->getEventType());
            
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'App\\Models\\Slide');
            $artists = $stmt->fetchAll();

            return $artists;

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function getArtistProfileImage(string $query, $id, $imageType)
    {
        try {
            $stmt = $this->connection->prepare($query);
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':imageType', $imageType);
            $stmt->execute();
            return $stmt->fetchColumn();
        } catch (PDOException $e) {
            return "";
        }
    }
}

