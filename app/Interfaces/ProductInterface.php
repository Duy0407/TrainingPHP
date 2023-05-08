<?php

namespace App\Interfaces;

interface ProductInterface
{
    public function getAll($search, $categoryId, $manufacturerId);

    public function find($id);

    public function create($data);
}
