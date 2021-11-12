<?php

namespace App\Http\Requests\Admin\Account;

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
            'email' => 'required|email|unique:users',
            'username' => 'required|unique:users|min:8|max:16',
            'password' => 'required|min:8|max:32',
            'password_confirmation' => 'same:password'
        ];
    }
    public function messages(){
        return [
            'firstName.required' => 'Họ không được bỏ trống',
            'lastName.required' => 'Tên không được bỏ trống',
            'email.required' => 'Email không được bỏ trống',
            'email.email' => 'Email không đúng',
            'email.unique' => 'Email này đã có người sử dụng',
            'username.required' => 'Tên tài khoản không được bỏ trống',
            'username.unique' => 'Tên tài khoản đã có người sử dụng',
            'username.min' => 'Tên tài khoản phải từ 8 đến 16 ký tự',
            'username.max' => 'Tên tài khoản phải từ 8 đến 16 ký tự',
            'password.required' => 'Mật khẩu không được bỏ trống',
            'password.min' => 'Mật khẩu phải từ 8 đến 32 ký tự',
            'password.max' => 'Mật khẩu phải từ 8 đến 32 ký tự', 
            'password_confirmation.same' => 'Nhập lại mật khẩu không trùng khớp' 
        ];
    }
}
