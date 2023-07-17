<?php

namespace App\Helper;

use App\Factory\PeopleFactory;
use App\Factory\VehicleFactory;
use App\Factory\StarshipFactory;
use App\Factory\FilmFactory;
use App\Factory\PlanetFactory;
use App\Factory\SpeciesFactory;

/**
 * FactoriesContainerHelper class provides access to various factories
 */
class FactoriesContainerHelper
{
    private PeopleFactory $peopleFactory;
    private VehicleFactory $vehicleFactory;
    private StarshipFactory $starshipFactory;
    private FilmFactory $filmFactory;
    private PlanetFactory $planetFactory;
    private SpeciesFactory $speciesFactory;

    public function __construct(
        PeopleFactory $peopleFactory,
        VehicleFactory $vehicleFactory,
        StarshipFactory $starshipFactory,
        FilmFactory $filmFactory,
        PlanetFactory $planetFactory,
        SpeciesFactory $speciesFactory
    ) {
        $this->peopleFactory = $peopleFactory;
        $this->vehicleFactory = $vehicleFactory;
        $this->starshipFactory = $starshipFactory;
        $this->filmFactory = $filmFactory;
        $this->planetFactory = $planetFactory;
        $this->speciesFactory = $speciesFactory;
    }

    public function getPeopleFactory(): PeopleFactory
    {
        return $this->peopleFactory;
    }

    public function getVehicleFactory(): VehicleFactory
    {
        return $this->vehicleFactory;
    }

    public function getStarshipFactory(): StarshipFactory
    {
        return $this->starshipFactory;
    }

    public function getFilmFactory(): FilmFactory
    {
        return $this->filmFactory;
    }

    public function getPlanetFactory(): PlanetFactory
    {
        return $this->planetFactory;
    }

    public function getSpeciesFactory(): SpeciesFactory
    {
        return $this->speciesFactory;
    }
}
