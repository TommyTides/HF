<?php
namespace App\Services;

class JazzService {
    public function getAll() {
        $repository = new \App\Repositories\JazzRepository();
        return $repository->getAll();
    }

    public function insert($article) {
        $repository = new \App\Repositories\JazzRepository();
        return $repository->insert($article);
    }
}