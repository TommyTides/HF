<?php
namespace App\Services;
use App\Repositories\FestivalRepository;
use App\Models\Location;

class FestivalService
{
    private FestivalRepository $repository;

    function __construct()
    {
        $this->repository = new FestivalRepository();
    }
    function getAllMainEvents()
    {
        return $this->repository->getAllMainEvents();
    }

   
}