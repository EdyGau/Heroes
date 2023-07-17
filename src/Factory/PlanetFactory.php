<?php

namespace App\Factory;

use App\Entity\Planet;
use App\Validator\PlanetDataValidator;

class PlanetFactory
{
    private PlanetDataValidator $dataValidator;

    public function __construct(PlanetDataValidator $dataValidator)
    {
        $this->dataValidator = $dataValidator;
    }

    public function create(array $data): Planet
    {
        $this->dataValidator->validate($data);

        $planet = new Planet();
        $planet->setName($data['name']);
        $planet->setRotationPeriod($data['rotation_period']);
        $planet->setOrbitalPeriod($data['orbital_period']);
        $planet->setDiameter($data['diameter']);
        $planet->setClimate($data['climate']);
        $planet->setGravity($data['gravity']);
        $planet->setTerrain($data['terrain']);
        $planet->setSurfaceWater($data['surface_water']);
        $planet->setPopulation($data['population']);
        $planet->setCreated(new \DateTime($data['created']));
        $planet->setEdited(new \DateTime($data['edited']));
        $planet->setUrl($data['url']);

        return $planet;
    }
}
