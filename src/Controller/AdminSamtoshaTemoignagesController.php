<?php

namespace App\Controller;

use App\Entity\Temoignages;
use App\Form\AllTemoignagesTypes;
use App\Repository\TemoignagesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/samtosha/temoignages')]
class AdminSamtoshaTemoignagesController extends AbstractController
{
    #[Route('/', name: 'admin_samtosha_temoignages', methods: ['GET'])]
    public function index(TemoignagesRepository $temoignagesRepository): Response
    {
        return $this->render('admin_samtosha_temoignages/index.html.twig', [
            'temoignages' => $temoignagesRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'admin_samtosha_temoignages_new', methods: ['GET', 'POST'])]
    public function new(Request $request, TemoignagesRepository $temoignagesRepository): Response
    {
        $monTemoignage = new Temoignages();
        $form = $this->createForm(AllTemoignagesTypes::class, $monTemoignage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $temoignagesRepository->save($monTemoignage, true);

            return $this->redirectToRoute('admin_samtosha_temoignages', [], Response::HTTP_SEE_OTHER);
        };
        return $this->renderForm('admin_samtosha_temoignages/new.html.twig', [
            'monTemoignage' => $monTemoignage,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'admin_samtosha_temoignages_show', methods: ['GET'])]
    public function show(Temoignages $monTemoignage): Response
    {
        return $this->render('admin_samtosha_temoignages/show.html.twig', [
            'monTemoignage' => $monTemoignage,
        ]);
    }

    #[Route('/{id}/edit', name: 'admin_samtosha_temoignages_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Temoignages $monTemoignage, TemoignagesRepository $temoignagesRepository): Response
    {
        $form = $this->createForm(AllTemoignagesTypes::class, $monTemoignage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $temoignagesRepository->save($monTemoignage, true);

            return $this->redirectToRoute('admin_samtosha_temoignages', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_samtosha_temoignages/edit.html.twig', [
            'monTemoignage' => $monTemoignage,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'admin_samtosha_temoignages_delete', methods: ['POST'])]
    public function delete(Request $request, Temoignages $monTemoignage, TemoignagesRepository $temoignagesRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$monTemoignage->getId(), $request->request->get('_token'))) {
            $temoignagesRepository->remove($monTemoignage, true);
        }

        return $this->redirectToRoute('admin_samtosha_temoignages', [], Response::HTTP_SEE_OTHER);
    }
}
