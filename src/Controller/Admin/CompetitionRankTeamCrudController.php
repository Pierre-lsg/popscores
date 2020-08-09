<?php

namespace App\Controller\Admin;

use App\Entity\CompetitionRankTeam;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class CompetitionRankTeamCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return CompetitionRankTeam::class;
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
