<?php

namespace App\Validator;

class PlanetDataValidator
{
    private const REQUIRED_KEYS = [
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
        foreach (self::REQUIRED_KEYS as $key) {
            if (!array_key_exists($key, $data)) {
                throw new \InvalidArgumentException(sprintf('Missing required key "%s" in data.', $key));
            }
        }
    }
}
