<?php

namespace App\Http\Requests\Admin;

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
            'img' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required|max:100',
            'price' => 'required|max:11'
        ];
    }
    public function messages()
    {
        return [
            'img.required' => 'Hình ảnh không được bỏ trống',
            'img.mimes' => 'Hình ảnh không đúng định dạng',
            'img.max' => 'Hình ảnh có kích cỡ quá khổ',
            'name.required' => 'Tên sản phẩm không được bỏ trống',
            'name.max' => 'Tên sản phẩm phải ít hơn 100 ký tự',
            'price.required' => 'Giá sản phẩm không được bỏ trống',
            'price.max:' => 'Giá sản phẩm phải ít hơn 11 chữ số'
        ];
    }
}
