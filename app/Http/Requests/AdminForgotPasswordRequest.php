<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AdminForgotPasswordRequest extends FormRequest
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
            'email' => 'required|email|between:6,64'
        ];
    }

    public function messages()
    {
        return [
            'email.email' => 'Bạn nhập không đúng định dạng email !',
            'email.required' => 'Bạn không được để trống !',
            'email.between' => 'Bạn phải nhập ký tự trong khoảng :min đến :max ký tự'
        ];
    }
}
