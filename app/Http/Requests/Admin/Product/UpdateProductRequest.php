<?php

namespace App\Http\Requests\Admin\Product;

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
            'name' => 'required|max:100',
            'quantity' => 'required|max:1000|numeric|gt:0',
            'price' => 'required|numeric|min:1000|gt:0'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên sản phẩm không được bỏ trống',
            'name.max' => 'Tên sản phẩm phải ít hơn 100 ký tự',
            'quantity.max' => 'Số lượng 1 sản phẩm tối đa 999 sản phẩm',
            'quantity.required' => 'Số lượng không được bỏ trống',
            'quantity.gt' => 'Số lượng không được âm',
            'price.required' => 'Giá sản phẩm không được bỏ trống',
            'price.gt' => 'Giá sản phẩm không được âm',
            'price.min' => 'Giá sản phẩm phải lớn hơn 1.000đ',
        ];
    }
}
