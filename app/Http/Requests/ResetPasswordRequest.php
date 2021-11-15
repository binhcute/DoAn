<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResetPasswordRequest extends FormRequest
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
            'password' => 'required|min:8|max:32',
            'password_confirmation' => 'same:password'
        ];
    }
    public function messages(){
        return [
            
            'password.required' => 'Mật khẩu không được bỏ trống',
            'password.min' => 'Mật khẩu phải từ 8 đến 32 ký tự',
            'password.max' => 'Mật khẩu phải từ 8 đến 32 ký tự', 
            'password_confirmation.same' => 'Nhập lại mật khẩu không trùng khớp' 
        ];
    }
}
