<?php

namespace App\Http\Requests\Admin\Category;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
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
        ];
    }
    public function messages()
    {
        return [
            'img.required' => 'Hình ảnh không được bỏ trống',
            'img.mimes' => 'Hình ảnh không đúng định dạng',
            'img.max' => 'Hình ảnh có kích cỡ quá khổ',
            'name.required' => 'Tên danh mục không được bỏ trống',
            'name.max' => 'Tên danh mục phải ít hơn 100 ký tự'
        ];
    }
}
