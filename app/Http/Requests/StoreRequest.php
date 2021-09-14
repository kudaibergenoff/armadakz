<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => ['required',
//                'unique:stores,title,'.$this->id,
//                Rule::unique('stores')->ignore($this->store),
                'max:150'],
            'original_title' => 'required|max:150',
            'description' => 'required|max:2550',
        ];
    }

    public function attributes() // обозначение переменных
    {
        return [
            'title' => 'Название',
            'original_title' => 'Юридическое наименование',
//            'logo' => 'Изображение',
            'description' => 'Описание'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Поле ":attribute" обязательно к заполнению',
            'title.unique' => 'Поле ":attribute" должно быть уникальным',
            'title.max' => 'Максимальная длина поля ":attribute" не должна превышать :max символов',
            'original_title.required' => 'Поле ":attribute" обязательно к заполнению',
            'original_title.max' => 'Максимальная длина поля ":attribute" не должна превішать :max символов',
//            'logo.max' => 'Поле ":attribute" превышает допустимый размер (:max кБайт)',
            'description.required' => 'Поле ":attribute" обязательно к заполнению',
            'description.max' => 'Максимальная длина поля ":attribute" не должна превышать :max символов',
        ];
    }
}
