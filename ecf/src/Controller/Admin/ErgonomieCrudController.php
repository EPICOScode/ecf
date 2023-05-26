<?php

namespace App\Controller\Admin;

use App\Entity\Ergonomie;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;


class ErgonomieCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Ergonomie::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            BooleanField::new('lumierjour'),
            BooleanField::new('lumierearti'),
        ];
    }

}