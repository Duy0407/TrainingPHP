<?php

namespace App\Interfaces;

interface ProductInterface
{
    public function getAll($search, $categoryId, $manufacturerId);

    public function find($id);

    public function create($data);

    public function update($data, $id);



    // Thêm ảnh side
    public function addImgSliderProduct($data);
    
    // Lấy tất cả ảnh side trong update
    public function getAllImgSlider($productID);

    // Sửa ảnh side
    public function updateImgSlider($data_img, $id);
}
