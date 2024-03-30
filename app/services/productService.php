<?php
namespace App\Services;

use App\Repositories\ProductRepository;
use App\Models\Product;
use App\Models\JazzProduct;
use DateTime;   

class ProductService
{
    private ProductRepository $productRepository;

    private const DANCE_EVENT_NUMBER = 1;
    private const JAZZ_EVENT_NUMBER = 3;

    public function __construct()
    {
        $this->productRepository = new ProductRepository();
    }

    /**
     * Retrieves a product by ID.
     */
    public function getProductById(int $id): ?Product
    {
        // Return product by ID
        $product = $this->productRepository->getProductById($id);

        if ($product != null) {
            // Get event values for product
            $product->setEventType($this->productRepository->getProductEventType($product->getEventId()));
            $product->setImage($this->productRepository->getProductImageById($product->getEventId()));
            $product->setNoOfSeats($this->productRepository->getAmountSeats($product->getEventId()));
            return $product;
        }

        return null;
    }

    /**
     * Gets cart products to display
     */
    public function getCartProducts(): ?array
    {
        if (isset($_SESSION['cart']) || isset($_SESSION['user'])) {
            if (isset($_SESSION['cart'])) {
                $tempCartProducts = $_SESSION['cart'];

                // Get detailed product information for each cart product from database
                $cartProducts = array();
                foreach ($tempCartProducts as $tempCartProduct)
                {
                    $product = $this->getProductById($tempCartProduct['product_id']);

                    $product->setAmount($tempCartProduct['product_quantity']);
                    $cartProducts[] = $product;
                }
            } else if (isset($_SESSION['user'])) {
                $user = unserialize($_SESSION['user']);
                // Get cart data from database
                $cartProducts = $this->productRepository->getCartProductsFromUser($user->getUserId());
            }

            // Get event type and image for each product
            foreach($cartProducts as $cartProduct) {
                $cartProduct->setEventType($this->productRepository->getProductEventType($cartProduct->getEventId()));
                $cartProduct->setImage($this->productRepository->getProductImageById($cartProduct->getEventId()));
                $cartProduct->setNoOfSeats($this->productRepository->getAmountSeats($cartProduct->getEventId()));
            }

            return $cartProducts;
        }
        return null;
    }

    /**
     * Gets the subtotal price of all items
     */
    public function getSubtotalPrice($cartProducts): float
    {
        $subtotal = 0.00;

        if ($cartProducts == null) {
            return $subtotal;
        }

        foreach($cartProducts as $cartProduct) {
            $subtotal += $cartProduct->getPriceExcVat() * $cartProduct->getAmount();
        }

        return round($subtotal, 2);
    }

    /**
     * Gets the total price of all items
     */
    public function getTotalPrice($cartProducts): float
    {
        $total = 0.00;

        if ($cartProducts == null) {
            return $total;
        }

        foreach($cartProducts as $cartProduct) {
            $total += $cartProduct->getPrice() * $cartProduct->getAmount();
        }

        return round($total, 2);
    }

    /**
     * Returns a single jazz product
     */
    public function getSingleJazzProduct($id): Product|null
    {
        // Get product
        return $this->productRepository->getSingleJazzProduct($id);
    }

    /**
     * Returns the standard jazz products without filters
     * @throws Exception
     */
    public function getJazzProducts($date): Product|array|null
    {
        // Configuration
        $offset = !empty($_POST['page']) ? $_POST['page'] : 0;
        $limit = 10;

        // Create query
        $query = $this->buildJazzQuery(null, null, null);

        $reqDate = new DateTime($date);
        $reqDate = $reqDate->format('Y-m-d');
        $startDate = $reqDate . ' 00:00:00';
        $endDate = $reqDate . ' 23:59:59';

        // Get event products
        return $this->productRepository->getEvents($query, $startDate, $endDate, $offset, $limit);
    }

    /**
     * Returns jazz products by filters
     * @throws Exception
     */
    public function getFilteredJazzProducts($date): Product|array|null
    {
        if (isset($_POST['page'])) {
            // Configuration
            $offset = !empty($_POST['page']) ? $_POST['page'] : 0;
            $limit = 10;
            $filteredValues = $this->setupKeywordsAndFilters();
            $keywords = $filteredValues[0];
            $minPrice = $_POST['minPrice'];
            $maxPrice = $_POST['maxPrice'];

            // Fetch records based on the keywords
            return $this->getProductsByOffsetLimit($keywords, $date, $offset, $limit, $minPrice, $maxPrice);
        }
        return null;
    }

    /**
     * Splits strings into arrays
     */
    private function setupKeywordsAndFilters(): array
    {
        // Configuration
        $keywords = array();

        // Search conditions
        if (!empty($_POST['keywords'])) {
            // Filter and explode sentence
            $keywordsList = htmlspecialchars($_POST['keywords']);
            $keywordsList = trim($keywordsList);
            $keywords = preg_split('/\s+/', $keywordsList);
        }

        return array($keywords);
    }

