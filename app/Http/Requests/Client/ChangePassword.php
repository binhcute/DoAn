<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class ChangePassword extends FormRequest
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
            'new_pwd' => 'required|min:8|max:32',
            'confirm_pwd' => 'same:new_pwd'
        ];
    }
    public function messages(){
        return [
            'new_pwd.required' => 'Mật khẩu không được bỏ trống',
            'new_pwd.min' => 'Mật khẩu phải từ 8 đến 32 ký tự',
            'new_pwd.max' => 'Mật khẩu phải từ 8 đến 32 ký tự', 
            'confirm_pwd.same' => 'Nhập lại mật khẩu không trùng khớp' 
        ];
    }
}
