<?php
namespace App\Controllers;

use App\Services\ProductService;
use App\Services\LocationService;
use App\Services\EventService;
use App\Services\ArtistService;
use App\Services\PageEditorService;
use App\Models\Location;
use App\Models\Event;
use App\Models\User;
use App\Services\HistoryService;
use DateTime;
class historyController extends Controller
{
    private ProductService $productService;
    private LocationService $locationService;
    private EventService $eventService;
    private HistoryService $historyService;
    function __construct()
    {
        $this->historyService = new HistoryService();
        $this->locationService = new LocationService();
        $this->productService = new ProductService();
    }  
 
    public function index()
    {
            $event = $this->historyService->getEvent();
        if ($event) {
            $startDate = $this->convertDateTime($event['start_time']);
            $endDate = $this->convertDateTime($event['end_time']);
        } else {
            // Handle the case where $event is false
            $startDate = $endDate = null; // or some other default value
        }

        $generalInfo = $this->historyService->getGeneralInformation();
        $locations = $this->historyService->getAllLocations();
        $schedule = $this->scheduleToArray();
        $output = $this->locationService->getSchedule();
        //require(__DIR__ . '/../views/historyevent/index.php');

        require __DIR__ . '/../views/history/index.php';
    }
    public function location()
    {
        $location = $this->locationService->getLocationById();
        $images = $this->locationService->getLocationImages();

        require(__DIR__ . '/../views/location/location.php');
    }

    public function scheduleToArray()
    {
        $output = $this->locationService->getSchedule();
        $dates = [];
        $times = [];

        // Extract the unique dates and times from the $output array
        foreach ($output as $entry) {
            if (!in_array($entry['date'], $dates)) {
                $dates[] = $entry['date'];
            }
            if (!in_array($entry['time'], $times)) {
                $times[] = $entry['time'];
            }
        }

        sort($dates); // Sort the dates in ascending order
        sort($times); // Sort the times in ascending order

        $scheduleData = [];
        foreach ($times as $time) {
            $scheduleData[$time] = []; // Initialize the sub-array for this time
            foreach ($dates as $date) {
                $scheduleData[$time][$date] = []; // Initialize the sub-sub-array for this date and time
            }
        }

        // Populate the language information in the $scheduleData array
        foreach ($output as $entry) {
            $date = $entry['date'];
            $time = $entry['time'];
            $languages = $entry['languages'];
            $scheduleData[$time][$date] = $languages;
        }

        return $scheduleData;
    }
    // public function convertDateTime($date)
    // {
    //     $dateString = $date;
    //     $newDate = new DateTime($dateString);
    //     $formattedDate = $newDate->format("D, jS F");
    //     return $formattedDate;
    // }
    public function convertDateTime($date)
{
    if ($date) {
        $newDate = new DateTime($date);
        return $newDate->format("D, jS F");
    } else {
        // Handle the case where $date is null
        return null; // or some other default value
    }
}


    public function getTicketIdFromDB()
    {
        try {
            $productObject = new stdClass();

            $data = [
                'ticketType' => $_POST['ticketTypeSelectors'],
                'date' => $_POST['dateSelectors'],
                'time' => $_POST['timeSelectors'],
                'language' => $_POST['languageSelectors'],
            ];
            $product = $this->productService->getProductIdFromInputs($data);
            $productObject->price_exc_vat = number_format($product->getPriceExcVat(), 2);
            $productObject->product_id = number_format($product->getProductId(), 0);

            //returns product_id and price_exc_vat   
            echo json_encode($productObject);

        } catch (Exception $e) {
            echo "error getting id from db" . $e->getMessage();
        }

    }

}