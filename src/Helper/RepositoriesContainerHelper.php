<?php

namespace App\Helper;

use App\Repository\FilmRepository;
use App\Repository\PeopleRepository;
use App\Repository\PlanetRepository;
use App\Repository\SpeciesRepository;
use App\Repository\StarshipRepository;
use App\Repository\VehicleRepository;

/**
 * RepositoriesContainerHelper class provides access to various repositories.
 */
class RepositoriesContainerHelper
{
    private PeopleRepository $peopleRepository;
    private VehicleRepository $vehicleRepository;
    private StarshipRepository $starshipRepository;
    private FilmRepository $filmRepository;
    private PlanetRepository $planetRepository;
    private SpeciesRepository $speciesRepository;

    public function __construct(
        PeopleRepository $peopleRepository,
        VehicleRepository $vehicleRepository,
        StarshipRepository $starshipRepository,
        FilmRepository $filmRepository,
        PlanetRepository $planetRepository,
        SpeciesRepository $speciesRepository
    ) {
        $this->peopleRepository = $peopleRepository;
        $this->vehicleRepository = $vehicleRepository;
        $this->starshipRepository = $starshipRepository;
        $this->filmRepository = $filmRepository;
        $this->planetRepository = $planetRepository;
        $this->speciesRepository = $speciesRepository;
    }

    public function getPeopleRepository(): PeopleRepository
    {
        return $this->peopleRepository;
    }

    public function getVehicleRepository(): VehicleRepository
    {
        return $this->vehicleRepository;
    }

    public function getStarshipRepository(): StarshipRepository
    {
        return $this->starshipRepository;
    }

    public function getFilmRepository(): FilmRepository
    {
        return $this->filmRepository;
    }

    public function getPlanetRepository(): PlanetRepository
    {
        return $this->planetRepository;
    }

    public function getSpeciesRepository(): SpeciesRepository
    {
        return $this->speciesRepository;
    }
}
