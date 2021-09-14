<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => ':attribute должен быть принят.',
    'active_url' => ':attribute - не действительный URL.',
    'after' => ':attribute - дата должна быть после :date.',
    'after_or_equal' => ':attribute - дата должна быть после или равна :date.',
    'alpha' => ':attribute может содержать только буквы.',
    'alpha_dash' => ':attribute может содержать только буквы, цифры, дефисы и символы подчеркивания.',
    'alpha_num' => ':attribute может содержать только буквы и цифры.',
    'array' => ':attribute должен быть массивом.',
    'before' => ':attribute дата должна быть до :date.',
    'before_or_equal' => ':attribute дата должна быть до или равна :date.',
    'between' => [
        'numeric' => ':attribute должен быть между :min и :max.',
        'file' => ':attribute должен быть между :min и :max килобайт.',
        'string' => ':attribute должен быть между :min и :max символов.',
        'array' => ':attribute должен быть между :min и :max элементов.',
    ],
    'boolean' => 'Поле :attribute дожно быть true или false.',
    'confirmed' => ':attribute подверждение не совпадает.',
    'date' => ':attribute дата на действительна.',
    'date_equals' => ':attribute дата должна быть равна :date.',
    'date_format' => ':attribute не соответствует формату :format.',
    'different' => ':attribute и :other должны быть разными.',
    'digits' => ':attribute должен быть :digits digits.',
    'digits_between' => ':attribute должен быть между :min и :max значений.',
    'dimensions' => ':attribute имеет недопустимые размеры изображения.',
    'distinct' => ':attribute имеет повторяющееся значение.',
    'email' => ':attribute адрес эл. почты должен быть действительным.',
    'ends_with' => ':attribute должен заканчиваться одним из following: :values.',
    'exists' => 'Выбранный :attribute является недействительным.',
    'file' => ':attribute должен быть файлом.',
    'filled' => 'Поле :attribute должно иметь значение.',
    'gt' => [
        'numeric' => ':attribute должнен быть больше, чем :value.',
        'file' => ':attribute должнен быть больше, чем :value килобайт.',
        'string' => ':attribute должнен быть больше, чем :value символов.',
        'array' => ':attribute должнен быть больше, чем :value элементов.',
    ],
    'gte' => [
        'numeric' => ':attribute должнен быть больше или равен :value.',
        'file' => ':attribute должнен быть больше или равен :value kilobytes.',
        'string' => ':attribute должнен быть больше или равен :value characters.',
        'array' => ':attribute должен содержать :value или больше элементов.',
    ],
    'image' => ':attribute должен быть изображением.',
    'in' => 'выбранный :attribute является недействительным.',
    'in_array' => 'Поле :attribute не существует в :other.',
    'integer' => ':attribute must be an integer.',
    'ip' => ':attribute должен быть действующим IP-адресом.',
    'ipv4' => ':attribute должен быть действующим IPv4-адресом.',
    'ipv6' => ':attribute должен быть действующим IPv6-адресом.',
    'json' => ':attribute должен быть действительной строкой JSON.',
    'lt' => [
        'numeric' => ':attribute должен быть меньше чем :value.',
        'file' => ':attribute должен быть меньше чем :value килобайт.',
        'string' => ':attribute должен быть меньше чем :value символов.',
        'array' => ':attribute должен иметь меньше :value элементов.',
    ],
    'lte' => [
        'numeric' => ':attribute должен быть меньше или равнен :value.',
        'file' => ':attribute должен быть меньше или равнен :value kilobytes.',
        'string' => ':attribute должен быть меньше или равнен :value characters.',
        'array' => ':attribute должен содержать меньше :value элементов.',
    ],
    'max' => [
        'numeric' => ':attribute не может быть больше чем :max.',
        'file' => ':attribute не может быть больше чем :max килобайт.',
        'string' => ':attribute не может быть больше чем :max символов.',
        'array' => ':attribute не может содеражать более чем :max элементов.',
    ],
    'mimes' => ':attribute файл должен быть следующего типа: :values.',
    'mimetypes' => ':attribute файл должен быть следующего типа: :values.',
    'min' => [
        'numeric' => ':attribute должен быть не менее :min.',
        'file' => ':attribute должен быть не менее :min килобайт.',
        'string' => ':attribute должен быть не менее :min символов.',
        'array' => ':attribute должен содержать не менее :min элементов.',
    ],
    'not_in' => 'выбранный :attribute является недействительыми.',
    'not_regex' => ':attribute формат недействителен.',
    'numeric' => ':attribute должнен быть числом.',
    'password' => 'password введен не верно.',
    'present' => 'Поле :attribute должно присутствовать.',
    'regex' => ':attribute формат недействителен.',
    'required' => 'Поле :attribute обязательно для заполнения.',
    'required_if' => 'Поле :attribute обязательно, когда :other равно :value.',
    'required_unless' => 'Поле :attribute является обязательным, если :other содержится в :values.',
    'required_with' => 'Поле :attribute обязательно, когда :values присутствует.',
    'required_with_all' => 'Поле :attribute обязательно, когда :values присутствуют.',
    'required_without' => 'Поле :attribute обязательно, когда :values не присутствует.',
    'required_without_all' => 'Поле :attribute обязательно, если ни один из :values присутствует.',
    'same' => ':attribute и :other должны соответствовать.',
    'size' => [
        'numeric' => ':attribute должен быть :size.',
        'file' => ':attribute должен быть :size килобайт.',
        'string' => ':attribute должен быть :size символов.',
        'array' => ':attribute должен содержать :size элементов.',
    ],
    'starts_with' => ':attribute должен начинаться с одного из следующих: :values.',
    'string' => ':attribute должен быть строкой.',
    'timezone' => ':attribute должна быть действующая зона.',
    'unique' => ':attribute уже использовано.',
    'uploaded' => 'Не удалось загрузить :attribute.',
    'url' => ':attribute формат недействителен.',
    'uuid' => ':attribute должен быть действительный UUID.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
