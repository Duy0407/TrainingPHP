<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facturer extends Model
{
    use HasFactory;
    protected $table = 'manufacturer';
    protected $filltable = ['manufacturer_name'];

    public function product(){
        return $this->hasMany(Product::class);
    }
}
