<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
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
            'hoten' => 'required',
            'email' => 'required|email',
            'sdt' => 'required',
            'diachi' => 'required',
            'thanhpho' => 'required',
        ];
    }

    public function messages(){
        return [
            'hoten.required'    =>'Bạn chưa nhập họ tên.',
            'email.required'    =>'Bạn chưa nhập Email.',
            'email.email'    =>'Bạn phải nhập đúng email để xác nhận đơn hàng.',
            'sdt.required'    =>'Bạn chưa nhập số điện thoại.',
            'diachi.required'    =>'Bạn chưa nhập địa chỉ.',
            'thanhpho.required'    =>'Bạn chưa nhập thành phố.',
        ];
    }
}
