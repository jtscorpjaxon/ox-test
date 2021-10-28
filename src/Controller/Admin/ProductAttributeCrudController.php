<?php

namespace App\Controller\Admin;

use App\Entity\ProductAttributes;
use App\Form\Type\AttributeType;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping\Entity;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ProductAttributeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ProductAttributes::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name'),
            CollectionField::new('product_attribute_id')->setFormTypeOptions([
                'delete_empty' => true,
                //'by_reference' => false,
            ])->setEntryIsComplex(false)->setCustomOptions([
                    'allowAdd' => true,
                    'allowDelete' => true,
                    'entryType' => AttributeType::class,
                    'showEntryLabel' => false,
                ]),
            //AssociationField::new('product_attribute')->setCrudController(ProductAttributeValueCrudController::class)->autocomplete()
        ];
    }

}
