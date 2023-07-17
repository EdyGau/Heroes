<?php

namespace App\Validator;

class PlanetDataValidator extends BaseValidator
{
    protected const REQUIRED_KEYS = [
        'name',
        'rotation_period',
        'orbital_period',
        'diameter',
        'climate',
        'gravity',
        'terrain',
        'surface_water',
        'population',
        'created',
        'edited',
        'url'
    ];

    public static function validate(array $data): void
    {
        static::checkRequiredKeys($data);
    }
}
