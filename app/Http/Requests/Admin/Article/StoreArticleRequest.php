<?php

namespace App\Http\Requests\Admin\Article;

use Illuminate\Foundation\Http\FormRequest;

class StoreArticleRequest extends FormRequest
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
            'description' => 'required|min:20|max:1000',
            'detail' => 'required|min:50',
            'status' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'img.required' => 'Hình ảnh không được bỏ trống',
            'img.mimes' => 'Hình ảnh không đúng định dạng',
            'img.max' => 'Hình ảnh có kích cỡ quá khổ',
            'name.required' => 'Tên bài viết không được bỏ trống',
            'name.max' => 'Tên bài viết phải ít hơn 100 ký tự',
            'description.required' => 'Mô tả bài viết không được bỏ trống',
            'description.min' => 'Mô tả bài viết phải nhiều hơn 20 ký tự',
            'description.max' => 'Mô tả bài viết phải ít hơn 1000 ký tự',
            'detail.required' => 'Nội dung bài viết không được bỏ trống',
            'detail.min' => 'Nội dung bài viết phải nhiều hơn 50 ký tự',
            'status.required' => 'Trạng thái danh mục không được bỏ trống'
        ];
    }
}
