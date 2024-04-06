<?php
namespace App\Services;

use App\Repositories\EventRepository;
use App\Models\Event;

class EventService
{
    private EventRepository $eventRepository;

    public function __construct()
    {
        $this->eventRepository = new EventRepository();
    }

    public function getEvent(): Event|null
    {
        if (isset($_GET['id'])) {
            // Get event
            return $this->eventRepository->getEvent($_GET['id']);
        } else {
            return null;
        }
    }

    public function getAllDanceEvents()
    {
        return $this->eventRepository->getAllDanceEvents();
    }

    public function getAllJazzEvents()
    {
        return $this->eventRepository->getAllJazzEvents();
    }

    public function getEventBanner(int $getEventId)
    {
        // Get event
        return $this->eventRepository->getEventBanner($getEventId);
    }
    public function getAllEvents()
    {
        return $this->eventRepository->getAllEvents();
    }
    public function updateEvent($event)
    {
         $this->eventRepository->updateEvent($event);
    }
    public function getAllEventTypes()
    {
        return $this->eventRepository->getAllEventTypes();
    }
    public function updateEventImage($imageId,$image)
    {
          $this->eventRepository->updateEventImage($imageId,$image);
    }
    public function deleteEvent()
    {
        if (isset($_GET['id'])) {
            $this->eventRepository->deleteEvent($_GET['id']);
        } else {
            return null;
        }
    }
    public function createEvent($data)
    {
        return $this->eventRepository->createEvent($data);
    }
    public function insertEventImage($event_id, $imageId)
    {
        $this->eventRepository->insertEventImage($event_id, $imageId);
    }
    public function updateEventLocation($location_id)
    {
        if (isset($_GET['id'])) {
            $this->eventRepository->updateEventLocation($_GET['id'], $location_id);
        } else {
            return null;
        }
    }
    public function getEventImage(){
        if (isset($_GET['id'])) {
            return $this->eventRepository->getEventImage($_GET['id']);
        } else {
            return null;
        }
    }

}