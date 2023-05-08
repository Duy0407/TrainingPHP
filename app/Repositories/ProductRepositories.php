<?php

namespace App\Repositories;
use App\Models\Product;
use App\Interfaces\ProductInterface;
use App\Models\ImgSliderProduct;

class ProductRepositories implements ProductInterface
{
    protected $productModel;

    public function __construct(Product $productModel)
    {
        $this->productModel = $productModel;
    }

    public function getAll($search, $categoryId, $manufacturerId)
    {   

        $product = $this->productModel;
        if ($search) {
            $product = $product->where('name', 'like', '%'.$search.'%');
        }
        if ($categoryId) {
            $product = $product->where('id_category', $categoryId);
        }
        if ($manufacturerId) {
            $product = $product->where('id_manufacturer', $manufacturerId);
        }
        
        return $product->orderByDesc('updated_at')->paginate(12);
    }

    public function find($id)
    {
        return Product::find($id);
    }

    public function create($data)
    {
        return Product::create($data);
    }

}
?>