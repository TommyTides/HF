<?php
namespace App\Repositories;

use PDO;

class JazzRepository extends Repository {

    function getAllArtists() {
        $stmt = $this->connection->prepare("SELECT * FROM artists");
        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_CLASS, 'App\\Models\\Artist');
        $artists = $stmt->fetchAll();

        return $artists;
    }

    function getArtistImage($artist_id) {
        $stmt = $this->connection->prepare("SELECT * FROM artist_image WHERE artist_id = :artist_id");
        $stmt->bindParam(':artist_id', $artist_id);
        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_CLASS, 'App\\Models\\ArtistImage');
        $artist_image = $stmt->fetch();

        return $artist_image;
    }

    function getImage($image_id) {
        $stmt = $this->connection->prepare("SELECT * FROM images WHERE image_id = :image_id");
        $stmt->bindParam(':image_id', $image_id);
        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_CLASS, 'App\\Models\\Image');
        $image = $stmt->fetch();

        return $image;
    }
}