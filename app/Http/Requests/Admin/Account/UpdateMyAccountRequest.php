<?php

namespace App\Http\Requests\Admin\Account;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMyAccountRequest extends FormRequest
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
            'email' => 'required'
        ];
    }
    public function messages(){
        return [
            'firstName.required' => 'Họ không được bỏ trống',
            'lastName.required' => 'Tên không được bỏ trống',
            'email.required' => 'Email không được bỏ trống'
        ];
    }
}
