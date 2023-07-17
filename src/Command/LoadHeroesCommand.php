<?php

namespace App\Command;

use App\Service\SwapiClient;
use Doctrine\ORM\EntityManagerInterface;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use App\Helper\ProcessDataHelper;

class LoadHeroesCommand extends Command
{
    protected static $defaultName = 'app:load-heroes';
    private EntityManagerInterface $entityManager;
    private $client;
    private SwapiClient $swapiClient;
    private ProcessDataHelper $processDataHelper;

    public function __construct(
        EntityManagerInterface $entityManager,
        Client $client,
        SwapiClient $swapiClient,
        ProcessDataHelper $processDataHelper
    ) {
        $this->entityManager = $entityManager;
        $this->client = $client;
        $this->swapiClient = $swapiClient;
        $this->processDataHelper = $processDataHelper;

        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->setDescription('Load heroes and save them to db')
            ->addArgument(
                'endpoint',
                InputArgument::OPTIONAL,
                'The endpoint to fetch data from (people, species, vehicles, starships, planets, films)'
            );
    }

    /**
     * Executes the command to get heroes from Swapi and save them to db.
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $io->title('Load Heroes');

        $endpoint = $input->getArgument('endpoint');

        if (!$endpoint) {
            $endpoints = ['species', 'vehicles', 'starships', 'planets', 'films', 'people'];
        } else {
            $endpoints = [$endpoint];
        }

        try {
            foreach ($endpoints as $endpoint) {
                $pages = $this->swapiClient->getData($endpoint);
                foreach ($pages as $page) {
                    $this->processDataHelper->processData($endpoint, $page);
                    $this->entityManager->flush();
                }
                $io->success(sprintf('Data from endpoint "%s" loaded successfully!', $endpoint));
            }

            $io->success('Data written to db.');
        } catch (\Exception $e) {
            $io->error(sprintf('An error occurred: %s', $e->getMessage()));
        } catch (GuzzleException $e) {
            $io->error(
                sprintf('Guzzle exception occurred: %s', $e->getMessage())
            );
        }

        return Command::SUCCESS;
    }
}
