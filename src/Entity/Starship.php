<?php

namespace App\Entity;

use App\Repository\StarshipRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StarshipRepository::class)]
class Starship
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private ?int $id;

    #[ORM\Column(type: "string")]
    private ?string $name;

    #[ORM\Column(type: "string")]
    private ?string $model;

    #[ORM\Column(type: "string")]
    private ?string $manufacturer;

    #[ORM\Column(type: "string")]
    private ?string $costInCredits;

    #[ORM\Column(type: "string")]
    private ?string $length;

    #[ORM\Column(type: "string")]
    private ?string $maxAtmospheringSpeed;

    #[ORM\Column(type: "string")]
    private ?string $crew;

    #[ORM\Column(type: "string")]
    private ?string $passengers;

    #[ORM\Column(type: "string")]
    private ?string $cargoCapacity;

    #[ORM\Column(type: "string")]
    private ?string $consumables;

    #[ORM\Column(type: "string")]
    private ?string $hyperdriveRating;

    #[ORM\Column(type: "string")]
    private ?string $MGLT;

    #[ORM\Column(type: "string")]
    private ?string $starshipClass;

    #[ORM\ManyToMany(targetEntity: Hero::class, mappedBy: 'starships')]
    private Collection $pilots;

    #[ORM\Column(type: "datetime")]
    private \DateTimeInterface $created;

    #[ORM\Column(type: "datetime")]
    private \DateTimeInterface $edited;

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
    public function getHyperdriveRating(): ?string
    {
        return $this->hyperdriveRating;
    }

    /**
     * @param string|null $hyperdriveRating
     */
    public function setHyperdriveRating(?string $hyperdriveRating): void
    {
        $this->hyperdriveRating = $hyperdriveRating;
    }

    /**
     * @return string|null
     */
    public function getMGLT(): ?string
    {
        return $this->MGLT;
    }

    /**
     * @param string|null $MGLT
     */
    public function setMGLT(?string $MGLT): void
    {
        $this->MGLT = $MGLT;
    }

    /**
     * @return string|null
     */
    public function getStarshipClass(): ?string
    {
        return $this->starshipClass;
    }

    /**
     * @param string|null $starshipClass
     */
    public function setStarshipClass(?string $starshipClass): void
    {
        $this->starshipClass = $starshipClass;
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
