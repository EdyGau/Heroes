<?php

namespace App\Factory;

use App\Entity\Film;
use App\Validator\FilmDataValidator;

class FilmFactory
{
    private FilmDataValidator $dataValidator;

    public function __construct(FilmDataValidator $dataValidator)
    {
        $this->dataValidator = $dataValidator;
    }
    /**
     * @throws \Exception
     */
    public function create(array $data): Film
    {
        $this->dataValidator->validate($data);

        $film = new Film();
        $film->setName($data['title']);
        $film->setEpisode($data['episode_id']);
        $film->setOpeningCrawl($data['opening_crawl']);
        $film->setDirector($data['director']);
        $film->setProducer($data['producer']);
        $film->setReleaseDate(new \DateTime($data['release_date']));
        $film->setCreated(new \DateTime($data['created']));
        $film->setEdited(new \DateTime($data['edited']));
        $film->setUrl($data['url']);

        return $film;
    }
}
