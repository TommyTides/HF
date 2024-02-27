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
        //$model = $this->jazzService->getAll();
        require __DIR__ . '/../views/jazz/index.php';
    }

    public function artist()
    {
        require __DIR__ . '/../views/home/about.php';
    }
}