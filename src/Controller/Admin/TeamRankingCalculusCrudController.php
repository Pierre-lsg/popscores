<?php

namespace App\Controller\Admin;

use App\Entity\TeamRankingCalculus;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class TeamRankingCalculusCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return TeamRankingCalculus::class;
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
