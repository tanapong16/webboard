<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'password_old' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required|same:password'
        ];
    }
    public function messages(){
        return [
            'password_old.required' => 'กรุณากรอก Password เก่า หรือ กรุณากรอก Password ให้ถูกต้อง',
            'password.required' => 'กรุณากรอก Password',
            'password_confirmation.required' => 'กรุณากรอกยืนยัน Password หรือ กรุณากรอกให้ตรงกับ Password'
        ];
    }
}
