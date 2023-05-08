<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'update_name' => 'required',
            'update_category' => 'required',
            'update_hangsx' => 'required',
            'update_price' => 'required|numeric|between:10000,1000000000',
            'update_description' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'update_name.required' => 'Vui lòng nhập tên sản phẩm',
            'update_category.required' => 'Vui lòng chọn danh mục',
            'update_hangsx.required' => 'Vui lòng chọn hãng sản xuất',
            'update_price.required' => 'Vui lòng nhập giá sản phẩm',
            'update_price.numeric' => 'Giá sản phẩm phải là số',
            'update_price.between' => 'Giá sản phẩm phải nằm trong khoảng từ :10000 đến :1000000000',
            'update_description.required' => 'Vui lòng nhập mô tả',
        ];
    }
}
