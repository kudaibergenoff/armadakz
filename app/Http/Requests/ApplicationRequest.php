<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApplicationRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'organization' => 'required|min:4|max:190',
            'name' => 'required|min:2|max:190',
            'position' => 'required|min:4|max:190',
        ];
    }

    public function messages()
    {
        return [
            'organization.required' => 'Поле "Название организации" обязательно к заполнению',
            'organization.min' => 'Минимальная длина поля "Название организации" 4 символа',
            'organization.max' => 'Максимальная длина поля "Название организации" 190 символов',
            'name.required' => 'Поле "Контактное лицо" обязательно к заполнению',
            'name.min' => 'Минимальная длина поля "Контактное лицо" 2 символа',
            'name.max' => 'Максимальная длина поля "Контактное лицо" 190 символов',
            'position.required' => 'Поле "Должность" обязательно к заполнению',
            'position.min' => 'Минимальная длина поля "Должность" 4 символа',
            'position.max' => 'Максимальная длина поля "Должность" 190 символов',
        ];
    }
}
