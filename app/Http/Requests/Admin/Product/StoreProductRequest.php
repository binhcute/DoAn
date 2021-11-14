<?php

namespace App\Http\Requests\Admin\Product;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'name' => 'required|max:100',
            'quantity' => 'required|max:1000',
            'price' => 'required',
            'img' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên sản phẩm không được bỏ trống',
            'name.max' => 'Tên sản phẩm phải ít hơn 100 ký tự',
            'quantity.max' => 'Số lượng 1 sản phẩm tối đa 999 sản phẩm',
            'quantity.required' => 'Số lượng không được bỏ trống',
            'price.required' => 'Giá sản phẩm không được bỏ trống',
            'img.required' => 'Ảnh sản phẩm không được bỏ trống',
            'img.mimes' => 'Hình ảnh không đúng định dạng',
            'img.max' => 'Hình ảnh có kích cỡ quá khổ'
        ];
    }
}
