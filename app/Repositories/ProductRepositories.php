<?php

namespace App\Repositories;
use App\Models\Product;
use App\Interfaces\ProductInterface;
use App\Models\ImgSliderProduct;

class ProductRepositories implements ProductInterface
{
    protected $productModel;
    protected $imgSliderModel;

    public function __construct(Product $productModel, ImgSliderProduct $imgSliderModel)
    {
        $this->productModel = $productModel;
        $this->imgSliderModel = $imgSliderModel;

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

    public function update($data, $id)
    {
        return $this->productModel->where('id', $id)->update($data);
    }

    // Thêm ảnh slider
    public function addImgSliderProduct($data_img)
    {
        return ImgSliderProduct::create($data_img);
    }

    // Lấy tất cả ảnh side trong update
    public function getAllImgSlider($productID)
    {
        return $this->imgSliderModel->where('id_product',$productID)->get();
    }

    // Update ảnh slider
    public function updateImgSlider($data_img, $id)
    {
        return $this->imgSliderModel->where('id', $id)->update($data_img);
    }


    // ==============================================

    // Lấy One ảnh slider
    public function getOneImgSlider($id)
    {
        return ImgSliderProduct::find($id);
    }

    // Xóa ảnh slider
    public function deleteOneImgSlider($id)
    {
        return ImgSliderProduct::destroy($id);
    }

}
?>