<?php

// Planet.php
namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class Planet
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private $id;

    #[ORM\Column(type: "string")]
    private string $name;

    #[ORM\Column(type: "string")]
    private string $rotationPeriod;

    #[ORM\Column(type: "string")]
    private string $orbitalPeriod;

    #[ORM\Column(type: "string")]
    private string $diameter;

    #[ORM\Column(type: "string")]
    private string $climate;

    #[ORM\Column(type: "string")]
    private string $gravity;

    #[ORM\Column(type: "string")]
    private string $terrain;

    #[ORM\Column(type: "string")]
    private string $surfaceWater;

    #[ORM\Column(type: "string")]
    private string $population;

    #[ORM\Column(type: "datetime")]
    private $created;

    #[ORM\Column(type: "datetime")]
    private $edited;

    #[ORM\Column(type: "string")]
    private $url;

    #[ORM\OneToMany(mappedBy: 'homeworld', targetEntity: People::class)]
    private Collection $people;

    public function __construct()
    {
        $this->people = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getRotationPeriod(): string
    {
        return $this->rotationPeriod;
    }

    public function setRotationPeriod($rotationPeriod): void
    {
        $this->rotationPeriod = $rotationPeriod;
    }

    public function getOrbitalPeriod(): string
    {
        return $this->orbitalPeriod;
    }

    public function setOrbitalPeriod($orbitalPeriod): void
    {
        $this->orbitalPeriod = $orbitalPeriod;
    }

    public function getDiameter(): string
    {
        return $this->diameter;
    }

    public function setDiameter($diameter): void
    {
        $this->diameter = $diameter;
    }

    public function getClimate(): string
    {
        return $this->climate;
    }

    public function setClimate($climate): void
    {
        $this->climate = $climate;
    }

    public function getGravity(): string
    {
        return $this->gravity;
    }

    public function setGravity($gravity): void
    {
        $this->gravity = $gravity;
    }

    public function getTerrain(): string
    {
        return $this->terrain;
    }

    public function setTerrain($terrain): void
    {
        $this->terrain = $terrain;
    }

    public function getSurfaceWater(): string
    {
        return $this->surfaceWater;
    }

    public function setSurfaceWater($surfaceWater): void
    {
        $this->surfaceWater = $surfaceWater;
    }

    public function getPopulation(): string
    {
        return $this->population;
    }

    public function setPopulation($population): void
    {
        $this->population = $population;
    }

    public function getCreated()
    {
        return $this->created;
    }

    public function setCreated($created): void
    {
        $this->created = $created;
    }

    public function getEdited()
    {
        return $this->edited;
    }

    public function setEdited($edited): void
    {
        $this->edited = $edited;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function setUrl($url): void
    {
        $this->url = $url;
    }

    public function getPeople(): Collection
    {
        return $this->people;
    }

    public function addPerson(People $person): static
    {
        if (!$this->people->contains($person)) {
            $this->people->add($person);
            $person->setHomeworld($this);
        }

        return $this;
    }

    public function removePerson(People $person): static
    {
        if ($this->people->removeElement($person)) {
            if ($person->getHomeworld() === $this) {
                $person->setHomeworld(null);
            }
        }

        return $this;
    }
}
