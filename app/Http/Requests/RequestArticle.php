<?php

namespace App\Http\Requests;
use http\Env\Request;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RequestArticle extends FormRequest
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

            case 'GET':
            case 'DELETE':
                return [];
                break;


            case 'POST':
                return [
                    'title' => 'unique:articles|max:255',
                    'full_text' => 'unique:articles|min:300|max:1000000',
                    'photo' => 'image|max:700'
                ];
                break;


            case 'PUT':
            case 'PATCH':
                return [
                    'title' => 'max:255|'.Rule::unique('articles')->
                        ignore($this->article->id),
                    'full_text' => 'min:300|max:1000000|'.Rule::unique('articles')->
                        ignore($this->article->id),
                    'photo' => 'image|max:700|nullable'
                ];
                break;
            default: break;

        }
    }

    public function messages()
    {

        switch ($this->method()){

            case 'GET':
            case 'DELETE':
                return [];
                break;


            case 'POST':
                return [
                    'title.unique' => ' * Название уже занято',
                    'title.max' => ' * Разрешено не более 250 символов',
                    'full_text.unique' => ' * Эта статья уже существует',
                    'full_text.min' => ' * Разрешено не менее 2 символов',
                    'full_text.max' => ' * Разрешено не более 1 000 000 символов',
                    'photo.image' => ' * Можно загружать только фото',
                    'photo.max' => ' * Размер должен быть не более 700 килобайтов'
                ];
                break;


            case 'PUT':
            case 'PATCH':
                return [
                    'full_text.unique' => ' * Эта статья уже есть',
                    'full_text.min' => ' * Слишком короткая',
                    'full_text.max' => ' * Допустимо не более 1 000 000 символов',
                    'title.max' => ' * Слишком длинное название',
                    'title.unique' => ' * Это название уже используется',
                    'photo.image' => ' * Можно загружать только фото',
                    'photo.max' => ' * Размер должен быть не более 700 килобайтов',
                ];
                break;
            default: break;

        }
    }
}
