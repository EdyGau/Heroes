<?php

namespace App\Validator;

class PeopleDataValidator extends BaseValidator
{
    protected const REQUIRED_KEYS = [
        'name',
        'height',
        'mass',
        'hair_color',
        'skin_color',
        'eye_color',
        'birth_year',
        'gender',
        'homeworld',
        'url'
    ];

    public static function validate(array $data): void
    {
        static::checkRequiredKeys($data);
    }
}
