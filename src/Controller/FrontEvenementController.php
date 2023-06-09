<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FrontEvenementController extends AbstractController
{
    #[Route('/cours/evenement', name: 'evenement')]
    public function index(): Response
    {
        return $this->render('front_evenement/index.html.twig', [
            'controller_name' => 'FrontEvenementController',
        ]);
    }
}
