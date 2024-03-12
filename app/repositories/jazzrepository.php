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
}