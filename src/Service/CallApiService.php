<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class CallApiService
{

    private $client;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    public function getAllPokemonData($number = null): array
    {
        if ($number === null) {
            $number = 1;
        }

        $response = $this->client->request(
            'GET',
            "https://pokebuildapi.fr/api/v1/pokemon/generation/$number"
        );

        return $response->toArray();
    }

    public function getOnePokemonById($id): array
    {

        $response = $this->client->request(
            'GET',
            "https://pokebuildapi.fr/api/v1/pokemon/$id"
        );

        return $response->toArray();
    }

    public function getPokemonsByOneType($type)
    {

        $response = $this->client->request(
            'GET',
            "https://pokebuildapi.fr/api/v1/pokemon/type/$type"
        );

        return $response->toArray();
    }
}
