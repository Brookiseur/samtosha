<?php

namespace App\Controller;

use App\Repository\EventRepository;
use App\Repository\TemoignagesRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FrontSamtoshaController extends AbstractController
{
    #[Route('/samtosha', name: '/samtosha')]
    #[Route('/', name: 'samtosha')]
    public function index(EventRepository $eventRepository, TemoignagesRepository $temoignagesRepository): Response
    {
        $last4Actu = $eventRepository->getLast4EventActualite();
        $last6Tem = $temoignagesRepository->getLast6Temoignages();

        return $this->render('front_samtosha/index.html.twig', [
            'last4Actu' =>  $last4Actu,
            'last6Tem' => $last6Tem,
        ]);
    }
}
