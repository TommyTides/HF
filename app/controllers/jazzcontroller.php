<?php
namespace App\Controllers;

class JazzController
{
    private $jazzService;

    function __construct()
    {
        $this->jazzService = new \App\Services\JazzService();
    }

    public function index()
    {
        $artists = $this->jazzService->getAllArtists();
        require __DIR__ . '/../views/jazz/index.php';
    }
}