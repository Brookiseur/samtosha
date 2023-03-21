<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FrontPresentationController extends AbstractController
{
    #[Route('/samtosha/presentation', name: 'presentation')]
    public function index(): Response
    {
        return $this->render('front_presentation/index.html.twig', [
            'controller_name' => 'FrontPresentationController',
        ]);
    }
}
