<?php

namespace App\Controller\Admin;

use App\Entity\Championship;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use Vich\UploaderBundle\Form\Type\VichImageType;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ChampionshipCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Championship::class;
    }

    public function configureFields(string $pageName): iterable
    {

        $imageFile = ImageField::new('logoFile')->setFormType(VichImageType::class);
        $image = ImageField::new('logo')->setBasePath('/images/championshipLogos');

        $fields = [
            TextField::new('name'),
            TextareaField::new('description'),
            AssociationField::new('season'),
            IntegerField::new('numberCompetitionMax4Calculus'),
            BooleanField::new('isInternal'),
        ];

        if ($pageName == Crud::PAGE_INDEX || $pageName == Crud::PAGE_DETAIL) {
            $fields[] = $image;
        } else {
            $fields[] = $imageFile;
        }

        return $fields;
    }
}
