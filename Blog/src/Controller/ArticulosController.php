<?php

namespace App\Controller;

use App\Entity\Articulos;
use App\Form\ArticulosType;
use App\Repository\ArticulosRepository;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\String\Slugger\SluggerInterface;

#[Route('/articulos')]
class ArticulosController extends AbstractController
{
    #[Route('/', name: 'app_articulos_index', methods: ['GET'])]
    public function index(ArticulosRepository $articulosRepository): Response
    {
        $this -> denyAccessUnlessGranted('ROLE_ADMIN');
        return $this->render('articulos/index.html.twig', [
            'articulos' => $articulosRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_articulos_new', methods: ['GET', 'POST'])]
    public function new(SluggerInterface $slugger, Security $security, Request $request, ArticulosRepository $articulosRepository): Response
    {
        $this->denyAccessUnlessGranted('ROLE_USER');
        $articulo = new Articulos();
        $articulo -> setUser($security->getUser());
        $form = $this->createForm(ArticulosType::class, $articulo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $imagen = $form->get('imagen')->getData();

            if ($imagen) {
                $originalFilename = pathinfo($imagen->getClientOriginalName(), PATHINFO_FILENAME);

                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename.'-'.uniqid().'.'.$imagen->guessExtension();

                try {
                    $imagen->move(
                        $this->getParameter('imagen_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {
                    // ... handle exception if something happens during file upload
                }

                $articulo->setImagen($newFilename);
            }
            $articulosRepository->save($articulo, true);

            return $this->redirectToRoute('app_main', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('articulos/new.html.twig', [
            'articulo' => $articulo,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_articulos_show', methods: ['GET'])]
    public function show(Articulos $articulo): Response
    {
        $this -> denyAccessUnlessGranted('ROLE_ADMIN');
        return $this->render('articulos/show.html.twig', [
            'articulo' => $articulo,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_articulos_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Articulos $articulo, ArticulosRepository $articulosRepository): Response
    {
        $form = $this->createForm(ArticulosType::class, $articulo);
        $form->handleRequest($request);
        $this -> denyAccessUnlessGranted('ROLE_ADMIN');
        if ($form->isSubmitted() && $form->isValid()) {
            $articulosRepository->save($articulo, true);

            return $this->redirectToRoute('app_articulos_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('articulos/edit.html.twig', [
            'articulo' => $articulo,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_articulos_delete', methods: ['POST'])]
    public function delete(Request $request, Articulos $articulo, ArticulosRepository $articulosRepository): Response
    {
        $this -> denyAccessUnlessGranted('ROLE_ADMIN');
        if ($this->isCsrfTokenValid('delete'.$articulo->getId(), $request->request->get('_token'))) {
            $articulosRepository->remove($articulo, true);
        }

        return $this->redirectToRoute('app_articulos_index', [], Response::HTTP_SEE_OTHER);
    }
}
