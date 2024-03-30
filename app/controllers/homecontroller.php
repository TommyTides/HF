<?php
namespace App\Controllers;

use App\Services\UserService;   
use App\Services\PageEditorService;
use App\Services\ArtistService;
use App\Models\User;

class HomeController extends Controller
{
    private UserService $userService;
    private ArtistService $artistService;
    private PageEditorService $pageEditorService;

    function __construct()
    {
       $this->userService = new UserService();
       $this->artistService = new ArtistService();
       $this->pageEditorService = new PageEditorService();
    }

    public function index()
    {
        require __DIR__ . '/../views/home/index.php';
    }
}