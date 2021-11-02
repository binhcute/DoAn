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
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên nhà cung cấp không được bỏ trống',
            'name.max' => 'Tên nhà cung cấp phải ít hơn 255 ký tự'
        ];
    }
}
