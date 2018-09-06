<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductEditRequest extends FormRequest
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
           'sltParent'=>'required',
           'txtName'  =>'required'
        ];

    }

    public function messages(){
        return[
            'sltParent.required' => "Bạn chưa chọn Category!",
            'txtName.required'  =>'Name không được trống!'
        ];
    }
}
