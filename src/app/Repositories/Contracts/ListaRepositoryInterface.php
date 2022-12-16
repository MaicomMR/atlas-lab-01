<?php 

namespace App\Repositories\Contracts;

interface ListaRepositoryInterface {
    
    public function all();
    
    public function findById($id);

    public function showAllLists();
}