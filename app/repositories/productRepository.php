<?php
namespace App\Repositories;

use App\Models\Product;
use PDO;
use PDOException;
use Exception;

class ProductRepository extends Repository
{
    /**
     * Get events based on string
     */
    function getEvents(string $query, $startDate, $endDate, $offset, $limit): Product|array|null
    {
        try {
            $stmt = $this->connection->prepare($query);
            $stmt->bindParam(':startDate', $startDate);
            $stmt->bindParam(':endDate', $endDate);
            $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
            $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'JazzProduct');
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }

    /**
     * Retrieves products within a limit and offset
     */
    public function getJazzProductsByOffsetLimit(string $query, array $keywords, $startDate, $endDate, $offset, $limit, $minPrice, $maxPrice): bool|array|null
    {
        try {
            $stmt = $this->connection->prepare($query);
            $i = 0;
            foreach ($keywords as $keyword) {
                $stmt->bindValue(":keyword$i", "%$keyword%");
                $i++;
            }
            $stmt->bindParam(':startDate', $startDate);
            $stmt->bindParam(':endDate', $endDate);
            $stmt->bindParam(':minPrice', $minPrice);
            $stmt->bindParam(':maxPrice', $maxPrice);
            $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
            $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'JazzProduct');
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo $e->getMessage();
            return null;
        }
    }

    public function getEarliestEventDate(int $event_number): string
    {
        $query = "SELECT MIN(start_time) FROM `events` WHERE event_type = :event_number AND start_time > NOW()";
        try {
            $stmt = $this->connection->prepare($query);
            $stmt->bindParam(':event_number', $event_number);
            $stmt->execute();
            return $stmt->fetchColumn();
        } catch (PDOException $e) {
            return "";
        }
    }

    function getRestaurantEvents($query): Product|array|null
    {
        try {
            $stmt = $this->connection->prepare($query);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'RestaurantProduct');
            $products = $stmt->fetchAll();
            return $products;

        } catch (PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }

    public function getSingleJazzProduct($id)
    {
        try {
            $stmt = $this->connection->prepare("SELECT product_id, product_type, e.event_id, e.name, e.description, 
                    price_exc_vat, vat, start_time, end_time, sub_description, l.location_id, l.name as location, l.sublocation
                    FROM products AS p 
                    INNER JOIN events AS e
                    ON p.event_id = e.event_id 
                    INNER JOIN event_location AS el 
                    ON e.event_id = el.event_id
                    INNER JOIN locations AS l
                    ON el.location_id = l.location_id
                    WHERE e.event_id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'JazzProduct');
            return $stmt->fetch();

        } catch (PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }

    public function getSingleDanceProduct($id)
    {
        try {
            $stmt = $this->connection->prepare("SELECT product_id, product_type, e.event_id, e.name, e.description, 
            price_exc_vat, vat, start_time, end_time, sub_description, l.location_id, l.name as location, l.sublocation
            FROM products AS p 
            INNER JOIN events AS e
            ON p.event_id = e.event_id 
            INNER JOIN event_location AS el 
            ON e.event_id = el.event_id
            INNER JOIN locations AS l
            ON el.location_id = l.location_id
            WHERE e.event_id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'DanceProduct');
            return $stmt->fetch();

        } catch (PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }

    public function getAllArtistProducts(int $artistId): bool|array|null
    {
        try {
            $stmt = $this->connection->prepare("SELECT DISTINCT product_id, product_type, e.event_id, e.name, e.description, 
                    price_exc_vat, vat, start_time, end_time, sub_description, l.location_id, l.name as location, l.sublocation
                    FROM products AS p 
                    INNER JOIN events AS e
                    ON p.event_id = e.event_id
                    INNER JOIN event_location AS el 
                    ON e.event_id = el.event_id
                    INNER JOIN locations AS l
                    ON el.location_id = l.location_id
                    INNER JOIN event_artist as ea 
                    ON e.event_id = ea.event_id
                    INNER JOIN artists as a
                    ON ea.artist_id = a.artist_id
                    WHERE a.artist_id = :id
                    ORDER BY e.start_time
                    ");
            $stmt->bindParam(':id', $artistId);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'JazzProduct');
            return $stmt->fetchAll();

        } catch (PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }

    public function getProductById(int $id)
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM products WHERE product_id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Product');
            return $stmt->fetch();
        } catch (PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }

    function getDanceProducts(string $query, $searchTerm): Product|array|null
    {
        try {
            $stmt = $this->connection->prepare($query);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'DanceProduct');
            $products = $stmt->fetchAll();
            return $products;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }

    function getDanceProductsByArtistName(string $query, $searchTerm): Product|array|null
    {
        try {
            $stmt = $this->connection->prepare($query);
            $stmt->bindParam(':searchTerm', $searchTerm);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'DanceProduct');
            $products = $stmt->fetchAll();
            return $products;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }

    public function getProductImageById(int $id)
    {
        try {
            $stmt = $this->connection->prepare("SELECT image
                                                        FROM images as i
                                                        INNER JOIN event_image as ei
                                                        ON i.image_id = ei.image_id
                                                        INNER JOIN events as e
                                                        ON ei.event_id = e.event_id
                                                        WHERE e.event_id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetchColumn();
        } catch (PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }

    public function getProductEventType(int $id)
    {
        try {
            $stmt = $this->connection->prepare("SELECT et.event_type
                                                        FROM events as e
                                                        INNER JOIN event_type as et
                                                        ON e.event_type = et.event_type_id
                                                        WHERE e.event_id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetchColumn();
        } catch (PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }

    public function getMaxProductPrice($event_type)
    {
        try {
            $stmt = $this->connection->prepare("SELECT MAX(p.price_exc_vat) FROM `products` as p
                                                        INNER JOIN events as e
                                                        ON e.event_id = p.event_id
                                                        WHERE e.event_type = :event_type");
            $stmt->bindParam(':event_type', $event_type);
            $stmt->execute();
            return $stmt->fetchColumn();
        } catch (PDOException $e) {
            echo $e->getMessage();
            return 0;
        }
    }

    public function getProductIdFromInputs($data)
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM products WHERE product_type = :ticketType AND date = :date AND time = :time And language = :language");
            $stmt->bindParam(':ticketType', $data['ticketType']);
            $stmt->bindParam(':date', $data['date']);
            $stmt->bindParam(':time', $data['time']);
            $stmt->bindParam(':language', $data['language']);

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Product');
            $stmt->execute();
            return $stmt->fetch();
        } catch (PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }

    public function getCartProductsFromUser($userId): bool|array|null
    {
        try {
            $stmt = $this->connection->prepare("SELECT p.*, sp.amount FROM shoppingcarts as s
                                                        INNER JOIN shoppingcart_product as sp
                                                        ON s.shoppingcart_id = sp.shoppingcart_id
                                                        INNER JOIN products as p    
                                                        ON sp.product_id = p.product_id         
                                                        WHERE s.user_id = :userId");
            $stmt->bindParam(':userId', $userId);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Product');
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }

    public function getCartProductsByCartId($cartId): bool|array|null
    {
        try {
            $stmt = $this->connection->prepare("SELECT p.*, sp.amount FROM shoppingcarts as s
                                                        INNER JOIN shoppingcart_product as sp
                                                        ON s.shoppingcart_id = sp.shoppingcart_id
                                                        INNER JOIN products as p    
                                                        ON sp.product_id = p.product_id
                                                        WHERE s.shoppingcart_id = :cartId");
            $stmt->bindParam(':cartId', $cartId);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Product');
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }
    public function getProductImage($product_id)
    {
        try {
            $stmt = $this->connection->prepare("SELECT image FROM images AS i
                                                        INNER JOIN event_image AS ei
                                                        ON ei.image_id = i.image_id
                                                        INNER JOIN events AS e
                                                        ON ei.event_id = e.event_id
                                                        INNER JOIN products AS p
                                                        ON p.event_id = e.event_id
                                                        WHERE p.product_id = :product_id");
            $stmt->bindParam(':product_id', $product_id);
            $stmt->execute();
            return $stmt->fetchColumn();
        } catch (PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }

    public function getCartProductsByShareLink(mixed $sharelink)
    {
    try {
            $stmt = $this->connection->prepare("SELECT p.*, sp.amount FROM shoppingcarts as s
                                                        INNER JOIN shoppingcart_product as sp
                                                        ON s.shoppingcart_id = sp.shoppingcart_id
                                                        INNER JOIN products as p    
                                                        ON sp.product_id = p.product_id
                                                        WHERE s.sharelink = :sharelink");
            $stmt->bindParam(':sharelink', $sharelink);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Product');
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }

    public function getAmountSeats($eventId)
    {
        try {
            $stmt = $this->connection->prepare("SELECT no_of_seats FROM events WHERE event_id = :eventId");
            $stmt->bindParam(':eventId', $eventId);
            $stmt->execute();
            return $stmt->fetchColumn();
        } catch (PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }

}