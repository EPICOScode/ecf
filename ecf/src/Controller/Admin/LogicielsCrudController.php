<?php

namespace App\Controller\Admin;

use App\Entity\Logiciels;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class LogicielsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Logiciels::class;
    }

   
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('nom'),
    ];
    }
   
}
