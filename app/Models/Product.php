<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'product';
    protected $fillable  = ['name','id_category','id_manufacturer','price','description','images','created_at','updated_at'];
    
    public function category(){
        return $this->belongsTo(Category::class, 'id_category');
    }

    public function hangsx(){
        return $this->belongsTo(Facturer::class, 'id_manufacturer');
    }
}
