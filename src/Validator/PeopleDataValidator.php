<?php

namespace App\Validator;

class PeopleDataValidator
{
    private const REQUIRED_KEYS = [
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
        foreach (self::REQUIRED_KEYS as $key) {
            if (!array_key_exists($key, $data)) {
                throw new \InvalidArgumentException(sprintf('Missing required key "%s" in data.', $key));
            }
        }
    }
}
