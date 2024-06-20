<?php
namespace App\Services;

use App\Repositories\DanceRepository;

class DanceService
{
    private DanceRepository $repository;

    function __construct()
    {
        $this->repository = new DanceRepository();
    }
    /**
     * Returns all of the venues that are part of DANCE!
    */
    function getAllVenues()
    {
        return $this->repository->getAllVenues();
    }
    /**
     * Returns the number of days in the festival if artistname is null or the number of days the artist is performing if not null
     */
    function getFestivalDays($artistname)
    {
        if(!$artistname == null){
            $query = "SELECT DISTINCT DATE(start_time) AS start_date FROM events WHERE event_type = 1 AND name = '$artistname' ORDER BY start_date ASC;";
        }
        else{
            $query = "SELECT DISTINCT DATE(start_time) AS start_date FROM events WHERE event_type = 1 ORDER BY start_date ASC;";
        }
        return $this->repository->getFestivalDays($query);
    }
    /**
     * Returns an array with dates for which all-access DANCE! tickets exist
    */
    function getFestivalDaysByTicketType($ticketType)
    {
        if($ticketType == 'all-access'){
            $query = "SELECT DISTINCT DATE(start_time) AS start_date FROM events AS e INNER JOIN products AS p 
            ON e.event_id = p.event_id WHERE e.event_type = 1 AND p.product_type = 3 ORDER BY start_date ASC ;";
        }
        else if($ticketType == '3-day'){
            $query = "SELECT DISTINCT DATE(start_time) AS start_date FROM events AS e INNER JOIN products AS p 
            ON e.event_id = p.event_id WHERE e.event_type = 1 AND p.product_type = 4 ORDER BY start_date ASC;";
        }
        return $this->repository->getFestivalDays($query);
    }
}