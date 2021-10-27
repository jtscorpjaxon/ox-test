<?php

namespace App\Controller\Admin;

use App\Entity\ProductAttributeValues;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ProductAttributeValueCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ProductAttributeValues::class;
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
