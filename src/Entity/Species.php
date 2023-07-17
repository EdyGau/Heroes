<?php

namespace App\Entity;

use App\Repository\SpeciesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SpeciesRepository::class)]
class Species
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: "string")]
    private ?string $name = null;

    #[ORM\Column(type: "string")]
    private ?string $classification = null;

    #[ORM\Column(type: "string")]
    private ?string $designation = null;

    #[ORM\Column(type: "string")]
    private ?string $averageHeight = null;

    #[ORM\Column(type: "string")]
    private ?string $skinColors = null;

    #[ORM\Column(type: "string")]
    private ?string $hairColors = null;

    #[ORM\Column(type: "string")]
    private ?string $eyeColors = null;

    #[ORM\Column(type: "string")]
    private ?string $averageLifespan = null;

    #[ORM\Column(length: 255, options: ["default" => ""])]
    private ?string $homeworld = '';
    #[ORM\Column(type: "string")]
    private ?string $language = null;

    #[ORM\Column(type: "datetime")]
    private ?\DateTimeInterface $created = null;

    #[ORM\Column(type: "datetime")]
    private ?\DateTimeInterface $edited = null;

    #[ORM\Column(type: "string")]
    private ?string $url = null;

    #[ORM\ManyToMany(targetEntity: Hero::class, mappedBy: 'species')]
    private Collection $heroes;

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
    public function getClassification(): ?string
    {
        return $this->classification;
    }

    /**
     * @param string|null $classification
     */
    public function setClassification(?string $classification): void
    {
        $this->classification = $classification;
    }

    /**
     * @return string|null
     */
    public function getDesignation(): ?string
    {
        return $this->designation;
    }

    /**
     * @param string|null $designation
     */
    public function setDesignation(?string $designation): void
    {
        $this->designation = $designation;
    }

    /**
     * @return string|null
     */
    public function getAverageHeight(): ?string
    {
        return $this->averageHeight;
    }

    /**
     * @param string|null $averageHeight
     */
    public function setAverageHeight(?string $averageHeight): void
    {
        $this->averageHeight = $averageHeight;
    }

    /**
     * @return string|null
     */
    public function getSkinColors(): ?string
    {
        return $this->skinColors;
    }

    /**
     * @param string|null $skinColors
     */
    public function setSkinColors(?string $skinColors): void
    {
        $this->skinColors = $skinColors;
    }

    /**
     * @return string|null
     */
    public function getHairColors(): ?string
    {
        return $this->hairColors;
    }

    /**
     * @param string|null $hairColors
     */
    public function setHairColors(?string $hairColors): void
    {
        $this->hairColors = $hairColors;
    }

    /**
     * @return string|null
     */
    public function getEyeColors(): ?string
    {
        return $this->eyeColors;
    }

    /**
     * @param string|null $eyeColors
     */
    public function setEyeColors(?string $eyeColors): void
    {
        $this->eyeColors = $eyeColors;
    }

    /**
     * @return string|null
     */
    public function getAverageLifespan(): ?string
    {
        return $this->averageLifespan;
    }

    /**
     * @param string|null $averageLifespan
     */
    public function setAverageLifespan(?string $averageLifespan): void
    {
        $this->averageLifespan = $averageLifespan;
    }

    /**
     * @return string|null
     */
    public function getHomeworld(): ?string
    {
        return $this->homeworld;
    }

    /**
     * @param string|null $homeworld
     */
    public function setHomeworld(?string $homeworld): void
    {
        $this->homeworld = $homeworld;
    }

    /**
     * @return string|null
     */
    public function getLanguage(): ?string
    {
        return $this->language;
    }

    /**
     * @param string|null $language
     */
    public function setLanguage(?string $language): void
    {
        $this->language = $language;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getCreated(): ?\DateTimeInterface
    {
        return $this->created;
    }

    /**
     * @param \DateTimeInterface|null $created
     */
    public function setCreated(?\DateTimeInterface $created): void
    {
        $this->created = $created;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getEdited(): ?\DateTimeInterface
    {
        return $this->edited;
    }

    /**
     * @param \DateTimeInterface|null $edited
     */
    public function setEdited(?\DateTimeInterface $edited): void
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

    public function __construct()
    {
        $this->heroes = new ArrayCollection();
        $this->films = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, Hero>
     */
    public function getHeroes(): Collection
    {
        return $this->heroes;
    }

    public function addHero(Hero $hero): void
    {
        if (!$this->heroes->contains($hero)) {
            $this->heroes->add($hero);
            $hero->addSpecies($this);
        }
    }

    public function removeHero(Hero $hero): void
    {
        if ($this->heroes->removeElement($hero)) {
            $hero->removeSpecies($this);
        }
    }
}
