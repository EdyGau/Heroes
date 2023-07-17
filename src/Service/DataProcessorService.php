<?php


namespace App\Service;

use App\Entity\People;
use App\Helper\FactoriesContainerHelper;
use App\Helper\RepositoriesContainerHelper;
use Doctrine\ORM\EntityManagerInterface;

class DataProcessorService
{
    private EntityManagerInterface $entityManager;
    private FactoriesContainerHelper $factoriesContainer;
    private RepositoriesContainerHelper $repositoriesContainer;

    public function __construct(
        EntityManagerInterface $entityManager,
        RepositoriesContainerHelper $repositoriesContainer,
        FactoriesContainerHelper $factoriesContainer
    ) {
        $this->entityManager = $entityManager;
        $this->repositoriesContainer = $repositoriesContainer;
        $this->factoriesContainer = $factoriesContainer;
    }

    /**
     * Processes and adds heroes to db considering their relationships.
     *
     * @param array $data An array of people data.
     * @return void
     */
    public function processPeople(array $data): void
    {
        $repository = $this->repositoriesContainer->getPeopleRepository();

        foreach ($data as $itemData) {

            $people = $repository->findOneBy(['url' => $itemData['url']]);

            if (!$people) {
                $people = $this->factoriesContainer->getPeopleFactory()->create($itemData);

                $this->addFilmsToHero($people, $itemData['films']);
                $this->addSpeciesToHero($people, $itemData['species']);
                $this->addVehiclesToHero($people, $itemData['vehicles']);
                $this->addStarshipsToHero($people, $itemData['starships']);

                $this->entityManager->persist($people);
            }
        }
    }

    /**
     * @param array $data
     * @return void
     */
    public function processVehicles(array $data): void
    {
        $repository = $this->repositoriesContainer->getVehicleRepository();

        foreach ($data as $itemData) {
            $vehicle = $repository->findOneBy(['url' => $itemData['url']]);

            if (!$vehicle) {
                $vehicle = $this->factoriesContainer->getVehicleFactory()->create($itemData);
            }

            $this->entityManager->persist($vehicle);
        }
    }

    /**
     * @param array $data
     * @return void
     */
    public function processStarships(array $data): void
    {
        $repository = $this->repositoriesContainer->getStarshipRepository();

        foreach ($data as $itemData) {
            $starship = $repository->findOneBy(['url' => $itemData['url']]);

            if (!$starship) {
                $starship = $this->factoriesContainer->getStarshipFactory()->create($itemData);
            }

            $this->entityManager->persist($starship);
        }
    }

    /**
     * @param array $data
     * @return void
     */
    public function processPlanets(array $data): void
    {
        $repository = $this->repositoriesContainer->getPlanetRepository();

        foreach ($data as $itemData) {
            $planets = $repository->findOneBy(['url' => $itemData['url']]);

            if (!$planets) {
                $planets = $this->factoriesContainer->getPlanetFactory()->create($itemData);
            }

            $this->entityManager->persist($planets);
        }
    }

    /**
     * @param array $data
     * @return void
     */
    public function processSpecies(array $data): void
    {
        $repository = $this->repositoriesContainer->getSpeciesRepository();

        foreach ($data as $itemData) {
            $species = $repository->findOneBy(['url' => $itemData['url']]);

            if (!$species) {
                $species = $this->factoriesContainer->getSpeciesFactory()->create($itemData);
            }

            $this->entityManager->persist($species);
        }
    }

    /**
     * @param array $data
     * @return void
     */
    public function processFilms(array $data): void
    {
        $repository = $this->repositoriesContainer->getFilmRepository();

        foreach ($data as $itemData) {
            $film = $repository->findOneBy(['url' => $itemData['url']]);

            if (!$film) {
                $film = $this->factoriesContainer->getFilmFactory()->create($itemData);
            }

            $this->entityManager->persist($film);
        }
    }

    /**
     * @param People $people
     * @param array $filmUrls
     * @return void
     */
    private function addFilmsToHero(People $people, array $filmUrls): void
    {
        $repository = $this->repositoriesContainer->getFilmRepository();

        foreach ($filmUrls as $url) {
            $film = $repository->findOneBy(['url' => $url]);

            if ($film) {
                $people->addFilm($film);
            }
        }
    }

    /**
     * @param People $people
     * @param array $speciesUrls
     * @return void
     */
    private function addSpeciesToHero(People $people, array $speciesUrls): void
    {
        $repository = $this->repositoriesContainer->getSpeciesRepository();

        foreach ($speciesUrls as $url) {
            $species = $repository->findOneBy(['url' => $url]);

            if ($species) {
                $people->addSpecies($species);
            }
        }
    }

    /**
     * @param People $people
     * @param array $vehicleUrls
     * @return void
     */
    private function addVehiclesToHero(People $people, array $vehicleUrls): void
    {
        $repository = $this->repositoriesContainer->getVehicleRepository();

        foreach ($vehicleUrls as $url) {
            $vehicle = $repository->findOneBy(['url' => $url]);

            if ($vehicle) {
                $people->addVehicle($vehicle);
            }
        }
    }

    /**
     * @param People $people
     * @param array $starshipUrls
     * @return void
     */
    private function addStarshipsToHero(People $people, array $starshipUrls): void
    {
        $repository = $this->repositoriesContainer->getStarshipRepository();

        foreach ($starshipUrls as $url) {
            $starship = $repository->findOneBy(['url' => $url]);

            if ($starship) {
                $people->addStarship($starship);
            }
        }
    }
}
