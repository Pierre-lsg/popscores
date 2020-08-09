<?php

namespace App\Controller\Admin;

use App\Entity\Organizer;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class OrganizerCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Organizer::class;
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
