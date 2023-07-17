<?php

namespace App\Validator;

class FilmDataValidator extends BaseValidator
{
    protected const REQUIRED_KEYS = [
        'title',
        'episode_id',
        'opening_crawl',
        'director',
        'producer',
        'release_date',
        'created',
        'edited',
        'url'
    ];

    public static function validate(array $data): void
    {
        static::checkRequiredKeys($data);
    }
}
