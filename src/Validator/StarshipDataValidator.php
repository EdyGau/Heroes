<?php

namespace App\Validator;

class StarshipDataValidator
{
    private const REQUIRED_KEYS = [
        'name',
        'model',
        'manufacturer',
        'cost_in_credits',
        'length',
        'max_atmosphering_speed',
        'crew',
        'passengers',
        'cargo_capacity',
        'consumables',
        'hyperdrive_rating',
        'MGLT',
        'starship_class',
        'pilots',
        'films',
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
