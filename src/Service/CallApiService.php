<?php 

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class CallApiService {

    private $client;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    public function getAllPokemonData(): array {

        $response = $this->client->request(
            'GET',
            'https://pokebuildapi.fr/api/v1/pokemon/generation/1'
        );

        return $response->toArray();
    }

    public function getOnePokemonById($id): array {

        $response = $this->client->request(
            'GET',
            "https://pokebuildapi.fr/api/v1/pokemon/$id"
        );

        return $response->toArray();
    }





}