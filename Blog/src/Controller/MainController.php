<?php

namespace App\Controller;

use App\Entity\Articulos;
use App\Repository\ArticulosRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    #[Route('/', name: 'app_main')]
    public function index(ArticulosRepository $articulosRepository): Response
    {
        return $this->render('MainView.html.twig', [
            'articulos' => $articulosRepository->findOrderDate(),
        ]);
    }
}
