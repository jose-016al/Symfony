<?php

namespace App\Controller;

use App\Entity\Salida;
use App\Form\SalidaType;
use App\Repository\SalidaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/salida')]
class SalidaController extends AbstractController
{
    #[Route('/', name: 'app_salida_index', methods: ['GET'])]
    public function index(SalidaRepository $salidaRepository): Response
    {
        return $this->render('salida/index.html.twig', [
            'salidas' => $salidaRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_salida_new', methods: ['GET', 'POST'])]
    public function new(Request $request, SalidaRepository $salidaRepository): Response
    {
        $salida = new Salida();
        $form = $this->createForm(SalidaType::class, $salida);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

                // Restamos la cantidad del objeto que seleccionamos
            $objeto = $salida->getObjeto();
            if ($salida->getCantidad() > $objeto->getCantidad()) {
                echo('No se puede sacar esa cantidad');
            } else {
                $objeto->setCantidad($objeto->getCantidad() - $salida->getCantidad());
                $salidaRepository->save($salida, true);
                return $this->redirectToRoute('app_salida_index', [], Response::HTTP_SEE_OTHER);
            }


        }

        return $this->renderForm('salida/new.html.twig', [
            'salida' => $salida,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_salida_show', methods: ['GET'])]
    public function show(Salida $salida): Response
    {
        return $this->render('salida/show.html.twig', [
            'salida' => $salida,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_salida_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Salida $salida, SalidaRepository $salidaRepository): Response
    {
        $form = $this->createForm(SalidaType::class, $salida);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $salidaRepository->save($salida, true);

            return $this->redirectToRoute('app_salida_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('salida/edit.html.twig', [
            'salida' => $salida,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_salida_delete', methods: ['POST'])]
    public function delete(Request $request, Salida $salida, SalidaRepository $salidaRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$salida->getId(), $request->request->get('_token'))) {
            $salidaRepository->remove($salida, true);
        }

        return $this->redirectToRoute('app_salida_index', [], Response::HTTP_SEE_OTHER);
    }
}
