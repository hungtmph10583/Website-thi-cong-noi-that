<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
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
        $ruleArr = [
            'name' => 'required',
            'category_id' => 'required',
            'material_id' => 'required',
            // 'length' => 'numeric',
            // 'weight' => 'numeric',
            // 'height' => 'numeric',
        ];
        if($this->id == null){
            $ruleArr['uploadfile'] = 'required|mimes:jpg,bmp,png,jpeg,webp';
        }else{
            $ruleArr['uploadfile'] = 'mimes:jpg,bmp,png,jpeg,webp';
        }
        return $ruleArr;
    }

    public function messages(){
        return [
            'name.required' => 'Hãy nhập tên sản phẩm',
            'category_id.required' => 'Hãy chọn loại danh mục',
            'material_id.required' => 'Hãy chọn loại nguyên liệu của sản phẩm',
            // 'length.numeric' => 'Chiều dài phải là số (VD: 25.6)',
            // 'weight.numeric' => 'Chiều dài phải là số (VD: 25.6)',
            // 'height.numeric' => 'Chiều dài phải là số (VD: 25.6)',
            'uploadfile.required' => 'Hãy chọn ảnh sản phẩm',
            'uploadfile.mimes' => 'File ảnh sản phẩm không đúng định dạng (jpg, bmp, png, jpeg,webp)',
        ];
    }
}
