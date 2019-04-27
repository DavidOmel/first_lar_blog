<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestUser extends FormRequest
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
                return [
                    'name' => 'between:3,50',
                    'email' => 'unique:users',
                    'pw' => 'between:5,16',
                    'confirm' => 'same:pw'
                ];
            break;

            case 'PUT':
                return [
                    'new_password' => 'between:5,16'
                ];
                break;
        }
    }

    public function messages()
    {
        switch ($this->method()){
            case 'POST':
                return [
                    'name.between' => '* Допустимо от 3 до 50 символов ',
                    'email.unique' => '* Такая почта уже используется',
                    'pw.between' => '* Допустимо от 5 до 16 символов ',
                    'confirm.same' => '* Вы не подтвердили пароль'
                ];
                break;

            case 'PUT':
                return [
                    'new_password.between' => '* Допустимо от 5 до 16 символов '
                ];
                break;
        }
    }
}
