<?php
namespace App\Repositories;

use PDO;
use PDOException;

use App\Models\Order;

require_once(__DIR__ . '/../models/Order.php');

class OrderRepository extends Repository
{

    function getAll()
    {
        $sql = "SELECT * FROM `Orders`";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function getOrderProductsById($orderId)
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM order_product WHERE order_id = :order_id");
            $stmt->bindParam(':order_id', $orderId);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            // handle database error
            echo "Error getting order products:" . $e->getMessage();
        }
    }
    function getOrderProductsByOrderIdAndProductId($orderId, $product_id)
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM order_product WHERE order_id = :order_id and product_id = :product_id");
            $stmt->bindParam(':order_id', $orderId);
            $stmt->bindParam(':product_id', $product_id);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            // handle database error
            echo "Error getting order products:" . $e->getMessage();
        }
    }
    public function getScannedTicketAmountByOrderIdAndProductId($productId, $orderId)
    {
        try {
            $stmt = $this->connection->prepare("SELECT amount_scanned FROM order_product WHERE product_id = :product_id and order_id= :order_id");
            $stmt->bindParam(':product_id', $productId);
            $stmt->bindParam(':order_id', $orderId);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            // handle database error
            echo "Error getting order products:" . $e->getMessage();
        }
    }

    public function updateScannedTicketAmountByOrderIdAndProductId($order_id, $productId)
    {
        try {
            $stmt = $this->connection->prepare("UPDATE order_product SET amount_scanned = amount_scanned+1  WHERE product_id = :product_id and order_id= :order_id");
            $stmt->bindParam(':product_id', $productId);
            $stmt->bindParam(':order_id', $order_id);
            return $stmt->execute();

        } catch (PDOException $e) {
            // handle database error
            echo "Error getting order by id:" . $e->getMessage();
        }

    }
    function getOrderById($orderId): ?Order
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM orders where order_id = :order_id");
            $stmt->bindParam(':order_id', $orderId);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, Order::class);
            $result = $stmt->fetch();
            return $result;
        } catch (PDOException $e) {
            // handle database error
            echo "Error getting order by id:" . $e->getMessage();
        }
    }

    public function updateTicketStatusToScanned($productId, $orderId)
    {
        try {
            $stmt = $this->connection->prepare("UPDATE order_product SET is_scanned = 1  WHERE product_id = :product_id and order_id= :order_id");
            $stmt->bindParam(':product_id', $productId);
            $stmt->bindParam(':order_id', $orderId);
            return $stmt->execute();

        } catch (PDOException $e) {
            // handle database error
            echo "Error getting order by id:" . $e->getMessage();
        }

    }

    public function checkIfTicketScanned($productId, $orderId)
    {
        try {
            $stmt = $this->connection->prepare("SELECT is_scanned FROM order_product WHERE product_id = :product_id and order_id= :order_id");
            $stmt->bindParam(':product_id', $productId);
            $stmt->bindParam(':order_id', $orderId);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
            if ($result) {
                return $result['is_scanned'];
            } else {
                return false;
            }
        } catch (PDOException $e) {
            // handle database error
            echo "Error getting order products:" . $e->getMessage();
        }
    }

    public function getAllOrders()
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM orders ");
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            // handle database error
            echo "Error getting all orders:" . $e->getMessage();
        }
    }

    /**
     * Saves the payment information to the order database
     * @param $paymentId
     * @param $paymentInfo
     */
    public function saveOrder($mollieId, $status, $amount, $paymentInfo): ?int
    {
        try {
            $stmt = $this->connection->prepare("INSERT INTO orders
                                                        (`mollie_id`, `email`, `phone_number`, 
                                                         `billing_first_name`, 
                                                         `billing_last_name`, `billing_street`, 
                                                         `billing_house_number`, `billing_postal_code`, 
                                                         `billing_city`, `billing_state`, `billing_country`, `timestamp`) 
                                                    VALUES (:mollie_id, :email, :phone_number, :billing_first_name, :billing_last_name,
                                                            :billing_street, :billing_house_number, :billing_postal_code,
                                                            :billing_city, :billing_state, :billing_country, NOW())");
            $stmt->bindParam(':mollie_id', $mollieId);
            $stmt->bindParam(':email', $paymentInfo['email']);
            $stmt->bindParam(':phone_number', $paymentInfo['phoneNumber']);
            $stmt->bindParam(':billing_first_name', $paymentInfo['firstName']);
            $stmt->bindParam(':billing_last_name', $paymentInfo['lastName']);
            $stmt->bindParam(':billing_street', $paymentInfo['street']);
            $stmt->bindParam(':billing_house_number', $paymentInfo['houseNumber']);
            $stmt->bindParam(':billing_postal_code', $paymentInfo['zip']);
            $stmt->bindParam(':billing_city', $paymentInfo['city']);
            $stmt->bindParam(':billing_state', $paymentInfo['state']);
            $stmt->bindParam(':billing_country', $paymentInfo['country']);
            $stmt->execute();
            // Return the new payment ID
            return $this->connection->lastInsertId();
        } catch (PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }

    /**
     * Saves the order items to the database
     */
    public function saveOrderProducts($orderId, $products): void
    {
        try {
            $stmt = $this->connection->prepare("INSERT INTO order_product (`order_id`, `product_id`, `amount` , `is_scanned`) 
                                                VALUES (:order_id, :product_id, :amount, 0)");
            $stmt->bindParam(':order_id', $orderId);

            foreach ($products as $product) {
                $productId = $product->getProductId();
                $amount = $product->getAmount();

                $stmt->bindParam(':product_id', $productId);
                $stmt->bindParam(':amount', $amount);
                $stmt->execute();
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
            return;
        }
    }

    /**
     * Gets the user's orders by email
     * @param $email
     * @return array|false
     */
    public function getUserOrdersByEmail($email): bool|array|null
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM orders WHERE email = :email");
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, "Order");
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }

    /**
     * Gets the order by the Mollie ID
     * @param $mollieID
     * @return mixed
     */
    public function getOrderByMollieID($mollieID): mixed
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM orders WHERE mollie_id = :mollie_id");
            $stmt->bindParam(':mollie_id', $mollieID);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, "Order");
            return $stmt->fetch();
        } catch (PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }

    /**
     * Deletes the order by the ID
     * @param $getId
     * @return void|null
     */
    public function deleteOrder($getId)
    {
        try {
            $stmt = $this->connection->prepare("DELETE FROM orders WHERE order_id = :order_id");
            $stmt->bindParam(':order_id', $getId);
            $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function updateOrder($order)
    {
        try {
            $stmt = $this->connection->prepare("UPDATE orders SET email = :email, phone_number = :phone_number, 
                                                billing_first_name = :billing_first_name, 
                                                billing_last_name = :billing_last_name, billing_street = :billing_street, 
                                                billing_postal_code = :billing_postal_code, 
                                                billing_city = :billing_city
                                                WHERE order_id = :order_id");

            $orderId = $order->getOrderId();
            $email = $order->getEmail();
            $phoneNumber = $order->getPhoneNumber();
            $billingFirstName = $order->getBillingFirstName();
            $billingLastName = $order->getBillingLastName();
            $billingStreet = $order->getBillingStreet();
            $billingPostalCode = $order->getBillingPostalCode();
            $billingCity = $order->getBillingCity();

            $stmt->bindParam(':order_id', $orderId);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':phone_number', $phoneNumber);
            $stmt->bindParam(':billing_first_name', $billingFirstName);
            $stmt->bindParam(':billing_last_name', $billingLastName);
            $stmt->bindParam(':billing_street', $billingStreet);
            $stmt->bindParam(':billing_postal_code', $billingPostalCode);
            $stmt->bindParam(':billing_city', $billingCity);

            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    /**
     * Gets the order by the mollie ID
     * @param mixed $mollieId
     * @return mixed|null
     */
    public function getOrderIdByMollieId(mixed $mollieId)
    {
        try {
            $stmt = $this->connection->prepare("SELECT order_id FROM orders WHERE mollie_id = :mollie_id");
            $stmt->bindParam(':mollie_id', $mollieId);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            return $stmt->fetch();
        } catch (PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }
}