<?php

namespace App\Repositories;

interface ClientRepositoryInterface
{
    public function all();

    public function allPaginated($int);

    public function findById($id);

    public function allWithImages();

    public function delete($id);

}