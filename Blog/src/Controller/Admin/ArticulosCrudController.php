<?php

namespace App\Controller\Admin;

use App\Entity\Articulos;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ArticulosCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Articulos::class;
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
