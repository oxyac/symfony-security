<?php

namespace App\Controller\Admin;

use App\Entity\Gnome;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class GnomeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Gnome::class;
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
