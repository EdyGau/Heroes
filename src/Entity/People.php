<?php

namespace App\Entity;

use App\Repository\PeopleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PeopleRepository::class)]
class People
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: "string")]
    private ?string $name = null;

    #[ORM\Column]
    private ?int $height = null;

    #[ORM\Column]
    private ?int $mass = null;

    #[ORM\Column(type: "string")]
    private ?string $hair = null;

    #[ORM\Column(type: "string")]
    private ?string $skin = null;

    #[ORM\Column(type: "string")]
    private ?string $eye = null;

    #[ORM\Column(type: "string")]
    private ?string $birthdayYear = null;

    #[ORM\Column(type: "string")]
    private ?string $gender = null;

    #[ORM\Column(type: "string")]
    private string $url;

    #[ORM\Column(type: "string")]
    private ?string $homeworld = '';

    #[ORM\ManyToMany(targetEntity: Species::class, inversedBy: 'people')]
    private Collection $species;

    #[ORM\ManyToMany(targetEntity: Vehicle::class, inversedBy: 'pilots')]
    private Collection $vehicles;

    #[ORM\ManyToMany(targetEntity: Film::class, inversedBy: 'people')]
    private Collection $films;

    #[ORM\ManyToMany(targetEntity: Starship::class, inversedBy: 'pilots')]
    private Collection $starships;

    public function __construct()
    {
        $this->films = new ArrayCollection();
        $this->vehicles = new ArrayCollection();
        $this->species = new ArrayCollection();
        $this->starships = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl(string $url): void
    {
        $this->url = $url;
    }

    public function getHeight(): ?int
    {
        return $this->height;
    }

    public function setHeight($height): void
    {
        if (is_string($height)) {
            $height = intval($height);
        }

        $this->height = $height;

    }

    public function getMass(): ?int
    {
        return $this->mass;
    }

    public function setMass($mass): void
    {
        if (is_string($mass)) {
            $mass = intval($mass);
        }

        $this->mass = $mass;
    }

    public function getHair(): ?string
    {
        return $this->hair;
    }

    public function setHair(string $hair): void
    {
        $this->hair = $hair;
    }

    public function getSkin(): ?string
    {
        return $this->skin;
    }

    public function setSkin(string $skin): void
    {
        $this->skin = $skin;
    }

    public function getEye(): ?string
    {
        return $this->eye;
    }

    public function setEye(string $eye): void
    {
        $this->eye = $eye;
    }

    public function getBirthdayYear(): ?string
    {
        return $this->birthdayYear;
    }

    public function setBirthdayYear(string $birthdayYear): void
    {
        $this->birthdayYear = $birthdayYear;
    }

    public function getGender(): ?string
    {
        return $this->gender;
    }

    public function setGender(string $gender): void
    {
        $this->gender = $gender;
    }

    public function getHomeworld(): ?string
    {
        return $this->homeworld;
    }

    public function setHomeworld(string $homeworld): void
    {
        $this->homeworld = $homeworld;
    }

    /**
     * @return Collection<int, Film>
     */
    public function getFilms(): Collection
    {
        return $this->films;
    }

    public function addFilm(Film $film): void
    {
        if (!$this->films->contains($film)) {
            $this->films->add($film);
            $film->addPeople($this);
        }
    }

    public function removeFilm(Film $film): void
    {
        $this->films->removeElement($film);
    }

    public function getSpecies(): Collection
    {
        return $this->species;
    }

    public function addSpecies(Species $species): void
    {
        if (!$this->species->contains($species)) {
            $this->species->add($species);
        }
    }

    public function removeSpecies(Species $species): void
    {
        $this->species->removeElement($species);
    }

    public function getVehicles(): Collection
    {
        return $this->vehicles;
    }

    public function addVehicle(Vehicle $vehicle): void
    {
        if (!$this->vehicles->contains($vehicle)) {
            $this->vehicles->add($vehicle);
        }
    }

    public function removeVehicle(Vehicle $vehicle): void
    {
        $this->vehicles->removeElement($vehicle);
    }

    public function getStarships(): Collection
    {
        return $this->starships;
    }

    public function addStarship(Starship $starship): void
    {
        if (!$this->starships->contains($starship)) {
            $this->starships->add($starship);
        }
    }

    public function removeStarship(Starship $starship): void
    {
        $this->starships->removeElement($starship);
    }
}
