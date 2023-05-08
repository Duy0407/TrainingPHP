<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImgSliderProduct extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'img_slider_product';
    protected $fillable  = ['id_product','image_slider','created_at','updated_at'];
}
