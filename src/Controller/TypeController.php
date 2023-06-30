<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TypeController extends AbstractController
{
    /**
     * @Route("/type", name="app_type")
     */
    public function index(): Response
    {
        return $this->render('type/index.html.twig', [
            'controller_name' => 'TypeController',
        ]);
    }

    public function types() {

        // on récupère les types
        $types = Type::all();

        // on retourne la liste des types avec la vue
        return view ('types', [
            'types' => $types,
            'header' => true,
        ]);
    }

    public function comparator() {

        // on récupère les types
        $types = Type::all();

        // on retourne la view
        return view('comparator', [
            'types' => $types,
            'header' => true,
        ]);
    }
}
