<?php

namespace App\Controller\Admin;

use App\Entity\ProductAttributes;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ProductAttributeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ProductAttributes::class;
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
