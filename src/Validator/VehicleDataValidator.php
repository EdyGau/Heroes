<?php

namespace App\Validator;

class VehicleDataValidator extends BaseValidator
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
        'vehicle_class',
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
