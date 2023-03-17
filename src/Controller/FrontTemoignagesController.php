<?php

namespace App\Controller;


use App\Entity\Temoignages;
use App\Form\TemoignagesType;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\TemoignagesRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FrontTemoignagesController extends AbstractController
{
    #[Route('/samtosha/temoignages', name: 'temoignages', methods: ['GET', 'POST'])]
    public function index(Request $request, TemoignagesRepository $temoignagesRepository, EntityManagerInterface $em): Response
    {
        $form = $this->createForm(TemoignagesType::class);

        if ( !is_null($this->getUser())){

        if ( is_null($this->getUser()->getMonTemoignage())  ){
            $monTemoignage = new Temoignages();
        }else{
            $monTemoignage = ($this->getUser()->getMonTemoignage());  
        }
            $form = $this->createForm(TemoignagesType::class, $monTemoignage);
            $form->handleRequest($request);
            if( $form->isSubmitted() && $form->isValid()){
                $monTemoignage->setUser($this->getUser());
                $monTemoignage->setUpdatedAt(new \DateTimeImmutable());
                $monTemoignage->setIsValid(false);
                $em->persist($monTemoignage);
                $em->flush();
                return $this->redirectToRoute('temoignages', [], Response::HTTP_SEE_OTHER);
        }
    }
        

        $temoignages = $temoignagesRepository->findBy(['isValid' => true],['updatedAt'=>'desc'] );


        

        return $this->render('front_temoignages/index.html.twig', [
            'form' => $form->createView(),
            'temoignages' => $temoignages,
        ]);
    }
}
