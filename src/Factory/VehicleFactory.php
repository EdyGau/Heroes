<?php

namespace App\Factory;

use App\Entity\Vehicle;
use App\Validator\VehicleDataValidator;

class VehicleFactory
{    private VehicleDataValidator $dataValidator;

    public function __construct(VehicleDataValidator $dataValidator)
    {
        $this->dataValidator = $dataValidator;
    }

        public function create(array $data): Vehicle
    {
        $this->dataValidator->validate($data);

        $vehicle = new Vehicle();
        $vehicle->setName($data['name']);
        $vehicle->setModel($data['model']);
        $vehicle->setManufacturer($data['manufacturer']);
        $vehicle->setCostInCredits($data['cost_in_credits']);
        $vehicle->setLength($data['length']);
        $vehicle->setMaxAtmospheringSpeed($data['max_atmosphering_speed']);
        $vehicle->setCrew($data['crew']);
        $vehicle->setPassengers($data['passengers']);
        $vehicle->setCargoCapacity($data['cargo_capacity']);
        $vehicle->setConsumables($data['consumables']);
        $vehicle->setVehicleClass($data['vehicle_class']);
        $vehicle->setCreated(new \DateTime($data['created']));
        $vehicle->setEdited(new \DateTime($data['edited']));
        $vehicle->setUrl($data['url']);

        return $vehicle;
    }
}
