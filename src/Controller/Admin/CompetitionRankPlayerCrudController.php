<?php

namespace App\Controller\Admin;

use App\Entity\CompetitionRankPlayer;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class CompetitionRankPlayerCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return CompetitionRankPlayer::class;
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
