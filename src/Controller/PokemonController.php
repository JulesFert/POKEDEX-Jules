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
     * @Route("/pokemon/list", name="app_pokemon_list")
     */
    public function list(PokemonRepository $pr, CallApiService $callApiService)
    {
       // on récupère les données du model
       $pokemons = $pr->findAll();

       $pokemonApi = $callApiService->getAllPokemonData();

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
        //dd($pokemonBDD);

        // Trouver l'index du pokémon actuel dans la liste
        $currentIndex = $pokemon['id'];

        // Récupérer les identifiants des pokémons précédent et suivant
        $previousPokemonNumber = 
        $nextPokemonNumber = 

       // on retourne une réponse
       return $this->render('pokemon/details.html.twig', [
           'pokemon' => $pokemon,
           'pokemonBDD' => $pokemonBDD[0],
           'currentIndex' => $currentIndex,
            'previousPokemonNumber' => $previousPokemonNumber,
            'nextPokemonNumber' => $nextPokemonNumber,

       ]);
    }

    // /**
    //  * Page détails d'un pokémon
    //  * @Route("pokemon/{id}", name="app_pokemon_details)
    //  * @param integer $id
    //  * @return void
    //  */
    // public function details(int $id) {

    //     // on récupère le pokémon + ses types (table pivot)
    //     $pokemon = Pokemon::with('types')->find($id);

    //     // on récupère aussi la liste des pokémons
    //     $pokemons = Pokemon::orderBy('number')->get();

    //     // Trouver l'index du pokémon actuel dans la liste
    //     $currentIndex = $pokemons->search(function ($currentpokemon) use ($id) {
    //     return $currentpokemon->number == $id;
    //     });

    //     // Récupérer les identifiants des pokémons précédent et suivant
    //     $previousPokemonNumber = ($currentIndex > 0) ? $pokemons[$currentIndex - 1]->number : null;
    //     $nextPokemonNumber = ($currentIndex < $pokemons->count() - 1) ? $pokemons[$currentIndex + 1]->number : null;

    //     return view('details',
    //     [
    //         'pokemon' => $pokemon,
    //         'pokemons' => $pokemons,
    //         'currentIndex' => $currentIndex,
    //         'previousPokemonNumber' => $previousPokemonNumber,
    //         'nextPokemonNumber' => $nextPokemonNumber,
    //         'header' => true,
    //     ]);
    // }

    // /**
    //  * Liste des pokémons par type 
    //  *
    //  * @param [type] $id
    //  * @return void
    //  */
    // public function listType($id) {

    //     // je récupère le type + ses pokémons
    //     $type = Type::find($id);

    //     // je renvoie la vue avec le type + pokémons
    //     return view ('listpokemons', [
    //         'type' => $type,
    //         'header' => true,
    //     ]);
    // }
}
