<?php
use App\Repositories\HistoryRepository;
use App\Models\Location;
class HistoryService
{
    private HistoryRepository $repository;

    function __construct()
    {
        $this->repository = new HistoryRepository();
    }
    function getAllLocations()
    {
        return $this->repository->getAllLocations();
    }
    function getEvent()
    {
        return $this->repository->getEvent();
    }

    function getGeneralInformation()
    {
        return $this->repository->getGeneralInformation();
    }
}