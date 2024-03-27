<?php

namespace App\Controllers;

class JazzController extends Controller
{
    private $jazzService;

    function __construct()
    {
        $this->jazzService = new \App\Services\JazzService();
    }

    public function index()
    {
        $artists = $this->jazzService->getAllArtists();
        // convert to JSON
        $artists_json = json_encode($artists);
        require __DIR__ . '/../views/jazz/index.php';
    }

    public function image()
    {
        $artist_id = $_GET['artist_id'];
        $artist_image = $this->jazzService->getArtistImage($artist_id);
        return $artist_image;
    }
}
