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
        $artists = $this->artistService->getAll();
        // convert to JSON
        $artists_json = json_encode($artists);
        require __DIR__ . '/../views/jazz/index.php';
    }
}
