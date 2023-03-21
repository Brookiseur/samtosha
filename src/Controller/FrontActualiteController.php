<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FrontActualiteController extends AbstractController
{
    #[Route('/samtosha/actualite', name: 'actualite')]
    public function index(): Response
    {

        return $this->render('front_actualite/index.html.twig', [
        ]);
    }
}
