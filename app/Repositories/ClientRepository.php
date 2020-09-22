<?php

namespace App\Repositories;

use App\Client;

class ClientRepository implements ClientRepositoryInterface
{

    public function all(){
        return Client::orderBy('nome')
        ->with('images')
        ->paginate(1);
    }

    public function findById($id){
        return Client::findorFail($id)
        ->load('images');
    }

    public function allWithImages(){
        return Client::all()->load('images');
    }

    public function delete($id){
        return Client::destroy($id);
    }
}