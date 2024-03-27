<?php
namespace App\Repositories;

use PDO;
use PDOException;

class PaymentRepository extends Repository{


    public function getAllPayments(){
        try {
            $stmt = $this->connection->prepare("SELECT * FROM payments");
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            return $stmt->fetchAll();

        } catch (PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }
    public function getPaymentById($id){
        try {
            $stmt = $this->connection->prepare("SELECT * FROM payments WHERE payment_id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            return $stmt->fetch();

        } catch (PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }
}