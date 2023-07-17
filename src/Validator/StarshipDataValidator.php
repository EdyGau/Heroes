<?php

namespace App\Validator;

class StarshipDataValidator extends BaseValidator
{
    protected const REQUIRED_KEYS = [
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
        static::checkRequiredKeys($data);
    }
}
