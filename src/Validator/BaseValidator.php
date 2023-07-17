<?php

namespace App\Validator;

use InvalidArgumentException;

abstract class BaseValidator
{
    protected const REQUIRED_KEYS = [];

    /**
     * Validates data against required keys.
     *
     * @param array $data An array of validation data.
     * @throws InvalidArgumentException Thrown when a required key is missing from the data.
     */
    abstract public static function validate(array $data): void;

    /**
     * Checking if all required keys are present in the data.
     *
     * @param array $data An array of data to check.
     * @throws InvalidArgumentException Thrown when a required key is missing from the data.
     */
    protected static function checkRequiredKeys(array $data): void
    {
        foreach (static::REQUIRED_KEYS as $key) {
            if (!array_key_exists($key, $data)) {
                throw new InvalidArgumentException(sprintf('Missing required key "%s" in data.', $key));
            }
        }
    }
}