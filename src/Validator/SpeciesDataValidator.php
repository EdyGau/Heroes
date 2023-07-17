<?php

namespace App\Validator;

class SpeciesDataValidator extends BaseValidator
{
    protected const REQUIRED_KEYS = [
        'name',
        'classification',
        'designation',
        'average_height',
        'skin_colors',
        'skin_colors',
        'hair_colors',
        'eye_colors',
        'average_lifespan',
        'language',
        'created',
        'edited',
        'url',
    ];

    public static function validate(array $data): void
    {
        static::checkRequiredKeys($data);
    }
}
