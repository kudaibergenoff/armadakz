<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'service.*' => 'required',
            'file.*' => 'file|max:5000',
            'title' => 'required|max:190',
            'description' => 'required|max:2500',
        ];
    }

    public function attributes() // обозначение переменных
    {
        return [
            'service.*' => 'Категория задания',
            'file.*' => 'Один из фалов',
            'title' => 'Название задания',
            'description' => 'Описание задания',
        ];
    }

    public function messages()
    {
        return [
            'service.required' => 'Не выбрана :attribute',
            'file.*' => ':attribute превышает допустимый размер',
            'title.required' => 'Не указанно :attribute',
            'title.max' => ':attribute превышает допустиный размер',
            'description.required' => 'Не указанно :attribute',
            'description.max' => ':attribute превышает допустиный размер',
        ];
    }
}
