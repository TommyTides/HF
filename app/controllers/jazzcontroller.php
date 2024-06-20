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

    public function index()
    {
        // if "event" is set in the URL, show the event page
        if (isset($_GET['event'])) {
            $this->event();
            return;
        }
        // $festivalDays = $this->eventService->getFestivalDays(null);
        $artists = $this->artistService->getAll();
        // $venues = $this->eventService->getAllJazzVenues();
        $events = $this->eventService->getAllJazzEvents();

        $jazz_events = $this->eventService->getAllJazzEvents();
        // Check if a specific day is set
        if (isset($_GET['day'])) {
            // Get the day from the URL parameter
            $day = $_GET['day'];

            // Filter events that start on the specified day
            $jazz_events = array_filter($jazz_events, function ($event) use ($day) {
                return substr($event['start_time'], 8, 2) == $day; // Assuming the date format is Y-m-d H:i:s
            });
        }
        require __DIR__ . '/../views/jazz/index.php';
    }

    // show individual jazz event
    public function event(): void
    {
        if(!isset($_GET['event'])) {
            header("Location: /jazz");
            return;
        }
        // Get event
        $event = $this->eventService->getEventById($_GET['event']);

        if ($event != null) {
            // // Get artist
            $artists = $this->artistService->getArtistsByEvent($event->getEventId());

            // // Get location
            $location = $this->locationService->getLocationByEvent($event->getEventId());

            // // Get event product
            $product = $this->productService->getSingleJazzProduct($event->getEventId());

            // // Get artist products
            $artistProducts = $this->productService->getAllArtistProducts($artists[0]->getArtistId());

            // // Get images
            // $banner = $this->eventService->getEventBanner($event->getEventId());

            // $artistImages = [];
            // for ($i = 0; $i < count($artists); $i++) {
            //     $artistImages[$i] = $this->artistService->getArtistImage($artists[$i]->getArtistId(), "primary");
            // }

            $locationImage = $this->locationService->getLocationImage($location->getLocationId(), "primary");
        }

        // Display view
        require_once(__DIR__ . '/../views/jazz/event.php');
    }
}
