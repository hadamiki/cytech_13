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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'product_name' => 'required | max:30',
            'company_id' => 'required',
            'price' => 'required | integer | max:300',
            'stock' => 'required | integer | max:500',
            'comment' => 'max:200',
            
        ];
    }

    public function attributes(){
        return[
            'product_name' => '商品名',
            'company_id' => 'メーカー名',
            'price' => '価格',
            'stock' => '在庫数',
            'comment' => 'コメント',
            
        ];
    }

    public function messages(){
        return[
            'product_name.required' => ':attributeは必須項目です。',
            'product_name.max' => ':attributeは:max字以内で入力してください。',
            'company_id.required' => ':attributeは必須項目です。',
            'price.required' => ':attributeは必須項目です。',
            'price.integer' => ':attributeは整数で入力してください。',
            'price.max' => ':attributeは:max字以内で入力してください。',
            'stock.required' => ':attributeは必須項目です。',
            'stock.integer' => ':attributeは整数で入力してください。',
            'stock.max' => ':attributeは:max字以内で入力してください。',
            'comment.max' => ':attributeは:max文字以内で入力してください。',
            
        ];
    }
}
