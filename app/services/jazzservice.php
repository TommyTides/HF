<?php
namespace App\Services;

class JazzService {
    public function getAllArtists() {
        $repository = new \App\Repositories\JazzRepository();
        return $repository->getAllArtists();
    }
}