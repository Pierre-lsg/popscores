<?php

namespace App\Controller\Admin;

use App\Entity\ChampionshipRankClub;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ChampionshipRankClub2CrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ChampionshipRankClub::class;
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
