<?php

namespace App\Entity;

use App\Repository\VehicleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VehicleRepository::class)]
class Vehicle
{
    /**
     * @var int|null
     */
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private ?int $id;

    /**
     * @var string|null
     */
    #[ORM\Column(type: "string")]
    private ?string $name;

    /**
     * @var string|null
     */
    #[ORM\Column(type: "string")]
    private ?string $model;

    /**
     * @var string|null
     */
    #[ORM\Column(type: "string")]
    private ?string $manufacturer;

    /**
     * @var string|null
     */
    #[ORM\Column(type: "string")]
    private ?string $costInCredits;

    /**
     * @var string|null
     */
    #[ORM\Column(type: "string")]
    private ?string $length;

    /**
     * @var string|null
     */
    #[ORM\Column(type: "string")]
    private ?string $maxAtmospheringSpeed;

    /**
     * @var string|null
     */
    #[ORM\Column(type: "string")]
    private ?string $crew;

    /**
     * @var string|null
     */
    #[ORM\Column(type: "string")]
    private ?string $passengers;

    /**
     * @var string|null
     */
    #[ORM\Column(type: "string")]
    private ?string $cargoCapacity;

    /**
     * @var string|null
     */
    #[ORM\Column(type: "string")]
    private ?string $consumables;

    /**
     * @var string|null
     */
    #[ORM\Column(type: "string")]
    private ?string $vehicleClass;

    /**
     * @var Collection
     */
    #[ORM\ManyToMany(targetEntity: Hero::class, mappedBy: 'vehicles')]
    private Collection $pilots;

    #[ORM\Column(type: "datetime")]
    private \DateTimeInterface $created;

    /**
     * @var \DateTimeInterface
     */
    #[ORM\Column(type: "datetime")]
    private \DateTimeInterface $edited;

    /**
     * @var string|null
     */
    #[ORM\Column(type: "string")]
    private ?string $url;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     */
    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string|null
     */
    public function getModel(): ?string
    {
        return $this->model;
    }

    /**
     * @param string|null $model
     */
    public function setModel(?string $model): void
    {
        $this->model = $model;
    }

    /**
     * @return string|null
     */
    public function getManufacturer(): ?string
    {
        return $this->manufacturer;
    }

    /**
     * @param string|null $manufacturer
     */
    public function setManufacturer(?string $manufacturer): void
    {
        $this->manufacturer = $manufacturer;
    }

    /**
     * @return string|null
     */
    public function getCostInCredits(): ?string
    {
        return $this->costInCredits;
    }

    /**
     * @param string|null $costInCredits
     */
    public function setCostInCredits(?string $costInCredits): void
    {
        $this->costInCredits = $costInCredits;
    }

    /**
     * @return string|null
     */
    public function getLength(): ?string
    {
        return $this->length;
    }

    /**
     * @param string|null $length
     */
    public function setLength(?string $length): void
    {
        $this->length = $length;
    }

    /**
     * @return string|null
     */
    public function getMaxAtmospheringSpeed(): ?string
    {
        return $this->maxAtmospheringSpeed;
    }

    /**
     * @param string|null $maxAtmospheringSpeed
     */
    public function setMaxAtmospheringSpeed(?string $maxAtmospheringSpeed): void
    {
        $this->maxAtmospheringSpeed = $maxAtmospheringSpeed;
    }

    /**
     * @return string|null
     */
    public function getCrew(): ?string
    {
        return $this->crew;
    }

    /**
     * @param string|null $crew
     */
    public function setCrew(?string $crew): void
    {
        $this->crew = $crew;
    }

    /**
     * @return string|null
     */
    public function getPassengers(): ?string
    {
        return $this->passengers;
    }

    /**
     * @param string|null $passengers
     */
    public function setPassengers(?string $passengers): void
    {
        $this->passengers = $passengers;
    }

    /**
     * @return string|null
     */
    public function getCargoCapacity(): ?string
    {
        return $this->cargoCapacity;
    }

    /**
     * @param string|null $cargoCapacity
     */
    public function setCargoCapacity(?string $cargoCapacity): void
    {
        $this->cargoCapacity = $cargoCapacity;
    }

    /**
     * @return string|null
     */
    public function getConsumables(): ?string
    {
        return $this->consumables;
    }

    /**
     * @param string|null $consumables
     */
    public function setConsumables(?string $consumables): void
    {
        $this->consumables = $consumables;
    }

    /**
     * @return string|null
     */
    public function getVehicleClass(): ?string
    {
        return $this->vehicleClass;
    }

    /**
     * @param string|null $vehicleClass
     */
    public function setVehicleClass(?string $vehicleClass): void
    {
        $this->vehicleClass = $vehicleClass;
    }

    /**
     * @return Collection
     */
    public function getPilots(): Collection
    {
        return $this->pilots;
    }

    /**
     * @param Collection $pilots
     */
    public function setPilots(Collection $pilots): void
    {
        $this->pilots = $pilots;
    }

    /**
     * @return Collection
     */
    public function getFilms(): Collection
    {
        return $this->films;
    }

    /**
     * @param Collection $films
     */
    public function setFilms(Collection $films): void
    {
        $this->films = $films;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getCreated(): \DateTimeInterface
    {
        return $this->created;
    }

    /**
     * @param \DateTimeInterface $created
     */
    public function setCreated(\DateTimeInterface $created): void
    {
        $this->created = $created;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getEdited(): \DateTimeInterface
    {
        return $this->edited;
    }

    /**
     * @param \DateTimeInterface $edited
     */
    public function setEdited(\DateTimeInterface $edited): void
    {
        $this->edited = $edited;
    }

    /**
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }

    /**
     * @param string|null $url
     */
    public function setUrl(?string $url): void
    {
        $this->url = $url;
    }

}
