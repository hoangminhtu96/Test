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
            'txtUser'       => 'required|unique:users,username|min:4|max:16',
            'txtPass'       => 'required|min:6|',
            'txtRePass'     => 'required|same:txtPass',
            'txtEmail'      => 'required|email'
        ];
    }
    public function messages()
    {
        return [
            'txtUser.required' => 'Vui lòng nhập Username',
            'txtUser.min' => 'UserName >= 4 ký tự',
            'txtUser.max' => 'UserName dài quá 16 ký tự cho phép',
            'txtUser.unique' => 'Username đã được sử dụng',
            'txtPass.required' => 'Vui lòng nhập Password',
            'txtPass.min' => 'Password >= 6 ký tự',
            'txtRePass.required' => 'Vui lòng nhập lại Password',
            'txtRePass.same' => 'Xác nhận Password không khớp',
            'txtEmail.required' => 'Vui lòng nhập Email',
            'txtEmail.email' => 'Emai không hợp lệ'
        ];
    }
}
