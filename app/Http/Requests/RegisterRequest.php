<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|min:2|max:150',
            'email' => 'required|string|email|max:150|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'phone' => 'required'
        ];
    }

    public function attributes() // обозначение переменных
    {
        return [
            'name' => 'Имя',
            'email' => 'E-mail',
            'password' => 'Пароль',
            'phone' => 'Телефон'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Не введёно :attribute',
            'email.required' => 'Не введён :attribute',
            'email.email' => 'Введён не :attribute',
            'email.max' => 'Превышена допустимая длина :attribute',
            'email.unique' => 'Данный :attribute уже есть в системе',
            'password.required' => 'Не введён :attribute',
            'password.min'  => ':attribute содержит менее 8 символов',
            'password.confirmed'  => ':attribute и его подтверждение не совпадают',
            'phone.required' => 'Не введён :attribute',
        ];
    }
}
