<?php

namespace App\Controller;

use App\Entity\Articulos;
use App\Entity\Comentario;
use App\Form\ComentarioType;
use App\Repository\ArticulosRepository;
use App\Repository\ComentarioRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;


#[Route('/')]
class MainController extends AbstractController
{
    #[Route('/', name: 'app_main', methods: ['GET'])]
    public function index(ArticulosRepository $articulosRepository): Response
    {
        return $this->render('main/index.html.twig', [
            'articulos' => $articulosRepository->findOrderDate(),
        ]);
    }

    #[Route('/articulo/{id}', name: 'app_main_show', methods: ['GET', 'POST'])]
    public function show($id, Articulos $articulo, Request $request, ComentarioRepository $comentarioRepository, UrlGeneratorInterface $urlGenerator): Response
    {
        
        $comentario = new Comentario();
        $comentario->setUsuario($this->getUser());
        $comentario->setArticulo($articulo);
        $form = $this->createForm(ComentarioType::class, $comentario);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $comentarioRepository->save($comentario, true);

            // Redirigir a la misma página
            $url = $urlGenerator->generate('app_main_show', ['id' => $id]);
            return $this->redirect($url);
        }

        return $this->render('main/articulo.html.twig', [
            'articulo' => $articulo,
            'form' => $form,
        ]);
    }

}
