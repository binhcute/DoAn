<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreAccountRequest extends FormRequest
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
            'firstName' => 'required',
            'lastName' => 'required',
            'username' => 'required|unique:users',
            'password' => 'required',
            'level' => 'required',
            'status' => 'required'
        ];
    }
    public function messages(){
        return [
            'firstName.required' => 'Họ không được bỏ trống',
            'lastName.required' => 'Tên không được bỏ trống',
            'username.required' => 'Tên đăng nhập không được bỏ trống',
            'username.unique' => 'Tên đăng nhập đã có người sử dụng',
            'password.required' => 'Mật khẩu không được bỏ trống',
            'level.required' => 'Cấp bật không được bỏ trống',
            'status.required' => 'Trạng thái không được bỏ trống',
        ];
    }
}
