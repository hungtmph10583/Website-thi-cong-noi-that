<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class CategoryFormRequest extends FormRequest
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
        $ruleArr = [
            'name' => [
                'required',
                Rule::unique('categories')->ignore($this->id)
            ]
        ];
        if($this->id == null){
            $ruleArr['uploadfile'] = 'mimes:jpg,bmp,png,jpeg';
        }else{
            $ruleArr['uploadfile'] = 'mimes:jpg,bmp,png,jpeg';
        }
        return $ruleArr;
    }

    public function messages(){
        return [
            'name.required' => 'Hãy nhập tên danh mục',
            'name.unique' => 'Tên danh mục đã tồn tại',
            'uploadfile.mimes' => 'File ảnh sản phẩm không đúng định dạng (jpg, bmp, png, jpeg)',
        ];
    }
}
