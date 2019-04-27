<?php

namespace App\Http\Requests;

use http\Env\Request;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RequestComment extends FormRequest
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
                    'text' => 'min:3|max:7000|unique:comments'
                ];
                break;


            case 'PUT':
                return  [
                    'text_update' => 'min:3|max:7000|unique:comments,text'
                ];
                break;
        }
    }

    public function messages()
    {

        switch ($this->method()){
            case 'POST':
                return  [
                'text.min' => '* Допустимо не меньше 3 символов',
                'text.max' => '* Допустимо не больше 1000 символов',
                'text.unique' => '* Точно такой же комментарий уже есть'
            ];
                break;


            case 'PUT':
                return  [
                    'text_update.min' => '* Допустимо не меньше 3 символов',
                    'text_update.max' => '* Допустимо не больше 1000 символов',
                    'text_update.unique' => '* Точно такой же комментарий уже есть'
                ];
                break;
        }

    }
}
