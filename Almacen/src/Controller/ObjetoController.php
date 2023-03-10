<?php

namespace App\Controller;

use App\Entity\Objeto;
use App\Form\ObjetoType;
use App\Repository\ObjetoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/objeto')]
class ObjetoController extends AbstractController
{
    #[Route('/', name: 'app_objeto_index', methods: ['GET'])]
    public function index(ObjetoRepository $objetoRepository): Response
    {
        return $this->render('objeto/index.html.twig', [
            'objetos' => $objetoRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_objeto_new', methods: ['GET', 'POST'])]
    public function new(Request $request, ObjetoRepository $objetoRepository): Response
    {
        $objeto = new Objeto();
        $form = $this->createForm(ObjetoType::class, $objeto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $objeto->setTotal($objeto->getCantidad());
            $objetoRepository->save($objeto, true);

            return $this->redirectToRoute('app_main', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('objeto/new.html.twig', [
            'objeto' => $objeto,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_objeto_show', methods: ['GET'])]
    public function show(Objeto $objeto): Response
    {
        return $this->render('objeto/show.html.twig', [
            'objeto' => $objeto,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_objeto_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Objeto $objeto, ObjetoRepository $objetoRepository): Response
    {
        $form = $this->createForm(ObjetoType::class, $objeto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $objetoRepository->save($objeto, true);

            return $this->redirectToRoute('app_objeto_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('objeto/edit.html.twig', [
            'objeto' => $objeto,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_objeto_delete', methods: ['POST'])]
    public function delete(Request $request, Objeto $objeto, ObjetoRepository $objetoRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$objeto->getId(), $request->request->get('_token'))) {
            $objetoRepository->remove($objeto, true);
        }

        return $this->redirectToRoute('app_objeto_index', [], Response::HTTP_SEE_OTHER);
    }
}
