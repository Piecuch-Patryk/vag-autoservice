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
        'post_code' => [
            'required' => 'Proszę podać kod pocztowy',
        ],
        'city' => [
            'required' => 'Proszę podać nazwę miejscowości',
        ],
        'street' => [
            'required' => 'Proszę podać nazwę ulicy',
        ],
        'number' => [
            'required' => 'Proszę podać numer ulicy',
            'numeric' => 'Pole może zawierać tylko cyfry',
        ],
        'make' => [
            'required' => 'Podaj mmarkę samochodu',
        ],
        'model' => [
            'required' => 'Podaj model samochodu',
        ],
        'registration' => [
            'required' => 'Podaj rejestrację samochodu',
        ],
        'vin' => [
            'required' => 'Podaj numer VIN',
        ],
        'mileage' => [
            'required' => 'Podaj przebieg samochodu'
        ],
        'phone' => [
            'required' => 'Proszę podać numer telefonu'
        ],
        'search' => [
            'required' => 'Pole wyszukiwania nie może być puste'
        ],
        'catName' => [
            'required' => 'Wpisz nazwę kategorii'
        ],
        'proName' => [
            'required' => 'Wpisz nazwę usługi'
        ],
        'price' => [
            'required' => 'Wpisz cenę usługi'
        ],
        'category_id' => [
            'required' => 'Wybierz kategorię dla tego produktu'
        ],
        'password_pdf' => [
            'rewuired' => 'Wpisz hasło dla plików PDF',
        ],
        'content' => [
            'required' => 'Proszę wpisać wiadomość',
        ],
    ],
];
