<?php

namespace App\Controller\Admin;

use App\Entity\Products;
use App\Form\Type\ProductType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\RangeType;

class ProductCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Products::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name'),
            TextEditorField::new('description'),
            TextField::new('sku'),
            NumberField::new('rating')->setFormType(NumberType::class),
            NumberField::new('quantity')->setFormType(NumberType::class),
            NumberField::new('Position')->setFormType(NumberType::class),
            BooleanField::new('active'),
            CollectionField::new('product_id')->setCustomOptions([
                'allowAdd' => true,
                'allowDelete' => true,
                'entryType' => ProductType::class,
                'showEntryLabel' => false,
            ]),
        ];
    }

}
