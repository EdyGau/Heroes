<?php

namespace App\Validator;

class SpeciesDataValidator
{
    private const REQUIRED_KEYS = [
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
        foreach (self::REQUIRED_KEYS as $key) {
            if (!array_key_exists($key, $data)) {
                throw new \InvalidArgumentException(sprintf('Missing required key "%s" in data.', $key));
            }
        }
    }
}
