<?php

namespace App\Controller\Admin;

use App\Entity\Logiciels;
use App\Entity\Salle;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class SalleCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Salle::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new("nom", "Nom")
                ->setColumns(12),
            NumberField::new("capacite")
                ->setColumns(1),
            AssociationField::new("logiciels")
                ->hideOnIndex()
                ->setCrudController(Logiciels::class)
            // ->renderAsNativeWidget() 
        ];
    }

}