<?php

namespace App\Http\Requests\Admin\Category;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
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
            'name.required' => 'Tên danh mục không được bỏ trống',
            'name.max' => 'Tên danh mục phải ít hơn 100 ký tự'
        ];
    }
}
