<?php

namespace App\Controller\Admin;

use App\Entity\Championship;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class ChampionshipCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Championship::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name'),
            TextareaField::new('description'),
            AssociationField::new('season'),
            ImageField::new('logoFile')
                ->setFormType(VichImageType::class),
            IntegerField::new('numberCompetitionMax4Calculus'),
            BooleanField::new('isInternal'),
        ];
    }
}
