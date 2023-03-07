<?php

namespace App\Controller\Admin;

use App\Entity\Comentario;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ComentarioCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Comentario::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
