<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class CheckOutRequest extends FormRequest
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
            'address' => 'required',
            'phone' => 'required|gt:0',
        ];
    }
    public function messages(){
        return [
            'address.required' => 'Địa chỉ nhận hàng không được để trống',
            'phone.required' => 'Số điện thoại không được để trống',
            'phone.gt' => 'Số điện thoại không có thật, vui lòng nhập lại'
        ];
    }
}