    /**
     * Retrieves all products within offset, limit and by where clause.
     * @throws Exception
     */
    public function getProductsByOffsetLimit($keywords, $date, int $offset, int $limit, $minPrice, $maxPrice): ?array
    {
        $query = $this->buildJazzQuery($keywords, $minPrice, $maxPrice);

        $reqDate = new DateTime($date);
        $reqDate = $reqDate->format('Y-m-d');
        $startDate = $reqDate . ' 00:00:00';
        $endDate = $reqDate . ' 23:59:59';

        // Get products
        $products = $this->productRepository->getJazzProductsByOffsetLimit($query, $keywords, $startDate, $endDate, $offset, $limit, $minPrice, $maxPrice);

        if ($products != null) {
            return $products;
        }
        return null;
    }

    /**
     * Builds a where query for jazz products
     */
    private function buildJazzQuery($keywords, $minPrice, $maxPrice): ?string
    {
        $query = "SELECT product_id, product_type, e.event_id, e.name, e.description, 
                    price_exc_vat, vat, start_time, end_time, sub_description, l.location_id, l.name as location, l.sublocation, e.no_of_seats
                    FROM products AS p 
                    INNER JOIN events AS e
                    ON p.event_id = e.event_id 
                    INNER JOIN event_location AS el 
                    ON e.event_id = el.event_id
                    INNER JOIN locations AS l
                    ON el.location_id = l.location_id
                    WHERE e.event_type = 3 AND (start_time BETWEEN :startDate AND :endDate)
                    ";
        $whereQuery = "";
        $endQuery = " ORDER BY start_time ASC LIMIT " . ':offset' . " , " . ':limit';

        if (!empty($keywords) || !empty($filters)) {
            if (!empty($keywords)) {
                $i = 0;
                $whereQuery .= " AND (";
                foreach ($keywords as $keyword) {
                    $whereQuery .= " e.name LIKE :keyword" . $i . " OR ";
                    $i++;
                }
                $whereQuery = substr($whereQuery, 0, -4); // Remove final OR
                $whereQuery .= " )"; // Close statement
            }
        }

        if ($minPrice !== null && $maxPrice !== null) {
            $whereQuery .= " AND (price_exc_vat BETWEEN :minPrice AND :maxPrice) ";
        }

        return $query . $whereQuery . $endQuery;
    }

    /**
     * Returns the earliest date of events taking place
     */
    public function getEarliestJazzDate(): string
    {
        $date = $this->productRepository->getEarliestEventDate(self::JAZZ_EVENT_NUMBER);

        if ($date != "") {
            return date('d-m-Y h:i:s', strtotime($date));
        } else {
            return date('d-m-Y h:i:s');
        }
    }

    /**
     * Returns selected date
     */
    public function getSelectedJazzDate(): string
    {
        if (isset($_POST['date'])) {
            return date('d-m-Y', strtotime($_POST['date']));
        }
        return date('d-m-Y');
    }

    public function getRestaurantProducts(): Product|array|null
    {
        $query = "SELECT product_id, product_type, e.event_id, e.name, e.description, 
                    price_exc_vat, vat, start_time, end_time, sub_description
                    FROM products AS p 
                    INNER JOIN events AS e
                    ON p.event_id = e.event_id 
                    WHERE e.event_type = 4
                    ORDER BY e.name;
                    ";

        return $this->productRepository->getRestaurantEvents($query);
    }

    public function getAllArtistProducts(int $artistId): bool|array|null
    {
        return $this->productRepository->getAllArtistProducts($artistId);
    }

    //DANCE//

    /**
     * Returns the earliest date of DANCE! events
     */
    public function getEarliestDanceDate(): string
    {
        $date = $this->productRepository->getEarliestEventDate(1);

        if ($date != "") {
            return date('d-m-Y h:i:s', strtotime($date));
        } else {
            return date('d-m-Y h:i:s');
        }
    }
    /**
     * Returns DANCE! products with filters
     */
    public function getDanceProductsWithFilters($date, $artistname, $ticketType): Product|array|null
    {
        // Configuration
        $offset = !empty($_POST['page']) ? $_POST['page'] : 0;
        $limit = 10;

        // Create query
        $query = $this->buildDanceWhereArtistQuery($ticketType, $artistname, null, $date, $offset, $limit, null);

        if($artistname != null){
            return $this->productRepository->getDanceProductsByArtistName($query, $artistname);
        }else{
            // Get event products
            return $this->productRepository->getDanceProducts($query, $artistname);
        }
    }

