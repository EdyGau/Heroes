<?php

namespace App\Validator;

class FilmDataValidator
{
    private const REQUIRED_KEYS = [
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
        foreach (self::REQUIRED_KEYS as $key) {
            if (!array_key_exists($key, $data)) {
                throw new \InvalidArgumentException(sprintf('Missing required key "%s" in data.', $key));
            }
        }
    }
}
