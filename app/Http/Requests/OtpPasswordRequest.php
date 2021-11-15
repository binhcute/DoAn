<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OtpPasswordRequest extends FormRequest
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
            'token' => 'required|exists:tpl_reset_password'
        ];
    }
    public function messages(){
        return [
            'token.required' => 'Mã OTP không được để trống',
            'token.exists' => 'Mã OTP không đúng'
        ];
    }
}
