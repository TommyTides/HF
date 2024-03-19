<?php
namespace App\Services;

class JazzService {
    public function getAllArtists() {
        $repository = new \App\Repositories\JazzRepository();
        return $repository->getAllArtists();
    }

    public function getArtistImage($artist_id) {
        $repository = new \App\Repositories\JazzRepository();
        $artist_image = $repository->getArtistImage($artist_id);
        $image = $repository->getImage($artist_image->image_id);
        
        return $image->image;
    }
}