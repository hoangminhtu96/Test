<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name'=>'required|unique:users,username',
            'email'=>'required|email',
            'password'=>'required|min:6',
            're-password'=>'required|same:password'
        ];
    }
    public function messages()
    {
        return [
            'name.required' =>'Bạn chưa nhập tên đăng nhập',
            'name.unique'   =>'Tên này đã được sử dụng!',
            'email.required'=>'Bạn chưa nhập email',
            'email.email'   =>'Email không đúng',
            'password.required'=>'Bạn chưa nhập password',
            're-password.required'=>'Bạn chưa nhập password',
            're-password.same'=>'Xác nhận password không khớp',
            'password.min'=>'Password cần ít nhất 6 ký tự',
        ];
    }
}
