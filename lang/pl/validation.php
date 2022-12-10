<?php

return [

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
        'name' => [
            'required' => 'Proszę podać imię',
            'alpha' => 'Imię może zawierać tylko litery',
        ],
        'email' => [
            'required' => 'Proszę podać email',
            'email' => 'Proszę podać poprawny email',
        ],
        'password' => [
            'required' => 'Proszę podać hasło',
            'between' => 'Hasło musi zawierać 8-20 znaków',
            'confirmed' => 'Hasła muszą być identyczne',
        ],
        'password_confirmation' => [
            'required' => 'Proszę podać hasło',
            'between' => 'Hasło musi zawierać 8-20 znaków',
        ],
    ],
];