<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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

    public function rules()
    {
        return [
            'file.*' => 'file|max:5000',
            'description' => 'required|max:2500',
            'price' => 'required|numeric',
        ];
    }

    public function attributes() // обозначение переменных
    {
        return [
            'file.*' => 'Один из фалов',
            'description' => 'Описание задания',
            'price' => 'Цена',
        ];
    }

    public function messages()
    {
        return [
            'file.*' => ':attribute превышает допустимый размер',
            'description.required' => 'Не указанно :attribute',
            'description.max' => ':attribute превышает допустиный размер',
            'price.required' => 'Не указанна :attribute',
            'price.numeric' => ':attribute введена не числом',
        ];
    }
}
