<?php
namespace App\Controllers;

use App\Services\FestivalService;
use App\Models\Event;
use App\Models\User;
use DateTime;

class FestivalController
{
    private FestivalService $festivalService;
    public function __construct()
    {
        $this->festivalService= new FestivalService();
    }

    public function index() : void
    {
        $mainEvents = $this->festivalService->getAllMainEvents();
        require_once(__DIR__ . '/../views/festival/index.php');
    }
    public function convertDateTime($date)
    {
        $dateString = $date;
        $newDate = new DateTime($dateString);
        $formattedDate = $newDate->format("D, jS F");
       return $formattedDate;
    }
}