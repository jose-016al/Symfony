<?php

namespace App\Controller\Admin;

use App\Entity\User;
use App\Entity\Comentario;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        // return parent::index();

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        return $this->redirect($adminUrlGenerator->setController(ArticulosCrudController::class)->generateUrl());

    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Panel de administracion');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Articulos', 'fa fa-home');
        yield MenuItem::linkToCrud('Usuarios', 'fas fa-list', User::class);
        yield MenuItem::linkToCrud('Comentarios', 'fas fa-list', Comentario::class);
    }
}
