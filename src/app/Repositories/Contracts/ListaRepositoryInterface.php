<?php 

namespace App\Repositories\Contracts;

interface ListaRepositoryInterface {
    
    public function all();
    
    public function findById(int $id);
}