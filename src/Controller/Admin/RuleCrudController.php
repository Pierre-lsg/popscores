<?php

namespace App\Controller\Admin;

use App\Entity\Rule;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;

class RuleCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Rule::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name'),
            TextareaField::new('description'),
        ];
    }
}
