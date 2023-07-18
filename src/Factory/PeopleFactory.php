<?php

namespace App\Factory;

use App\Entity\People;
use App\Validator\PeopleDataValidator;

class PeopleFactory
{
    private PeopleDataValidator $dataValidator;

    public function __construct(PeopleDataValidator $dataValidator)
    {
        $this->dataValidator = $dataValidator;
    }

    public function create(array $data): People
    {
        $this->dataValidator->validate($data);

        $people = new People();
        $people->setName($data['name']);
        $people->setHeight($data['height']);
        $people->setMass($data['mass']);
        $people->setHair($data['hair_color']);
        $people->setSkin($data['skin_color']);
        $people->setEye($data['eye_color']);
        $people->setBirthdayYear($data['birth_year']);
        $people->setGender($data['gender']);
        $people->setUrl($data['url']);

        return $people;
    }
}
