<?php

namespace App\Repositories;

use PDO;
use PDOException;

class Repository
{
    public $connection;

    function __construct()
    {
        //require __DIR__ . '/../config/dbconfig.php';
        // $type = "mysql";
        // $servername = "srv698.hstgr.io";
        // $username = "u474709953_root";
        // $password = "#Jo0KTixorL";
        // $database = "u474709953_festival";
        $type = "mysql";
        $servername = "mysql";
        $username = "root";
        $password = "secret123";
        $database = "festival";

        try {
            $this->connection = new PDO("$type:host=$servername;dbname=$database", $username, $password);
            // set the PDO error mode to exception
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
}
