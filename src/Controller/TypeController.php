<?php

namespace App\Controller;

use App\Entity\Type;
use App\Repository\TypeRepository;
use App\Service\CallApiService;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class TypeController extends AbstractController
{
    /**
     * Route pour afficher la page listant tous les types
     * @Route("/type/list", name="app_type_list")
     */
    public function types(TypeRepository $tr)
    {

        // on récupère les types
        $types = $tr->findAll();

        // on retourne la liste des types avec la vue
        return $this->render('type/types.html.twig', [
            'types' => $types,
            'header' => true,
        ]);
    }

    /**
     * Route pour afficher les pokémons du type en question
     * @Route("/type/{id}", name="pokemon_list_type")
     */
    public function listByType(TypeRepository $tr, $id, CallApiService $api)
    {

        // on récupère le type en question
        $type = $tr->find($id);

        // on récupère les pokémons de ce type
        $list = $api->getPokemonsByOneType($type->getName());

        // on retourne la view
        return $this->render('type/listpokemons.html.twig', [
            'type' => $type,
            'list' => $list,
            'header' => true,
        ]);
    }
}
