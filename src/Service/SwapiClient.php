<?php

namespace App\Service;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class SwapiClient
{
    public const RESULTS_PER_PAGE = 10;
    private const BASE_URL = 'https://swapi.dev/api/';

    private Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @throws \Exception
     * @throws GuzzleException
     */
    public function getData($endpoint)
    {
        try {
            $url = self::BASE_URL . $endpoint;

            while ($url) {
                $response = $this->client->get($url);
                if ($response->getStatusCode() === 200) {
                    $responseData = json_decode($response->getBody()->getContents(), true);
                    $url = $responseData['next'] ?? null;

                    yield $responseData['results'];
                } else {
                    throw new \Exception('Invalid response.');
                }
            }
        } catch (GuzzleException $e) {
            throw $e;
        }
    }
}