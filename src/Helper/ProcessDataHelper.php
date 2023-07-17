<?php


namespace App\Helper;

use App\Service\DataProcessorService;

class ProcessDataHelper
{
    private DataProcessorService $dataProcessorService;

    public function __construct(
        DataProcessorService $dataProcessorService,
    ) {
        $this->dataProcessorService = $dataProcessorService;

    }
    public function processData(string $dataType, array $data): void
    {
        switch ($dataType) {
            case 'people':
                $this->dataProcessorService->processPeople($data);
                break;
            case 'vehicles':
                $this->dataProcessorService->processVehicles($data);
                break;
            case 'starships':
                $this->dataProcessorService->processStarships($data);
                break;
            case 'films':
                $this->dataProcessorService->processFilms($data);
                break;
            case 'species':
                $this->dataProcessorService->processSpecies($data);
                break;
            case 'planets':
                $this->dataProcessorService->processPlanets($data);
                break;
            default:
                throw new \InvalidArgumentException('Invalid data type: ' . $dataType);
        }
    }
}
