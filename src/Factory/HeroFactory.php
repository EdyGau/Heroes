<?php

namespace App\Factory;

use App\Entity\Hero;
use App\Validator\HeroDataValidator;

class HeroFactory
{
    private HeroDataValidator $dataValidator;

    public function __construct(HeroDataValidator $dataValidator)
    {
        $this->dataValidator = $dataValidator;
    }

    public function create(array $data): Hero
    {
        $this->dataValidator->validate($data);

        $hero = new Hero();
        $hero->setName($data['name']);
        $hero->setHeight($data['height']);
        $hero->setMass($data['mass']);
        $hero->setHair($data['hair_color']);
        $hero->setSkin($data['skin_color']);
        $hero->setEye($data['eye_color']);
        $hero->setBirthdayYear($data['birth_year']);
        $hero->setGender($data['gender']);
        $hero->setHomeworld($data['homeworld']);
        $hero->setUrl($data['url']);

        return $hero;
    }
}
