<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|min:2|max:150',
            'email' => 'required|string|email|max:150',
            'text' => 'required|string|min:2',
        ];
    }

    public function attributes() // обозначение переменных
    {
        return [
            'name' => 'Имя',
            'email' => 'E-mail',
            'text' => 'Сообщение',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Не введёно :attribute',
            'name.min'  => ':attribute содержит менее 2 символов',
            'name.max' => 'Превышена допустимая длина :attribute',
            'email.required' => 'Не введён :attribute',
            'email.email' => 'Введён не :attribute',
            'email.max' => 'Превышена допустимая длина :attribute',
            'text.required' => 'Не введён :attribute',
            'text.min'  => ':attribute содержит менее 2 символов',
        ];
    }
}
