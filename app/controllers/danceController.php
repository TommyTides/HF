<?php

namespace App\Controllers;

use App\Services\ProductService;
use App\Services\LocationService;
use App\Services\EventService;
use App\Services\ArtistService;
use App\Services\PageEditorService;
use App\Services\DanceService;
use App\Models\JazzProduct;
use App\Models\Location;
use App\Models\Event;
use App\Models\Artist;
use App\Models\User;

class DanceController extends Controller
{
    private ArtistService $artistService;
    private DanceService $danceService;
    private ProductService $productService;
    private EventService $eventService;
    private LocationService $locationService;
    private PageEditorService $pageEditorService;


    public function __construct()
    {
        $this->artistService = new ArtistService();
        $this->danceService = new DanceService();
        $this->locationService = new LocationService();
        $this->productService = new ProductService();
        $this->eventService = new EventService();
        $this->pageEditorService = new PageEditorService();
    }
    public function index()
    {
        $path = '/dance/index';
        $landingcontainer = "#landing-container";
        if ($path !== null) {
            $html = $this->pageEditorService->retrievePage($path, $landingcontainer);
        } else {
            $html = "This page does not exist.";
        }

        $ticketcontainer = "#ticket-container";
        if ($path !== null) {
            $html2 = $this->pageEditorService->retrievePage($path, $ticketcontainer);
        } else {
            $html2 = "This page does not exist.";
        }

        $festivalDays = $this->danceService->getFestivalDays(null);
        $artists = $this->artistService->getAll();
        $venues = $this->danceService->getAllVenues();
        $events = $this->eventService->getAllDanceEvents();

        require_once(__DIR__ . '/../views/dance/index.php');
    }

    public function artistPage()
    {
        $artist = $this->artistService->getById($_GET['id']);
        $appearances = $this->artistService->getAllAppearances($artist->getArtistName());
        $artist_name = $artist->getArtistName();

        require_once(__DIR__ . '/../views/dance/artistPage.php');
    }

    public function getProducts()
    {
        //if the url contains an artistId, get all the products associated with that artist
        if (str_contains($_SERVER['REQUEST_URI'], "artistId")) {
            $artist = $this->artistService->getById($_GET['artistId']);
            $date = $this->productService->getEarliestDanceDate();
            $festivalDays = $this->danceService->getFestivalDays($artist->getArtistName());
            $products = $this->productService->getDanceProductsWithFilters($date, $artist->getArtistName(), null);
        }
        //if the url doesnt contain an artistId, get all the products
        if (!str_contains($_SERVER['REQUEST_URI'], "artistId")) {
            $date = $this->productService->getEarliestDanceDate();
            $festivalDays = $this->danceService->getFestivalDays(null);
            $products = $this->productService->getDanceProductsWithFilters($date, null, null);
        }
        //if the url contains a type, get all the products of that type
        if (str_contains($_SERVER['REQUEST_URI'], "type")) {
            $date = $this->productService->getEarliestDanceDate();
            $festivalDays = $this->danceService->getFestivalDaysByTicketType($_GET['type']);
            $products = $this->productService->getDanceProductsWithFilters($date, null, $_GET['type']);
        }

        require_once(__DIR__ . '/../views/dance/getProducts.php');
    }

    public function location(): void
    {
        $location = $this->locationService->getLocationById();
        $images = $this->locationService->getLocationImages();

        require(__DIR__ . '/../views/location/location.php');
    }

    public function event(): void
    {
        // Get the event of specified id from the database
        $event = $this->eventService->getEvent();
        $id = $_GET['id'];

        if ($event != null) {
            // Get artist
            $artists = $this->artistService->getArtistsByEvent($id);

            // Get location
            $location = $this->locationService->getLocationByEvent($id);

            // Get event product
            $product = $this->productService->getSingleDanceProduct($id);

            // Get artist products
            $artistProducts = $this->productService->getAllArtistProducts($artists[0]->getArtistId());

            // Get all event images
            $artistImages = [];
            for ($i = 0; $i < count($artists); $i++) {
                $artistImages[$i] = $this->artistService->getArtistImage($artists[$i]->getArtistId(), "primary");
            }
            $locationImage = $this->locationService->getLocationImage($location->getLocationId(), "primary");
        }

        require_once(__DIR__ . '/../views/dance/event.php');
    }
}