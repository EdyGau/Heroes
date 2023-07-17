<?php

namespace App\Factory;

use App\Entity\Starship;
use App\Validator\StarshipDataValidator;
use DateTime;

class StarshipFactory
{
    private StarshipDataValidator $dataValidator;

    public function __construct(StarshipDataValidator $dataValidator)
    {
        $this->dataValidator = $dataValidator;
    }

    public function create(array $data): Starship
    {
        $this->dataValidator->validate($data);

        $starship = new Starship();
        $starship->setName($data['name']);
        $starship->setModel($data['model']);
        $starship->setManufacturer($data['manufacturer']);
        $starship->setCostInCredits($data['cost_in_credits']);
        $starship->setLength($data['length']);
        $starship->setMaxAtmospheringSpeed($data['max_atmosphering_speed']);
        $starship->setCrew($data['crew']);
        $starship->setPassengers($data['passengers']);
        $starship->setCargoCapacity($data['cargo_capacity']);
        $starship->setConsumables($data['consumables']);
        $starship->setHyperdriveRating($data['hyperdrive_rating']);
        $starship->setMGLT($data['MGLT']);
        $starship->setStarshipClass($data['starship_class']);
        $starship->setCreated(new DateTime($data['created']));
        $starship->setEdited(new DateTime($data['edited']));
        $starship->setUrl($data['url']);

        return $starship;
    }
}
