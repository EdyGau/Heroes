<?php


namespace App\Service;

use App\Entity\Hero;
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
     * @param array $data An array of hero data.
     * @return void
     */
    public function processHeroes(array $data): void
    {
        $repository = $this->repositoriesContainer->getHeroRepository();

        foreach ($data as $itemData) {

            $hero = $repository->findOneBy(['url' => $itemData['url']]);

            if (!$hero) {
                $hero = $this->factoriesContainer->getHeroFactory()->create($itemData);

                $this->addFilmsToHero($hero, $itemData['films']);
                $this->addSpeciesToHero($hero, $itemData['species']);
                $this->addVehiclesToHero($hero, $itemData['vehicles']);
                $this->addStarshipsToHero($hero, $itemData['starships']);

                $this->entityManager->persist($hero);
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
     * @param Hero $hero
     * @param array $filmUrls
     * @return void
     */
    private function addFilmsToHero(Hero $hero, array $filmUrls): void
    {
        $repository = $this->repositoriesContainer->getFilmRepository();

        foreach ($filmUrls as $url) {
            $film = $repository->findOneBy(['url' => $url]);

            if ($film) {
                $hero->addFilm($film);
            }
        }
    }

    /**
     * @param Hero $hero
     * @param array $speciesUrls
     * @return void
     */
    private function addSpeciesToHero(Hero $hero, array $speciesUrls): void
    {
        $repository = $this->repositoriesContainer->getSpeciesRepository();

        foreach ($speciesUrls as $url) {
            $species = $repository->findOneBy(['url' => $url]);

            if ($species) {
                $hero->addSpecies($species);
            }
        }
    }

    /**
     * @param Hero $hero
     * @param array $vehicleUrls
     * @return void
     */
    private function addVehiclesToHero(Hero $hero, array $vehicleUrls): void
    {
        $repository = $this->repositoriesContainer->getVehicleRepository();

        foreach ($vehicleUrls as $url) {
            $vehicle = $repository->findOneBy(['url' => $url]);

            if ($vehicle) {
                $hero->addVehicle($vehicle);
            }
        }
    }

    /**
     * @param Hero $hero
     * @param array $starshipUrls
     * @return void
     */
    private function addStarshipsToHero(Hero $hero, array $starshipUrls): void
    {
        $repository = $this->repositoriesContainer->getStarshipRepository();

        foreach ($starshipUrls as $url) {
            $starship = $repository->findOneBy(['url' => $url]);

            if ($starship) {
                $hero->addStarship($starship);
            }
        }
    }
}
