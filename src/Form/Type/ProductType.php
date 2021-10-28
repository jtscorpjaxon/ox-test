<?php
/**
 * Author Maxamadjonov Jaxongir.
 * https://github.com/jtscorpjaxon
 * Date: 28.10.2021
 * Time: 14:19
 */

namespace App\Form\Type;

use App\Entity\ProductAttributeValues;

use App\Entity\ProductVariations;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductType extends AbstractType
{
public function buildForm(FormBuilderInterface $builder, array $options)
{
    $builder
        ->add('quantity', TextType::class, array(
            "label" => "Quantity"
        ))
        ->add('price', TextType::class, array(
            "label" => "Price"
        ))
        ->add('product_attribute_value_ids', EntityType::class, array(
            "label" => "Attributes",
            "class"=>ProductAttributeValues::class,
            'multiple' => true,
            'expanded' => true,
            //'entry_type' => AttributeType::class,
        ))
    ;
}

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ProductVariations::class,
        ]);
    }
}