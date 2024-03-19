<?php

namespace App\Controller;

use App\Entity\Entidadprueba;
use App\Form\EntidadpruebaType;
use App\Repository\EntidadpruebaRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/entidadprueba')]
class EntidadpruebaController extends AbstractController
{
    #[Route('/', name: 'app_entidadprueba_index', methods: ['GET'])]
    public function index(EntidadpruebaRepository $entidadpruebaRepository): Response
    {
        return $this->render('entidadprueba/index.html.twig', [
            'entidadpruebas' => $entidadpruebaRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_entidadprueba_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $entidadprueba = new Entidadprueba();
        $form = $this->createForm(EntidadpruebaType::class, $entidadprueba);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($entidadprueba);
            $entityManager->flush();

            return $this->redirectToRoute('app_entidadprueba_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('entidadprueba/new.html.twig', [
            'entidadprueba' => $entidadprueba,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_entidadprueba_show', methods: ['GET'])]
    public function show(Entidadprueba $entidadprueba): Response
    {
        return $this->render('entidadprueba/show.html.twig', [
            'entidadprueba' => $entidadprueba,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_entidadprueba_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Entidadprueba $entidadprueba, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(EntidadpruebaType::class, $entidadprueba);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_entidadprueba_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('entidadprueba/edit.html.twig', [
            'entidadprueba' => $entidadprueba,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_entidadprueba_delete', methods: ['POST'])]
    public function delete(Request $request, Entidadprueba $entidadprueba, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$entidadprueba->getId(), $request->request->get('_token'))) {
            $entityManager->remove($entidadprueba);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_entidadprueba_index', [], Response::HTTP_SEE_OTHER);
    }
}
