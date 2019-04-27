<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestCategory extends FormRequest
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
        switch ($this->method()){
            case 'POST':
                return  [
                'category' => 'min:3|max:50|unique:categories,name'
            ];
                break;
            case 'PUT':
                return  [
                    'category_update' => 'min:3|max:50|unique:categories,name'
                ];
                break;
        }
    }

    public function messages()
    {

        switch ($this->method()){
            case 'POST':
                return  [
                'category.min' => '* Допустимо не меньше 3 символов',
                'category.max' => '* Допустимо не больше 50 символов',
                'category.unique' => '* Точно такая же категория уже есть'
            ];
                break;
            case 'PUT':
                return  [
                    'category_update.min' => '* Допустимо не меньше 3 символов',
                    'category_update.max' => '* Допустимо не больше 50 символов',
                    'category_update.unique' => '* Точно такая же категория уже есть'
                ];
                break;
        }

    }
}
