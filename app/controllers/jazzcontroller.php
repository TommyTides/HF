<?php

namespace App\Controllers;

use App\Services\ProductService;
use App\Services\LocationService;
use App\Services\EventService;
use App\Services\ArtistService;
use App\Services\PageEditorService;
use App\Models\JazzProduct;
use App\Models\Location;
use App\Models\Event;
use App\Models\Artist;
use App\Models\User;

class JazzController extends Controller
{
    private ProductService $productService;
    private LocationService $locationService;
    private EventService $eventService;
    private ArtistService $artistService;
    private PageEditorService $pageEditorService;

    function __construct()
    {
        $this->productService = new ProductService();
        $this->locationService = new LocationService();
        $this->eventService = new EventService();
        $this->artistService = new ArtistService();
        $this->pageEditorService = new PageEditorService();
    }

    public function index(): void
    {
        $path = '/jazz/index';
        $landingcontainer = "#introduction";
        if ($path !== null) {
            $html = $this->pageEditorService->retrievePage($path, $landingcontainer);
        } else {
            $html = "This page does not exist.";
        }
        // Get date
        $date = $this->productService->getEarliestJazzDate();

        $products = null;

        // Get introduction html
        $introduction = $this->pageEditorService->retrievePage('/jazz/index', '#introduction');

        // Display view
        require_once(__DIR__ . '/../views/jazz/index.php');
    }

    public function getproducts(): void
    {
        // Get date
        $date = $this->productService->getSelectedJazzDate();

        // Get filtered jazz products
        $products = $this->productService->getFilteredJazzProducts($date);

        // Get product images (In case of null)
        $products = $this->productService->getProductImages($products);

        // Display view
        require_once(__DIR__ . '/../views/jazz/getproducts.php');
    }

    public function event(): void
    {
        // Get event
        $event = $this->eventService->getEvent();

        if ($event != null) {
            // Get artist
            $artists = $this->artistService->getArtistsByEvent($event->getEventId());

            // Get location
            $location = $this->locationService->getLocationByEvent($event->getEventId());

            // Get event product
            $product = $this->productService->getSingleJazzProduct($event->getEventId());

            // Get artist products
            $artistProducts = $this->productService->getAllArtistProducts($artists[0]->getArtistId());

            // Get images
            $banner = $this->eventService->getEventBanner($event->getEventId());

            $artistImages = [];
            for ($i = 0; $i < count($artists); $i++) {
                $artistImages[$i] = $this->artistService->getArtistImage($artists[$i]->getArtistId(), "primary");
            }

            $locationImage = $this->locationService->getLocationImage($location->getLocationId(), "primary");
        }

        // Display view
        require_once(__DIR__ . '/../views/jazz/event.php');
    }

    public function artist(): void
    {
        // Get artist
        $artist = $this->artistService->getArtist();

        if ($artist != null) {
            // Get images
            $banner = $this->artistService->getArtistImage($artist->getArtistId(), "banner");
            $primary = $this->artistService->getArtistImage($artist->getArtistId(), "primary");

            // Get artist products
            $artistProducts = $this->productService->getAllArtistProducts($artist->getArtistId());
        }

        // Display view
        require_once(__DIR__ . '/../views/jazz/artist.php');
    }

    public function location(): void
    {
        // Get location by id
        $location = $this->locationService->getLocationById();
        $images = $this->locationService->getLocationImages();

        // Display view
        require(__DIR__ . '/../views/location/location.php');
    }

    public function getMaxPrice(): void
    {
        $maxPrice = $this->productService->getMaxProductPrice(3);
        echo $maxPrice;
    }
}
