<?php

namespace App\Entity;

use App\Repository\FilmRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FilmRepository::class)]
class Film
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: "string")]
    private ?string $name = null;

    #[ORM\ManyToMany(targetEntity: Hero::class, mappedBy: 'films')]
    private Collection $heroes;

    #[ORM\Column]
    private ?int $episode = null;

    #[ORM\Column(type: "text")]
    private ?string $openingCrawl = null;

    #[ORM\Column(type: "string")]
    private ?string $director = null;

    #[ORM\Column(type: "string")]
    private ?string $producer = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $releaseDate = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $created = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $edited = null;

    #[ORM\Column(type: "string")]
    private ?string $url = null;

    public function __construct()
    {
        $this->heroes = new ArrayCollection();
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
            $hero->addFilm($this);
        }
    }

    public function removeHero(Hero $hero): void
    {
        if ($this->heroes->removeElement($hero)) {
            $hero->removeFilm($this);
        }
    }

    public function getEpisode(): ?int
    {
        return $this->episode;
    }

    public function setEpisode(int $episode): void
    {
        $this->episode = $episode;
    }

    public function getOpeningCrawl(): ?string
    {
        return $this->openingCrawl;
    }

    public function setOpeningCrawl(string $openingCrawl): void
    {
        $this->openingCrawl = $openingCrawl;
    }

    public function getDirector(): ?string
    {
        return $this->director;
    }

    public function setDirector(string $director): void
    {
        $this->director = $director;
    }

    public function getProducer(): ?string
    {
        return $this->producer;
    }

    public function setProducer(string $producer): void
    {
        $this->producer = $producer;
    }

    public function getReleaseDate(): ?\DateTimeInterface
    {
        return $this->releaseDate;
    }

    public function setReleaseDate(\DateTimeInterface $releaseDate): void
    {
        $this->releaseDate = $releaseDate;
    }

    public function getCreated(): ?\DateTimeInterface
    {
        return $this->created;
    }

    public function setCreated(\DateTimeInterface $created): void
    {
        $this->created = $created;
    }

    public function getEdited(): ?\DateTimeInterface
    {
        return $this->edited;
    }

    public function setEdited(\DateTimeInterface $edited): void
    {
        $this->edited = $edited;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): void
    {
        $this->url = $url;
    }
}
