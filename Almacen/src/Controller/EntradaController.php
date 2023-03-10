<?php

namespace App\Controller;

use App\Entity\Entrada;
use App\Entity\Objeto;
use App\Form\EntradaType;
use App\Repository\EntradaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/entrada')]
class EntradaController extends AbstractController
{
    #[Route('/', name: 'app_entrada_index', methods: ['GET'])]
    public function index(EntradaRepository $entradaRepository): Response
    {
        return $this->render('entrada/index.html.twig', [
            'entradas' => $entradaRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_entrada_new', methods: ['GET', 'POST'])]
    public function new(Objeto $objeto, Request $request, EntradaRepository $entradaRepository): Response
    {
        $entrada = new Entrada();
        $form = $this->createForm(EntradaType::class, $entrada);
        $form->handleRequest($request);
        $entrada->setObjeto($objeto);

        if ($form->isSubmitted() && $form->isValid()) {
            
            //     // Aumentamos la cantidad del objeto que seleccionamos
            // $objeto = $entrada->getObjeto();
            // $objeto->setCantidad($objeto->getCantidad() + $entrada->getCantidad());
            
            $entradaRepository->save($entrada, true);
            

            return $this->redirectToRoute('app_entrada_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('entrada/new.html.twig', [
            'entrada' => $entrada,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_entrada_show', methods: ['GET'])]
    public function show(Entrada $entrada): Response
    {
        return $this->render('entrada/show.html.twig', [
            'entrada' => $entrada,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_entrada_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Entrada $entrada, EntradaRepository $entradaRepository): Response
    {
        $form = $this->createForm(EntradaType::class, $entrada);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entradaRepository->save($entrada, true);

            return $this->redirectToRoute('app_entrada_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('entrada/edit.html.twig', [
            'entrada' => $entrada,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_entrada_delete', methods: ['POST'])]
    public function delete(Request $request, Entrada $entrada, EntradaRepository $entradaRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$entrada->getId(), $request->request->get('_token'))) {
            $entradaRepository->remove($entrada, true);
        }

        return $this->redirectToRoute('app_entrada_index', [], Response::HTTP_SEE_OTHER);
    }
}
