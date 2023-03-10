<?php

namespace App\Controller;

use App\Repository\ObjetoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Entrada;
use App\Entity\Objeto;
use App\Form\EntradaType;
use App\Repository\EntradaRepository;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Salida;
use App\Form\SalidaType;
use App\Repository\SalidaRepository;


class MainController extends AbstractController
{
    #[Route('/', name: 'app_main')]
    public function index(ObjetoRepository $objetoRepository): Response
    {
        return $this->render('main/index.html.twig', [
            'objetos' => $objetoRepository->findOrderUbicacion(),
        ]);
    }

    #[Route('/entr/{id}', name: 'app_entrada_objeto', methods: ['GET', 'POST'])]
    public function entrada(Objeto $objeto, Request $request, EntradaRepository $entradaRepository): Response
    {
        $entrada = new Entrada();
        $entrada->setObjeto($objeto);
        $form = $this->createForm(EntradaType::class, $entrada);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            
                // Aumentamos la cantidad del objeto que seleccionamos
            $objeto = $entrada->getObjeto();
            $objeto->setTotal($objeto->getTotal() + $entrada->getCantidad());
            $objeto->setCantidad($objeto->getCantidad() + $entrada->getCantidad());
            
            $entradaRepository->save($entrada, true);

            return $this->redirectToRoute('app_main', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('entrada/new.html.twig', [
            'entrada' => $entrada,
            'form' => $form,
        ]);
    }

    #[Route('/sal/{id}', name: 'app_salida_objeto', methods: ['GET', 'POST'])]
    public function salida(Objeto $objeto, Request $request, SalidaRepository $salidaRepository): Response
    {
        $salida = new Salida();
        $salida->setObjeto($objeto);
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
                return $this->redirectToRoute('app_main', [], Response::HTTP_SEE_OTHER);
            }
        }

        return $this->renderForm('salida/new.html.twig', [
            'salida' => $salida,
            'form' => $form,
        ]);
    }

}
