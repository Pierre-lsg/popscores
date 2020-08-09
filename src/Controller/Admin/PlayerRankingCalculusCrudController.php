<?php

namespace App\Controller\Admin;

use App\Entity\PlayerRankingCalculus;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class PlayerRankingCalculusCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return PlayerRankingCalculus::class;
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
