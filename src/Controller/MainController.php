<?php

namespace App\Controller;

use App\Service\CallApiService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="app_main_home")
     */
    public function index(): Response
    {
        // on retourne une réponse
        return $this->render('main/home.html.twig');
    }

    /**
     * @Route("/credits", name="app_main_credits")
     */
    public function credits(): Response
    {
        // on retourne une réponse
        return $this->render('main/credits.html.twig');
    }

}
