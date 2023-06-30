<?php

namespace App\Controller;

use App\Repository\PokemonRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PokemonController extends AbstractController
{
    
    /**
     * Permet l'affichage de la liste des pokémons
     * @Route("/pokemon/list", name="app_pokemon_list")
     */
    public function list(PokemonRepository $pr)
    {
       // on récupère les données du model
       $pokemons = $pr->findAll();

       // on retourne une réponse
       return $this->render('pokemon/list.html.twig', [
           'pokemons' => $pokemons,
       ]);
    }

    /**
     * Détails d'un pokémon
     * @Route("/pokemon/{id}/details", name="app_pokemon_details")
     * @param PokemonRepository $pr
     * @param [type] $id
     * @return void
     */
    public function details(PokemonRepository $pr, $id) {
        // on récupère les données du model
       $pokemon = $pr->find($id);

       // on retourne une réponse
       return $this->render('pokemon/details.html.twig', [
           'pokemon' => $pokemon,
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
