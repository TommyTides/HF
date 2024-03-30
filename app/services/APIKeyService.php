<?php
namespace App\Services;

use App\Repositories\APIKeyRepository;
use App\Models\APIKey;

class APIKeyService{
    private APIKeyRepository $repository;

    function __construct()
    {
        $this->repository = new APIKeyRepository();
    }
    function getAllKeys(){
        return $this->repository->getAllKeys();
    }
    function getAPIKey(string $query, int $id){
        return $this->repository->getAPIKey($query, $id);
    }
    function insertAPIKey($data){
        return $this->repository->insertAPIKey($data);
    }
    function getAPIKeysByUser(string $query, int $id){
        return $this->repository->getAPIKeysByUser($query, $id);
    }

    public function generateAPIKey(){
        $key= new APIKey();
        //current date and time
        $key->setApi_key(md5(uniqid(rand(), true)));
        $key->setCreated_at(date("Y-m-d H:i:s"));
        $key->setUserId(unserialize($_SESSION['user'])->getUserId());
        return $key;
    }
    public function deleteKey($id){
        return $this->repository->deleteKey($id);
    }
    public function validateAPIKey($key){
        return $this->repository->validateAPIKey($key);
    }

}