<?php

namespace App\Http\Requests\Admin\Article;

use Illuminate\Foundation\Http\FormRequest;

class UpdateArticleRequest extends FormRequest
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
            'description' => 'required|min:20|max:255',
            'detail' => 'required|min:50'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên bài viết không được bỏ trống',
            'name.max' => 'Tên bài viết phải ít hơn 100 ký tự',
            'description.required' => 'Mô tả bài viết không được bỏ trống',
            'description.min' => 'Mô tả bài viết phải nhiều hơn 20 ký tự',
            'description.max' => 'Mô tả bài viết phải ít hơn 255 ký tự',
            'detail.required' => 'Nội dung bài viết không được bỏ trống',
            'detail.min' => 'Nội dung bài viết phải nhiều hơn 50 ký tự'
        ];
    }
}
