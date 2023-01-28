<?php

namespace App\Controller;

use App\Entity\Tarea;
use App\Form\TareaType;
use App\Repository\TareaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/tarea')]
class TareaController extends AbstractController
{
    #[Route('/', name: 'app_tarea_index', methods: ['GET'])]
    public function index(TareaRepository $tareaRepository): Response
    {
        return $this->render('tarea/index.html.twig', [
            'tareas' => $tareaRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_tarea_new', methods: ['GET', 'POST'])]
    public function new(Security $security, Request $request, TareaRepository $tareaRepository): Response
    {
        $tarea = new Tarea();
        $form = $this->createForm(TareaType::class, $tarea);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $tarea -> setUsuario($security->getUser());
            $tareaRepository->save($tarea, true);
            return $this->redirectToRoute('app_main', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('tarea/new.html.twig', [
            'tarea' => $tarea,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_tarea_show', methods: ['GET'])]
    public function show(Tarea $tarea): Response
    {
        return $this->render('tarea/show.html.twig', [
            'tarea' => $tarea,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_tarea_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Tarea $tarea, TareaRepository $tareaRepository): Response
    {
        $form = $this->createForm(TareaType::class, $tarea);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $tareaRepository->save($tarea, true);

            return $this->redirectToRoute('app_main', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('tarea/edit.html.twig', [
            'tarea' => $tarea,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_tarea_delete', methods: ['POST'])]
    public function delete(Request $request, Tarea $tarea, TareaRepository $tareaRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$tarea->getId(), $request->request->get('_token'))) {
            $tareaRepository->remove($tarea, true);
        }

        return $this->redirectToRoute('app_main', [], Response::HTTP_SEE_OTHER);
    }

    #[Route('/{id}', name: 'finalizar_tarea', methods: ['POST'])]
    public function finalizar(Request $request, Tarea $tarea, TareaRepository $tareaRepository): Response
    {
        if ($request -> isXmlHttpRequest()) {
            $tarea -> setFinalizada(!$tarea->isFinalizada());
            return $this -> json ([
                'finalizada' =>  $tarea->isFinalizada()
            ]);
        }
        throw $this -> createNotFoundException();
    }
}
