<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'txtName' =>'required|unique:products,name',
            'fImages' =>'required|image|mimes:jpeg,png,jpg,gif,svg',
            'sltParent' => 'required'
        ];
    }
    public function messages(){
        return [
            'txtName.required' => 'Xin vui lòng nhập Name',
            'txtName.unique'   => 'Tên này đã được sử dụng',
            'fImages.required' => 'Xin vui lòng chọn hình ảnh',
            'fImages.image'    => 'File tải lên không đúng định dạng',
            'fImages.mimes'    => 'File tải lên không đúng định dạng',
            'sltParent.required' => 'Xin vui lòng chọn Parent Category'
        ];
    }
}
