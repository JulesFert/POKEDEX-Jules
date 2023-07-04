<?php

namespace App\Controller;

use App\Entity\Pokemon;
use App\Repository\PokemonRepository;
use App\Service\CallApiService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PokemonController extends AbstractController
{
    
    /**
     * Permet l'affichage de la liste des pokémons
     * @Route("/pokemon/list/{number}", name="app_pokemon_list")
     */
    public function list(PokemonRepository $pr, CallApiService $callApiService, $number=null)
    {
       // on récupère les données du model
       $pokemons = $pr->findAll();

       $pokemonApi = $callApiService->getAllPokemonData($number);

       // on retourne une réponse
       return $this->render('pokemon/list.html.twig', [
           'pokemons' => $pokemons,
           'pokemonApi' => $pokemonApi,
       ]);
    }

    /**
     * Détails d'un pokémon
     * @Route("/pokemon/{id}/details", name="app_pokemon_details")
     * @param PokemonRepository $pr
     * @param [type] $id
     * @return void
     */
    public function details(PokemonRepository $pr, $id, CallApiService $callApiService) {

        // pokémon API
        $pokemon = $callApiService->getOnePokemonById($id);

        // pokémon BDD
        $pokemonBDD = $pr->findByNumber($id);
        // dd($pokemonBDD);

        // Trouver l'index du pokémon actuel dans la liste + précédent et suivants 
        $currentIndex = $pokemon['id'];

        if ($pokemon['id']>1) {
        $previousPokemonNumber = $pokemon['id']-1;
        } else {
            $previousPokemonNumber = null;
        }

        $nextPokemonNumber = $pokemon['id']+1;

        $previousPokemon = $callApiService->getOnePokemonById($previousPokemonNumber);
        $nextPokemon = $callApiService->getOnePokemonById($nextPokemonNumber);

       // on retourne une réponse
       return $this->render('pokemon/details.html.twig', [
           'pokemon' => $pokemon,
           'pokemonBDD' => $pokemonBDD[0],
           'currentIndex' => $currentIndex,
            'previousPokemonNumber' => $previousPokemonNumber,
            'nextPokemonNumber' => $nextPokemonNumber,
            'previousPokemon' => $previousPokemon,
            'nextPokemon' => $nextPokemon,

       ]);
    }
}
