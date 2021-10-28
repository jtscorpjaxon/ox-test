<?php

namespace App\Controller\Admin;

use App\Entity\ProductAttributeValues;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ProductAttributeValueCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ProductAttributeValues::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name'),
        ];
    }

}