    /**
     * Builds a where query for DANCE! products
     * @throws Exception
     */
    private function buildDanceQuery($keywords, $filters, $reqDate, int $offset, int $limit): ?string
    {
        $date = new DateTime($reqDate);
        $date = $date->format('Y-m-d');

        $query = "SELECT DISTINCT(product_id), product_type, e.event_id, e.name, e.description, 
                    price_exc_vat, vat, start_time, end_time, sub_description, l.location_id, l.name as location, l.sublocation, i.image
                    FROM products AS p 
                    INNER JOIN events AS e
                    ON p.event_id = e.event_id 
                    INNER JOIN event_location AS el 
                    ON e.event_id = el.event_id
                    INNER JOIN locations AS l
                    ON el.location_id = l.location_id
                    INNER JOIN event_image AS ei
                    ON e.event_id = ei.event_id
                    INNER JOIN images AS i
                    ON ei.image_id = i.image_id
                    WHERE e.event_type = 1 AND (start_time BETWEEN '2023-07-27 00:00:00' AND '2023-07-29 23:59:00') ";

        $endQuery = "ORDER BY start_time ASC LIMIT " . $offset . " , " . $limit;

        if (!empty($keywords) || !empty($filters)) {
            // Build query
            $whereQuery = "";

            if (!empty($keywords)) {
                $whereQuery .= " AND (";
                $whereQuery .= str_repeat(" e.name LIKE '%", count($keywords));
                $whereQuery .= "%')";
            }

            return $query . $whereQuery . $endQuery;
        } else {
            return $query . $endQuery;
        }
    }

    /**
     * Returns a single dance product
     */
    public function getSingleDanceProduct($id): Product|null
    {
        return $this->productRepository->getSingleDanceProduct($id);
    }

    private function buildDanceWhereArtistQuery($ticketType, $artistname, $filters, $reqDate, int $offset, int $limit, $product_id): ?string
    {
        $date = new DateTime($reqDate);
        $date = $date->format('Y-m-d');
        
        $query = "SELECT DISTINCT(product_id), product_type, e.event_id, e.name, e.description, 
                    price_exc_vat, vat, start_time, end_time, sub_description, l.location_id, l.name as location, l.sublocation, i.image
                    FROM products AS p 
                    INNER JOIN events AS e
                    ON p.event_id = e.event_id 
                    INNER JOIN event_location AS el 
                    ON e.event_id = el.event_id
                    INNER JOIN locations AS l
                    ON el.location_id = l.location_id
                    INNER JOIN event_image AS ei
                    ON e.event_id = ei.event_id
                    INNER JOIN images AS i
                    ON ei.image_id = i.image_id
                    WHERE e.event_type = 1 AND (start_time BETWEEN '2023-07-27 00:00:00' AND '2023-07-30 23:59:00') AND p.product_type = 2";
        
        $endQuery = " ORDER BY start_time ASC";
        
        if($ticketType == 'all-access'){
            return "SELECT DISTINCT(product_id), product_type, e.event_id, p.name, e.description, price_exc_vat, vat, start_time, end_time, sub_description, l.location_id, l.name as location, l.sublocation, i.image FROM products AS p INNER JOIN events AS e ON p.event_id = e.event_id INNER JOIN event_location AS el ON e.event_id = el.event_id INNER JOIN locations AS l ON el.location_id = l.location_id INNER JOIN event_image AS ei ON e.event_id = ei.event_id INNER JOIN images AS i ON ei.image_id = i.image_id WHERE e.event_type = 1 AND (start_time BETWEEN '2023-07-27 00:00:00' AND '2023-07-30 23:59:00') AND p.product_type = 3;";
        }
        else if($ticketType == '3-day'){
            return "SELECT DISTINCT(product_id), product_type, e.event_id, p.name, e.description, price_exc_vat, vat, start_time, end_time, sub_description, l.location_id, l.name as location, l.sublocation, i.image FROM products AS p INNER JOIN events AS e ON p.event_id = e.event_id INNER JOIN event_location AS el ON e.event_id = el.event_id INNER JOIN locations AS l ON el.location_id = l.location_id INNER JOIN event_image AS ei ON e.event_id = ei.event_id INNER JOIN images AS i ON ei.image_id = i.image_id WHERE e.event_type = 1 AND (start_time BETWEEN '2023-07-27 00:00:00' AND '2023-07-30 23:59:00') AND p.product_type = 4;";
        }

        if($artistname == null && $ticketType == null){
            return $query. $endQuery;
        }
        
        if($artistname != null){
            return $query. " AND e.name LIKE :searchTerm". $endQuery;
        }
        return $query . $endQuery;
    }

    /**
     * Returns the max price in a given event category
     * @return mixed|null
     */
    public function getMaxProductPrice($event_type)
    {
        return $this->productRepository->getMaxProductPrice($event_type);
    }

    public function getProductIdFromInputs($data)
    {
        return $this->productRepository->getProductIdFromInputs($data);
    }

    /**
     * Retrieves an image for a single product
     * @param $product_id
     * @return mixed|null
     */
    public function getProductImage($product_id): mixed
    {

        return $this->productRepository->getProductImage($product_id);
    }

    /**
     * Retrieves images for a group of products
     * @param $products
     * @return mixed
     */
    public function getProductImages($products): mixed
    {
        if (empty($products)) {
            return $products;
        }
        foreach ($products as $product) {
            $product->setImage($this->getProductImage($product->getProductId()));
        }
        return $products;
    }
}