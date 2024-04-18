<?php
namespace App\Services;
use App\Repositories\LocationRepository;
use App\Models\Location;

class LocationService
{
    private LocationRepository $locationRepository;

    public function getAll()
    {
        return $this->locationRepository->getAll();
    }
    public function __construct()
    {
        $this->locationRepository = new LocationRepository();
    }

    public function getLocationById(): Location|null
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            return $this->locationRepository->getLocationById($id);
        } else {
            return null;
        }
    }

    public function getLocationByEvent($id): Location|null
    {
        // Get location
        return $this->locationRepository->getLocationByEvent($id);
    }

    public function getLocationImages()
    {
        if (isset($_GET['id'])) {
            return $this->locationRepository->getLocationImages($_GET['id']);
        } else {
            return null;
        }
    }
    public function getSchedule()
    {
        return $this->locationRepository->getSchedule();
    }


    public function getLocationImage(int $getLocationId, $imageType)
    {
        $imageType = "%" . $imageType . ".%";
        // Build query
        $query = "SELECT image FROM `location_image` as li
                    INNER JOIN locations as l 
                    ON li.location_id = l.location_id
                    INNER JOIN images as i
                    ON li.image_id = i.image_id
                    WHERE i.image LIKE :imageType
                    AND l.location_id = :id";

        // Get event
        return $this->locationRepository->getLocationImage($query, $getLocationId, $imageType);
    }
    public function createNewLocation(Location $newLocation)
    {
      return  $this->locationRepository->createNewLocation($newLocation);
    }
    public function insertImage($image)
    {
return $this->locationRepository->insertImage($image);
    }

    public function insertLocationImage($imageId, $location_id)
    {
        $this->locationRepository->insertLocationImage($imageId, $location_id);
    }
    public function InsertEventLocation($eventId, $location_id)
    {
        $this->locationRepository->InsertEventLocation($eventId, $location_id);
    }
    public function updateLocation(Location $location)
    {

        $this->locationRepository->updateLocation($location );
    }
    public function getLocationPrimaryImage($id)
    {
        return $this->locationRepository->getLocationPrimaryImage($id);
    }
    public function deleteLocation()
    {
        if (isset($_GET['id'])) {
            $this->locationRepository->deleteLocation($_GET['id']);
        }
    }
    public function updateLocationImage($imageId)
    {
        if (isset($_GET['id'])) {
            $this->locationRepository->updateLocationImage($_GET['id'], $imageId);
        }
        else{
            return null;
        }
       

    }
}