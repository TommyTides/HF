<?php
namespace App\Repositories;

use App\Models\APIKey;
use PDO;
use PDOException;

class APIKeyRepository extends Repository{
    public function getAllKeys(){
        try {
            $stmt = $this->connection->prepare("SELECT * FROM apikey");
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'APIKey');
            return $stmt->fetchAll();

        } catch (PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }
    public function getAPIKey(string $query, int $id): APIKey|null
    {
        try {
            $stmt = $this->connection->prepare($query);
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'APIKey');
            return $stmt->fetch();

        } catch (PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }
    public function insertAPIKey($apiKey): void
    {
        try {
            $sql = "INSERT INTO apikey (api_key, created_at, userId) VALUES (:api_key, :created_at, :user_id)";
            $stmt = $this->connection->prepare($sql);
            $stmt->bindParam(':api_key', $apiKey->getApi_key());
            $stmt->bindParam(':created_at', $apiKey->getCreated_at());
            $stmt->bindParam(':user_id', $apiKey->getUserID()); 
            $stmt->execute();

        } catch (PDOException $e) {
            echo $e->getMessage();
            return;
        }
    }
    public function getAPIKeysByUser(string $query, int $id): APIKey|array|null
    {
        try {
            $stmt = $this->connection->prepare($query);
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'APIKey');
            return $stmt->fetchAll();

        } catch (PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }
    public function deleteKey($id){
        try {
            $sql = "DELETE FROM apikey WHERE id = :id";
            $stmt = $this->connection->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();

        } catch (PDOException $e) {
            echo $e->getMessage();
            return;
        }
    }
    public function validateAPIKey($key){
        try {
            $sql = "SELECT api_key FROM apikey WHERE api_key = :key";
            $stmt = $this->connection->prepare($sql);
            $stmt->bindParam(':key', $key);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'APIKey');
            return $stmt->fetch();

        } catch (PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }

}