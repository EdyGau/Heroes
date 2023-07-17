<?php

namespace App\Factory;

use App\Entity\Species;
use App\Validator\SpeciesDataValidator;

class SpeciesFactory
{
    private SpeciesDataValidator $dataValidator;

    public function __construct(SpeciesDataValidator $dataValidator)
    {
        $this->dataValidator = $dataValidator;
    }
    public function create(array $data): Species
    {
        $species = new Species();
        $species->setName($data['name']);
        $species->setClassification($data['classification']);
        $species->setDesignation($data['designation']);
        $species->setAverageHeight($data['average_height']);
        $species->setSkinColors($data['skin_colors']);
        $species->setHairColors($data['hair_colors']);
        $species->setEyeColors($data['eye_colors']);
        $species->setAverageLifespan($data['average_lifespan']);
        $species->setLanguage($data['language']);
        $species->setCreated(new \DateTime($data['created']));
        $species->setEdited(new \DateTime($data['edited']));
        $species->setUrl($data['url']);

        return $species;
    }
}
