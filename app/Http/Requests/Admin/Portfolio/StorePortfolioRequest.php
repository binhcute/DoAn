<?php

namespace App\Http\Requests\Admin\Portfolio;

use Illuminate\Foundation\Http\FormRequest;

class StorePortfolioRequest extends FormRequest
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
            'name' => 'required|max:100|unique:tpl_portfolio,port_name',
            'avatar' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'img' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên nhà cung cấp không được bỏ trống',
            'name.max' => 'Tên nhà cung cấp phải ít hơn 255 ký tự',
            'name.unique' => 'Tên nhà cung cấp này đã tồn tại',
            'img.required' => 'Ảnh nhà cung cấp không được bỏ trống',
            'img.mimes' => 'Hình ảnh không đúng định dạng',
            'img.max' => 'Hình ảnh có kích cỡ quá khổ',
            'avatar.required' => 'Avatar nhà cung cấp không được bỏ trống',
            'avatar.mimes' => 'Avatar không đúng định dạng',
            'avatar.max' => 'Avatar có kích cỡ quá khổ'
        ];
    }
}
