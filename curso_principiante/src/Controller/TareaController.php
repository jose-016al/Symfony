<?php

namespace App\Controller;

use App\Entity\Tarea;
use App\Repository\TareaRepository;
use Doctrine\ORM\EntityManagerInterface;
use phpDocumentor\Reflection\DocBlock\Description;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TareaController extends AbstractController
{
    #[Route('/', name: 'app_listado_tarea')]
    public function listado(TareaRepository $tareaRepository)
    {
        $tareas = $tareaRepository->findAll();
        return $this->render('tarea/listado.html.twig', [
            'tareas' => $tareas,
        ]);
    }


    #[Route('/tarea/crear', name: 'app_crear_tarea')]
    public function crear(Request $request, EntityManagerInterface $em)
    {
        $tarea = new Tarea();
        $descripcion = $request -> request -> get('descripcion', null);
        if (null !== $descripcion) {
            if (!empty($descripcion)) {
                $tarea -> setDescripcion($descripcion);
                $em -> persist($tarea);
                $em -> flush();
                $this -> addFlash('success', 'Tarea creada correctamente');
                return $this -> redirectToRoute('app_listado_tarea');
            } else {
                $this -> addFlash('warning', 'El campo descripcion es obligatorio');
            }
        }
        return $this->render('tarea/crear.html.twig', [
            'tarea' => $tarea,
        ]);
    }

    #[Route('/tarea/editar{id}', name: 'app_editar_tarea')]
    public function editar(int $id, TareaRepository $tareaRepository ,Request $request, EntityManagerInterface $em)
    {
        $tarea = $tareaRepository -> findOneById($id);
        if (null === $tarea) {
            throw $this -> createNotFoundException();
        }
        $descripcion = $request -> request -> get('descripcion', null);
        if (null !== $descripcion) {
            if (!empty($descripcion)) {
                $tarea -> setDescripcion($descripcion);
                $em -> flush();
                $this -> addFlash('success', 'Tarea editada correctamente');
                return $this -> redirectToRoute('app_listado_tarea');
            } else {
                $this -> addFlash('warning', 'El campo descripcion es obligatorio');
            }
        }
        return $this->render('tarea/editar.html.twig', [
            'tarea' => $tarea,
        ]);
    }

    #[Route('/tarea/eliminar{id}', name: 'app_eliminar_tarea')]
    public function eliminar(Tarea $tarea, EntityManagerInterface $em)
    {
        $em -> remove($tarea);
        $em -> flush();
        $this -> addFlash('success', 'Tarea eliminado correctamente');
        return $this -> redirectToRoute('app_listado_tarea');
    }
}
